<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //funcion que redirecciona a la pagina de pais
    public function index()
    {
        return view('/geolocation/pais/pais');
    }


    //funcion que consulta todo los datos y los devuelve en formato json
    public function get_country_data(Request $request)
    {
        try {
            $paises = Pais::all();

            // $paises = Pais::all()->sortByDesc('CODIGO_PAIS');

            // $paises = Pais::orderBy('CODIGO_PAIS', 'desc')->get();

            foreach ($paises as $row) {

                $data[] = array(
                    'id'   => $row["CODIGO_PAIS"],
                    'name'   => $row["NOMBRE"],
                    'iso'   => $row["ISO"],
                    'phone_code'   => $row["CODIGO_TELEFONICO"],
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
                    'message' => 'Error al momento de redirecionar a país con error ' + $th
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

        $validator = $this->validacionPais($request);

        if ($validator->fails()) {

            $errors = $validator->errors();

            return response()->json(['success' => false, 'error' => 1, 'error_msg' => $errors->first()], 200);
        } else {

            $data = [
                'CODIGO_PAIS' => $request->id,
                'NOMBRE' => $request->name,
                'ISO' => $request->iso,
                'CODIGO_TELEFONICO' => $request->phone_code
            ];


            try {
                Pais::create($data);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'El País fue creado con éxito.'
                    ]
                );
            } catch (\Throwable $th) {
                //throw $th;
                return response()->json(
                    [
                        'success' => False,
                        'message' => 'Error al moemnto de actulizar el país con error ' + $th
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
            $pais  = Pais::find($id);

            return response()->json([
                'data' => $pais
            ]);
        } catch (\Throwable $th) {

            return response()->json([
                'success' => false,
                'message' => 'Error al moemnto de redireccionar ' + $th
            ]);
        }
    }

    //Funcion utilizada para crear la validacion y el actualizacion de un pais.
    public function updateCountry(Request $request)
    {

        $validator = $this->validacionPais($request);

        if ($validator->fails()) {

            $errors = $validator->errors();

            return response()->json(['success' => false, 'error de validacion ' => 1, 'error_msg' => $errors->first()], 200);
        } else {

            try {
                $pais = Pais::find($request->id);

                $pais->CODIGO_PAIS = $request->id;
                $pais->NOMBRE = $request->name;
                $pais->ISO = $request->iso;
                $pais->CODIGO_TELEFONICO = $request->phone_code;

                if ($pais->save()) {

                    return response()->json(
                        [
                            'success' => true,
                            'message' => 'La actualización del país fue realizada con éxito.'
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            'success' => false,
                            'message' => 'Error al realizar la actualización del país.'
                        ]
                    );
                }
            } catch (\Throwable $th) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en el catch al momento de actualizar el país.'
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
            $event = Pais::find($id);

            $event->delete();

            return response()->json([
                'message' => 'El País fue eliminado con éxito.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el país de id ' + $th
            ]);
        }
    }

    // ******************************************************************
    //Funcion utilizada para validar tanto al momento de crear un nuevo item de pais o al momento de actualizar
    public function validacionPais(Request $request)
    {

        $pais = Pais::find($request->id);

        if ($pais != null) {

            $rules = [
                // 'name' => 'required|regex:/^[ñA-Za-z _]*[ñA-Za-z][ñA-Za-z _]*$/|min:002|max:150|unique:p_pais,NOMBRE,',
                // 'iso' => 'required|regex:/^[ñA-Za-z _]*[ñA-Za-z][ñA-Za-z _]*$/|min:2|max:5|unique:p_pais,ISO',


                // 'title' => "required|unique:posts,title,{$this->post->id}",
                // 'id' => 'required|numeric|min:001|max:999|unique:p_pais,CODIGO_PAIS,{$pais->CODIGO_PAIS}',
                'name' => 'required|alpha|min:002|max:150|unique:p_pais,NOMBRE',
                'iso' => 'required|alpha|min:002|max:5|unique:p_pais',
                'phone_code' => 'required|numeric|min:00001|max:99999'
            ];

            $customMessages = [
                // 'required' => 'The :attribute field is required.',

                'name.unique' => 'El campo Nombre debe ser unico.',
                'name.alpha' => 'El campo Nombre debe ser de tipo texto.',
                // 'name.regex' => 'El campo Nombre debe ser de tipo texto.',
                'name.required' => 'El campo Nombre es requerido.',
                'name.min' => 'El campo Nombre solo puede tener un minimo de 2 caracteres.',
                'name.max' => 'El campo Nombre solo puede tener un maxino de 5 caracteres.',

                'iso.unique' => 'El campo ISO debe ser unico.',
                'iso.alpha' => 'El campo ISO debe ser de tipo texto.',
                // 'iso.regex' => 'El campo Nombre debe ser de tipo texto.',
                'iso.required' => 'El campo Iso es requerido.',
                'iso.min' => 'El campo Iso solo puede tener un minimo de 2 caracteres.',
                'iso.max' => 'El campo Iso solo puede tener un maxino de 5 caracteres.',

                'phone_code.numeric' => 'El campo Código Telefónico debe ser de tipo numérico.',
                'phone_code.required' => 'El campo Código Telefónico es requerido.',
                'phone_code.min' => 'El campo Código Telefónico solo puede tener un minimo de 1 caracter.',
                'phone_code.max' => 'El campo Código Telefónico solo puede tener un maxino de 5 caracteres.'

            ];
            $validator = Validator::make($request->all(), $rules, $customMessages);

            return $validator;
        } else {

            $rules = [
                'id' => 'required|numeric|min:001|max:999|unique:p_pais,CODIGO_PAIS',
                'name' => 'required|alpha|min:002|max:150|unique:p_pais,NOMBRE',
                'iso' => 'required|alpha|min:002|max:5|unique:p_pais,ISO',
                // 'name' => 'required|regex:/^[ñA-Za-z _]*[ñA-Za-z][ñA-Za-z _]*$/|min:002|max:150|unique:p_pais,NOMBRE,',
                // 'iso' => 'required|regex:/^[ñA-Za-z _]*[ñA-Za-z][ñA-Za-z _]*$/|min:2|max:5|unique:p_pais,ISO',
                'phone_code' => 'required|numeric|min:00001|max:99999'
            ];

            $customMessages = [
                // 'required' => 'The :attribute field is required.',

                'id.unique' => 'El campo Código País debe ser unico.',
                'id.numeric' => 'El campo Código País debe ser de tipo numérico.',
                'id.required' => 'El campo Código País es requerido.',
                'id.min' => 'El campo Código País solo puede tener un minimo de 1 caracter.',
                'id.max' => 'El campo Código País solo puede tener un maxino de 3 caracteres.',

                'name.unique' => 'El campo Nombre debe ser unico.',
                'name.alpha' => 'El campo Nombre debe ser de tipo texto.',
                'name.required' => 'El campo Nombre es requerido.',
                'name.min' => 'El campo Nombre solo puede tener un minimo de 2 caracteres.',
                'name.max' => 'El campo Nombre solo puede tener un maxino de 5 caracteres.',

                'iso.unique' => 'El campo ISO debe ser unico.',
                'iso.alpha' => 'El campo ISO debe ser de tipo texto.',
                'iso.required' => 'El campo Iso es requerido.',
                'iso.min' => 'El campo Iso solo puede tener un minimo de 2 caracteres.',
                'iso.max' => 'El campo Iso solo puede tener un maxino de 5 caracteres.',

                'phone_code.numeric' => 'El campo Código Telefónico debe ser de tipo numérico.',
                'phone_code.required' => 'El campo Código Telefónico es requerido.',
                'phone_code.min' => 'El campo Código Telefónico solo puede tener un minimo de 1 caracter.',
                'phone_code.max' => 'El campo Código Telefónico solo puede tener un maxino de 5 caracteres.'

            ];

            $validator = Validator::make($request->all(), $rules, $customMessages);

            return $validator;
        }
    }
}
