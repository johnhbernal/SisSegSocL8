<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Pais;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;


class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //funcion que redirecciona a la pagina de pais
    public function index()
    {
        return view('/geolocation/departamento/departamento');
    }


    //funcion que consulta todo los datos y los devuelve en formato json
    public function get_departments_data(Request $request)
    {
        try {
            // $departamentos = Departamento::all();

            $departamentos = Departamento::orderBy('updated_at', 'DESC')->get();

            foreach ($departamentos as $row) {

                $paisNombre = Pais::where("CODIGO_PAIS", "=", $row["CODIGO_PAIS"])->first();

                $data[] = array(
                    'id'   => $row["CODIGO_DEPARTAMENTO"],
                    'name'   => $row["NOMBRE"],
                    'country_code'   => $row["CODIGO_PAIS"],
                    'country_name'   => $paisNombre->NOMBRE,
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
                    'message' => 'Error al momento de redirecionar a Departamento con error ' + $th
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
    //funcion utilizada para crear un nuevo item de pais
    public function Store(Request $request)
    {

        $validator = $this->validacionDepartamento($request);

        if ($validator->fails()) {

            $errors = $validator->errors();

            return response()->json(['success' => false, 'error' => 1, 'error_msg' => $errors->first()], 200);
        } else {

            $data = [
                'CODIGO_DEPARTAMENTO' => $request->id,
                'NOMBRE' => $request->name,
                'CODIGO_PAIS' => $request->selectPais,

            ];


            try {
                Departamento::create($data);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'El Departamento fue creado con éxito.'
                    ]
                );
            } catch (\Throwable $th) {
                //throw $th;
                return response()->json(
                    [
                        'success' => False,
                        'message' => 'Error al momento de crear el departamento con error ' + $th
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
    //Funcion utilizada para redirigir los datos para actualizar un pais
    public function update($id)
    {

        try {
            $departamento  = Departamento::find($id);

            return response()->json([
                'data' => $departamento
            ]);
        } catch (\Throwable $th) {

            return response()->json([
                'success' => false,
                'message' => 'Error al momento de redireccionar ' + $th
            ]);
        }
    }

    //Funcion utilizada para crear la validacion y el actualizacion de un pais.
    public function updateDepartment(Request $request)
    {

        $validator = $this->validacionDepartamento($request);

        if ($validator->fails()) {

            $errors = $validator->errors();

            return response()->json(['success' => false, 'error de validacion ' => 1, 'error_msg' => $errors->first()], 200);
        } else {


            $departamento = Departamento::find($request->id);

            $departamento->CODIGO_DEPARTAMENTO = (int)$request->id;
            $departamento->NOMBRE = $request->name;
            $departamento->CODIGO_PAIS = (int)$request->selectPais;
            // $departamento->updated_at = now();

            try {

                if ($departamento->save()) {

                    return response()->json(
                        [
                            'success' => true,
                            'message' => 'La actualización del departamento fue realizada con éxito.'
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            'success' => false,
                            'message' => 'Error al realizar la actualización del departamento.'
                        ]
                    );
                }
            } catch (\Throwable $th) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en el catch al momento de actualizar el departamento.'
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
    //Funcion utiñizada para realizar la eliminacion de un item de pais
    public function destroy($id)
    {

        try {
            $event = Departamento::find($id);

            $event->delete();

            return response()->json([
                'message' => 'El Departamento fue eliminado con éxito.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el departamento de id ' + $th
            ]);
        }
    }

    // ******************************************************************
    //Funcion utilizada para validar tanto al momento de crear un nuevo item de pais o al momento de actualizar
    public function validacionDepartamento(Request $request)
    {

        $departamento = Departamento::find($request->id);

        if ($departamento != null) {

            $rules = [
                'name' => 'required|string|min:002|max:150',
                'selectPais' => 'required',
            ];

            $customMessages = [

                'name.string' => 'El campo Nombre debe ser de tipo texto.',
                'name.required' => 'El campo Nombre es requerido.',
                'name.min' => 'El campo Nombre solo puede tener un minimo de 2 caracteres.',
                'name.max' => 'El campo Nombre solo puede tener un maxino de 5 caracteres.',

                'selectPais.required' => 'El campo Seleccione un país es requerido.',


            ];
            $validator = Validator::make($request->all(), $rules, $customMessages);

            return $validator;
        } else {

            $rules = [
                'id' => 'required|numeric|min:001|max:999',
                'name' => 'required|string|min:002|max:150',
                'selectPais' => 'required',
            ];

            $customMessages = [

                'id.numeric' => 'El campo Código Departamento debe ser de tipo numérico.',
                'id.required' => 'El campo Código Departamento es requerido.',
                'id.min' => 'El campo Código Departamento solo puede tener un minimo de 1 caracter.',
                'id.max' => 'El campo Código Departamento solo puede tener un maxino de 3 caracteres.',


                'name.string' => 'El campo Nombre debe ser de tipo texto.',
                'name.required' => 'El campo Nombre es requerido.',
                'name.min' => 'El campo Nombre solo puede tener un minimo de 2 caracteres.',
                'name.max' => 'El campo Nombre solo puede tener un maxino de 5 caracteres.',

                'selectPais.required' => 'El campo Seleccione un país debe ser requerido.',

            ];

            $validator = Validator::make($request->all(), $rules, $customMessages);

            return $validator;
        }
    }
}
