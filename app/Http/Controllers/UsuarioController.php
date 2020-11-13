<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //funcion que redirecciona a la pagina de Usuario
    public function index()
    {
        return view('/usuarios/perfil/Perfil');
    }


    //funcion que consulta todo los datos y los devuelve en formato json
    public function get_perfiles_data(Request $request)
    {

        try {
            // $Usuarios = Usuario::orderBy('updated_at', 'DESC')->get('id','num_id','type_id','first_name','last_name');

            $Usuarios = Usuario::select('id', 'NUM_IDENTIFICACION', 'TIPO_DOCUMENTO', 'PRIMER_NOMBRE', 'PRIMER_APELLIDO', 'created_by', 'deleted_at', 'created_at', 'updated_at')->orderBy('updated_at', 'DESC')->get();

            //    echo'<pre>';
            //     return $Usuarios;
            //    echo'<pre>';

            foreach ($Usuarios as $row) {

                // $departamentoNombre = Departamento::where("CODIGO_DEPARTAMENTO", "=", $row["CODIGO_DEPARTAMENTO"])->first();

                // $paisNombre = Pais::where("CODIGO_PAIS", "=", $departamentoNombre->CODIGO_PAIS)->first();

                $data[] = array(

                    'id'   => $row["id"],
                    'num_id'   => $row["NUM_IDENTIFICACION"],
                    'type_id'   => $row["TIPO_DOCUMENTO"],
                    'first_name'   => $row["PRIMER_NOMBRE"],
                    'last_name'   => $row["PRIMER_APELLIDO"],
                    // 'date_of_birth'   => $row["FECHA_DE_NACIMIENTO"],
                    // 'state'   => $row["ESTADO"],
                    // 'sex'   => $row["SEXO"],
                    // 'blood_type'   => $row["GRUPO_SANGUINEO"],
                    // 'factor_type'   => $row["FACTOR_RH"],
                    // 'civil_status'   => $row["ESTADO_CIVIL"],
                    // 'work_related'   => $row["VINCULO_LABORAL"],
                    // 'impairment'   => $row["DISCAPACIDAD"],
                    // 'type_impairment'   => $row["TIPO_DISCAPACIDAD"],
                    // 'status_impairment'   => $row["CONDICION_DISCAPACIDAD"],
                    // 'ethnic_group'   => $row["ETNIA"],
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
                    'message' => 'Error al momento de redirecionar a Usuario con error ' + $th
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
    //funcion utilizada para crear un nuevo item de Usuario
    public function Store(Request $request)
    {

        $validator = $this->validacionUsuario($request);

        if ($validator->fails()) {

            $errors = $validator->errors();

            return response()->json(['success' => false, 'error' => 1, 'error_msg' => $errors->first()], 200);
        } else {





            $data = [

                'NUM_IDENTIFICACION' => (int)$request->id,
                'TIPO_DOCUMENTO' => $request->type_id,
                'PRIMER_NOMBRE' => $request->first_name,
                'SEGUNDO_NOMBRE' => $request->second_name,
                'PRIMER_APELLIDO' => $request->last_name,
                'SEGUNDO_APELLIDO' => $request->second_surname,
                'FECHA_DE_NACIMIENTO' => $request->date_of_birth,
                'ESTADO' => $request->state,
                'SEXO' => $request->sex,
                'GRUPO_SANGUINEO' => $request->blood_type,
                'FACTOR_RH' => $request->factor_type,
                'ESTADO_CIVIL' => $request->civil_status,
                'VINCULO_LABORAL' => $request->work_related,
                'DISCAPACIDAD' => $request->impairment,
                'TIPO_DISCAPACIDAD' => $request->type_impairment,
                'CONDICION_DISCAPACIDAD' => $request->status_impairment,
                'ETNIA' => (int)$request->ethnic_group,

            ];




            try {
                Usuario::create($data);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'El Usuario fue creado con éxito.'
                    ]
                );
            } catch (\Throwable $th) {
                //throw $th;
                return response()->json(
                    [
                        'success' => False,
                        'message' => 'Error al momento de crear el Usuario con error ' + $th
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
    //Funcion utilizada para redirigir los datos para actualizar un Usuario
    public function update($id)
    {

        try {
            $Usuario  = Usuario::find($id);

            // $departamentoNombre = Departamento::where("CODIGO_DEPARTAMENTO", "=", $Usuario["CODIGO_DEPARTAMENTO"])->first();

            // $Usuario['CODIGO_PAIS'] =  $departamentoNombre->CODIGO_PAIS;


            return response()->json([
                'data' => $Usuario
            ]);
        } catch (\Throwable $th) {

            return response()->json([
                'success' => false,
                'message' => 'Error al momento de redireccionar ' + $th
            ]);
        }
    }

    //Funcion utilizada para crear la validacion y el actualizacion de un pais.
    public function updatePerfil(Request $request)
    {

        $validator = $this->validacionUsuario($request);

        // echo '<pre>';
        // return $validator;
        // echo '</pre>';

        if ($validator->fails()) {

            $errors = $validator->errors();

            return response()->json(['success' => false, 'error de validacion ' => 1, 'error_msg' => $errors->first()], 200);
        } else {

            $Usuario = Usuario::find($request->id);


            $Usuario->NUM_IDENTIFICACION = (int)$request->id;
            $Usuario->TIPO_DOCUMENTO = $request->type_id;
            $Usuario->PRIMER_NOMBRE = $request->first_name;
            $Usuario->SEGUNDO_NOMBRE = $request->second_name;
            $Usuario->PRIMER_APELLIDO = $request->last_name;
            $Usuario->SEGUNDO_APELLIDO = $request->second_surname;
            $Usuario->FECHA_DE_NACIMIENTO = $request->date_of_birth;
            $Usuario->ESTADO = $request->state;
            $Usuario->SEXO = $request->sex;
            $Usuario->GRUPO_SANGUINEO = $request->blood_type;
            $Usuario->FACTOR_RH = $request->factor_type;
            $Usuario->ESTADO_CIVIL = $request->civil_status;
            $Usuario->VINCULO_LABORAL = $request->work_related;
            $Usuario->DISCAPACIDAD = $request->impairment;
            $Usuario->TIPO_DISCAPACIDAD = $request->type_impairment;
            $Usuario->CONDICION_DISCAPACIDAD = $request->status_impairment;
            $Usuario->ETNIA = (int)$request->ethnic_group;

            try {

                if ($Usuario->save()) {

                    return response()->json(
                        [
                            'success' => true,
                            'message' => 'La actualización del usuario fue realizada con éxito.'
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            'success' => false,
                            'message' => 'Error al realizar la actualización del Usuario.'
                        ]
                    );
                }
            } catch (\Throwable $th) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en el catch al momento de actualizar el Usuario.'
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
    //Funcion utiñizada para realizar la eliminacion de un item de Usuario
    public function destroy($id)
    {

        try {
            $event = Usuario::find($id);

            $event->delete();

            return response()->json([
                'message' => 'El Usuario fue eliminado con éxito.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el Usuario de id ' + $th
            ]);
        }
    }

    // ******************************************************************
    //Funcion utilizada para validar tanto al momento de crear un nuevo item de pais o al momento de actualizar
    public function validacionUsuario(Request $request)
    {

        $Usuario = Usuario::find($request->id);


        // $Usuario->NUM_IDENTIFICACION = (int)$request->id;
        // $Usuario->TIPO_DOCUMENTO = (int)$request->type_id;
        // $Usuario->PRIMER_NOMBRE = $request->first_name;
        // $Usuario->SEGUNDO_NOMBRE = $request->second_name;
        // $Usuario->PRIMER_APELLIDO = $request->last_name;
        // $Usuario->SEGUNDO_APELLIDO = $request->second_surname;
        // $Usuario->FECHA_DE_NACIMIENTO = (int)$request->date_of_birth;
        // $Usuario->ESTADO = (int)$request->state;
        // $Usuario->SEXO = (int)$request->sex;
        // $Usuario->GRUPO_SANGUINEO = (int)$request->blood_type;
        // $Usuario->FACTOR_RH = (int)$request->factor_type;
        // $Usuario->ESTADO_CIVIL = (int)$request->civil_status;
        // $Usuario->VINCULO_LABORAL = (int)$request->work_related;
        // $Usuario->DISCAPACIDAD = (int)$request->impairment;
        // $Usuario->TIPO_DISCAPACIDAD = (int)$request->type_impairment;
        // $Usuario->CONDICION_DISCAPACIDAD = (int)$request->status_impairment;
        // $Usuario->ETNIA = (int)$request->ethnic_group;

        if ($Usuario != null) {

            $rules = [
                // 'id' => 'required|numeric|min:6|max:10',
                'type_id' => 'required',
                'first_name' => 'required|string|min:002|max:150',
                'second_name' => 'string|min:002|max:150',
                'last_name' => 'required|string|min:002|max:150',
                'second_surname' => 'string|min:002|max:150',
                'date_of_birth' => 'required|date',
                'state' => 'required',
                'sex' => 'required',
                'blood_type' => 'required',
                'factor_type' => 'required',
                'civil_status' => 'required',
                'work_related' => 'required',
                // 'impairment' => 'required',
                // 'type_impairment' => 'required',
                // 'status_impairment' => 'required',
                // 'ethnic_group' => 'required',
            ];

            $customMessages = [

                'id.string' => 'El campo Numero de Identificación debe ser de tipo texto.',
                'id.required' => 'El campo Numero de Identificación es requerido.',
                'id.min' => 'El campo Numero de Identificación solo puede tener un minimo de 6 caracteres.',
                'id.max' => 'El campo Numero de Identificación solo puede tener un máximo de 12 caracteres.',

                'type_id.required' => 'El campo Seleccione un Tipo de Identificación es requerido.',

                'first_name.string' => 'El campo Primer Nombre debe ser de tipo texto.',
                'first_name.required' => 'El campo Primer Nombre es requerido.',
                'first_name.min' => 'El campo Primer Nombre solo puede tener un minimo de 2 caracteres.',
                'first_name.max' => 'El campo Primer Nombre solo puede tener un máximo de 5 caracteres.',

                'second_name.string' => 'El campo Segundo Nombre debe ser de tipo texto.',
                'second_name.required' => 'El campo Segundo Nombre es requerido.',
                'second_name.min' => 'El campo Segundo Nombre solo puede tener un minimo de 2 caracteres.',
                'second_name.max' => 'El campo Segundo Nombre solo puede tener un máximo de 5 caracteres.',

                'last_name.string' => 'El campo Primer Apellido debe ser de tipo texto.',
                'last_name.required' => 'El campo Primer Apellido es requerido.',
                'last_name.min' => 'El campo Primer Apellido solo puede tener un minimo de 2 caracteres.',
                'last_name.max' => 'El campo Primer Apellido solo puede tener un máximo de 5 caracteres.',

                'second_surname.string' => 'El campo Segundo Apellido debe ser de tipo texto.',
                'second_surname.required' => 'El campo Segundo Apellido es requerido.',
                'second_surname.min' => 'El campo Segundo Apellido solo puede tener un minimo de 2 caracteres.',
                'second_surname.max' => 'El campo Segundo Apellido solo puede tener un máximo de 5 caracteres.',



                'selectPais.required' => 'El campo Seleccione un país es requerido.',

                'selectDepartamento.required' => 'El campo Seleccione un Departamento es requerido.',


            ];
            $validator = Validator::make($request->all(), $rules, $customMessages);

            return $validator;
        } else {

            $rules = [
                // 'id' => 'required|numeric|min:6|max:10',
                'type_id' => 'required',
                'first_name' => 'required|string|min:002|max:150',
                'second_name' => 'required|string|min:002|max:150',
                'last_name' => 'required|string|min:002|max:150',
                'second_surname' => 'required|string|min:002|max:150',
                'date_of_birth' => 'required|date',
                'state' => 'required',
                'sex' => 'required',
                'blood_type' => 'required',
                'factor_type' => 'required',
                'civil_status' => 'required',
                'work_related' => 'required',
            ];

            $customMessages = [

                'id.string' => 'El campo Numero de Identificación debe ser de tipo texto.',
                'id.required' => 'El campo Numero de Identificación es requerido.',
                'id.min' => 'El campo Numero de Identificación solo puede tener un minimo de 6 caracteres.',
                'id.max' => 'El campo Numero de Identificación solo puede tener un máximo de 12 caracteres.',

                'type_id.required' => 'El campo Seleccione un Tipo de Identificación es requerido.',

                'first_name.string' => 'El campo Primer Nombre debe ser de tipo texto.',
                'first_name.required' => 'El campo Primer Nombre es requerido.',
                'first_name.min' => 'El campo Primer Nombre solo puede tener un minimo de 2 caracteres.',
                'first_name.max' => 'El campo Primer Nombre solo puede tener un máximo de 5 caracteres.',

                'second_name.string' => 'El campo Segundo Nombre debe ser de tipo texto.',
                'second_name.required' => 'El campo Segundo Nombre es requerido.',
                'second_name.min' => 'El campo Segundo Nombre solo puede tener un minimo de 2 caracteres.',
                'second_name.max' => 'El campo Segundo Nombre solo puede tener un máximo de 5 caracteres.',

                'last_name.string' => 'El campo Primer Apellido debe ser de tipo texto.',
                'last_name.required' => 'El campo Primer Apellido es requerido.',
                'last_name.min' => 'El campo Primer Apellido solo puede tener un minimo de 2 caracteres.',
                'last_name.max' => 'El campo Primer Apellido solo puede tener un máximo de 5 caracteres.',

                'second_surname.string' => 'El campo Segundo Apellido debe ser de tipo texto.',
                'second_surname.required' => 'El campo Segundo Apellido es requerido.',
                'second_surname.min' => 'El campo Segundo Apellido solo puede tener un minimo de 2 caracteres.',
                'second_surname.max' => 'El campo Segundo Apellido solo puede tener un máximo de 5 caracteres.',



                'selectPais.required' => 'El campo Seleccione un país es requerido.',

                'selectDepartamento.required' => 'El campo Seleccione un Departamento es requerido.',

            ];

            $validator = Validator::make($request->all(), $rules, $customMessages);

            return $validator;
        }
    }
}
