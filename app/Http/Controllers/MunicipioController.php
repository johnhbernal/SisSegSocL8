<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;


class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //funcion que redirecciona a la pagina de municipio
    public function index()
    {
        return view('/geolocation/municipio/municipio');
    }


    //funcion que consulta todo los datos y los devuelve en formato json
    public function get_cities_data(Request $request)
    {
        try {
            $municipios = Municipio::orderBy('updated_at', 'DESC')->get();

            foreach ($municipios as $row) {

                $departamentoNombre = Departamento::where("CODIGO_DEPARTAMENTO", "=", $row["CODIGO_DEPARTAMENTO"])->first();

                $paisNombre = Pais::where("CODIGO_PAIS", "=", $departamentoNombre->CODIGO_PAIS)->first();

                $data[] = array(

                    'id'   => $row["CODIGO_MUNICIPIO"],
                    'name'   => $row["NOMBRE"],
                    'region'   => $row["REGION"],
                    'country_code'   => $paisNombre->CODIGO_PAIS,
                    'country_name'   => $paisNombre->NOMBRE,
                    'department_code'   => $row["CODIGO_DEPARTAMENTO"],
                    'department_name'   => $departamentoNombre->NOMBRE,
                    'created' => $row["created_by"],
                    'deleted' =>  $row["deleted_at"],
                    'cretedat' =>  $row["created_at"],
                    'updated' =>  $row["updated_at"]
                );
            }

            echo json_encode($data, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => False,
                    'message' => 'Error al momento de redirecionar a Municipio con error ' + $th
                ]
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //funcion utilizada para crear un nuevo item de Municipio
    public function Store(Request $request)
    {

        $validator = $this->validacionMunicipio($request);

        if ($validator->fails()) {

            $errors = $validator->errors();

            return response()->json(['success' => false, 'error' => 1, 'error_msg' => $errors->first()], 200);
        } else {

            // echo'<pre>';
            // return $request;
            // echo'<pre>';

            $data = [
                'CODIGO_MUNICIPIO' => (int)$request->id,
                'NOMBRE' => $request->name,
                'REGION' => $request->region,
                // 'CODIGO_DEPARTAMENTO' => $request->selectDepartamento,
                'CODIGO_DEPARTAMENTO' => (int)$request->selectDepartamento,
                // 'CODIGO_PAIS' => $request->selectPais,
                // 'CODIGO_DEPARTAMENTO' => $request->selectDepartamento,

            ];

            // echo '<pre>';
            // return $data;
            // echo '<pre>';


            try {
                Municipio::create($data);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'El Municipio fue creado con éxito.'
                    ]
                );
            } catch (\Throwable $th) {
                //throw $th;
                return response()->json(
                    [
                        'success' => False,
                        'message' => 'Error al momento de crear el municipio con error ' + $th
                    ]
                );
            }
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    //Funcion utilizada para redirigir los datos para actualizar un municipio
    public function update($id)
    {

        try {
            $municipio  = Municipio::find($id);

            $departamentoNombre = Departamento::where("CODIGO_DEPARTAMENTO", "=", $municipio["CODIGO_DEPARTAMENTO"])->first();

            $municipio['CODIGO_PAIS'] =  $departamentoNombre->CODIGO_PAIS;

            return response()->json([
                'data' => $municipio
            ]);
        } catch (\Throwable $th) {

            return response()->json([
                'success' => false,
                'message' => 'Error al momento de redireccionar ' + $th
            ]);
        }
    }

    //Funcion utilizada para crear la validacion y el actualizacion de un pais.
    public function updateCity(Request $request)
    {

        $validator = $this->validacionMunicipio($request);

        if ($validator->fails()) {

            $errors = $validator->errors();

            return response()->json(['success' => false, 'error de validacion ' => 1, 'error_msg' => $errors->first()], 200);
        } else {


            $municipio = Municipio::find($request->id);

            $municipio->CODIGO_MUNICIPIO = (int)$request->id;
            $municipio->NOMBRE = $request->name;
            $municipio->REGION = $request->region;
            $municipio->CODIGO_DEPARTAMENTO = (int)$request->selectDepartamento;
            // $departamento->updated_at = now();

            try {

                if ($municipio->save()) {

                    return response()->json(
                        [
                            'success' => true,
                            'message' => 'La actualización del municipio fue realizada con éxito.'
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            'success' => false,
                            'message' => 'Error al realizar la actualización del municipio.'
                        ]
                    );
                }
            } catch (\Throwable $th) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en el catch al momento de actualizar el Municipio.'
                ]);
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    //Funcion utiñizada para realizar la eliminacion de un item de municipio
    public function destroy($id)
    {

        try {
            $event = Municipio::find($id);

            $event->delete();

            return response()->json([
                'message' => 'El Municipio fue eliminado con éxito.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el municipio de id ' + $th
            ]);
        }
    }

    // ******************************************************************
    //Funcion utilizada para validar tanto al momento de crear un nuevo item de pais o al momento de actualizar
    public function validacionMunicipio(Request $request)
    {

        $municipio = Municipio::find($request->id);

        if ($municipio != null) {

            $rules = [
                'name' => 'required|string|min:002|max:150',
                'region' => 'required|string|min:002|max:150',
                'selectPais' => 'required',
                'selectDepartamento' => 'required',
            ];

            $customMessages = [

                'name.string' => 'El campo Nombre debe ser de tipo texto.',
                'name.required' => 'El campo Nombre es requerido.',
                'name.min' => 'El campo Nombre solo puede tener un minimo de 2 caracteres.',
                'name.max' => 'El campo Nombre solo puede tener un maxino de 5 caracteres.',

                'region.string' => 'El campo Nombre debe ser de tipo texto.',
                'region.required' => 'El campo Nombre es requerido.',
                'region.min' => 'El campo Nombre solo puede tener un minimo de 2 caracteres.',
                'region.max' => 'El campo Nombre solo puede tener un maxino de 5 caracteres.',

                'selectPais.required' => 'El campo Seleccione un país es requerido.',

                'selectDepartamento.required' => 'El campo Seleccione un Departamento es requerido.',


            ];
            $validator = Validator::make($request->all(), $rules, $customMessages);

            return $validator;
        } else {

            $rules = [
                'id' => 'required|numeric|min:001|max:999',
                'name' => 'required|string|min:002|max:150',
                'region' => 'required|string|min:002|max:150',
                'selectPais' => 'required',
                'selectDepartamento' => 'required',
            ];

            $customMessages = [

                'id.numeric' => 'El campo Código Municipio debe ser de tipo numérico.',
                'id.required' => 'El campo Código Municipio es requerido.',
                'id.min' => 'El campo Código Municipio solo puede tener un minimo de 1 caracter.',
                'id.max' => 'El campo Código Municipio solo puede tener un maxino de 3 caracteres.',


                'name.string' => 'El campo Nombre debe ser de tipo texto.',
                'name.required' => 'El campo Nombre es requerido.',
                'name.min' => 'El campo Nombre solo puede tener un minimo de 2 caracteres.',
                'name.max' => 'El campo Nombre solo puede tener un maxino de 5 caracteres.',

                'region.string' => 'El campo Nombre debe ser de tipo texto.',
                'region.required' => 'El campo Nombre es requerido.',
                'region.min' => 'El campo Nombre solo puede tener un minimo de 2 caracteres.',
                'region.max' => 'El campo Nombre solo puede tener un maxino de 5 caracteres.',

                'selectPais.required' => 'El campo Seleccione un país debe ser requerido.',

                'selectDepartamento.required' => 'El campo Seleccione un Departamento es requerido.',

            ];

            $validator = Validator::make($request->all(), $rules, $customMessages);

            return $validator;
        }
    }
}
