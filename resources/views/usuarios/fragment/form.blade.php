<link href="{{ asset('/css/ie10-viewport-bug-workaround.css') }}"
	rel="stylesheet">
<link href="{{ asset('/css/jquery-ui.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/form.css') }}" rel="stylesheet">

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<!-- <script src="{{ asset('js/validation/bootstrapValidator.min.js') }}"></script> -->
<script src="{{ asset('/js/script.js') }}"></script>
<script src="{{ asset('/js/validation/usuForm.js') }}"></script>


<!-- 	<script src="public/js/script.js"></script> -->

<div class="col-md-10 col-md-offset-1">
	<img src="{{ asset('img/imgLogin/Boton-Ejemplo.jpg') }}"
		id='logoImagen'>

	<div class="col-md-10 col-md-offset-1">
		<fieldset>
			<legend>
				<label><a class="requerido"></a><font color='red'> Estos campos son
						requeridos </font></label>
			</legend>
		</fieldset>
	</div>

	<div class="container">

		<div class="container " id="contenedorUsuario"
			style="width: 95%; , height: 250%;">
			<div class="container " id="contenedorBandeja">
				<div class="col-xs-12 col-sm-12"></div>
			</div>

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion"
							href="#collapseOne">Gestión de Usuario.</a>
					</h3>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body" style="padding-left: 5%;">
						<div class="row" style="width: 96%;">

							{{ $usuario->TIPO_DOCUMENTO or 'Valor por defecto' }}
							<div class="row">
								<div class="col-lg-6">
									<label class="col-md-5 control-label"><a class="requerido"></a>
										Tipo de Documento</label>
									<div class="input-group">
										<span class="input-group-addon"><i
											class="glyphicon glyphicon-user"></i></span>

										@if(isset($usuario)) {!!Form::select('TIPO_DOCUMENTO', ['SC'
										=> 'Salvoconducto de Permanencia', 'CD' => 'Carné
										Diplomático', 'PA' => 'Pasaporte', 'CE' => 'Cedula de
										Extranjería', 'CC' => 'Cedula de Ciudadanía', 'TI' => 'Tarjeta
										de Identidad', 'RC'=>'Registro Civil', 'CN'=>'Certificado de
										Nacido Vivo'], null, ['class'=>'form-control','placeholder' =>
										'Seleccione Tipo de Documento','readonly'=>'true'])!!} @else
										{!!Form::select('TIPO_DOCUMENTO', ['SC' => 'Salvoconducto de
										Permanencia', 'CD' => 'Carné Diplomático', 'PA' =>
										'Pasaporte', 'CE' => 'Cedula de Extranjería', 'CC' => 'Cedula
										de Ciudadanía', 'TI' => 'Tarjeta de Identidad',
										'RC'=>'Registro Civil', 'CN'=>'Certificado de Nacido Vivo'],
										null, ['class'=>'form-control','placeholder' => 'Seleccione
										Tipo de Documento'])!!} @endif

									</div>
									{!! $errors->first('TIPO_DOCUMENTO',' <span
										class="alert text-danger pull-right"><button type="button"
											class="close" data-dismiss="alert">&times;</button> :message.
									</span> ')!!}
								</div>
								<div class="col-lg-6">
									<label class="col-md-5 control-label"><a class="requerido"></a>
										Núm de Identificación</label>
									<div class="input-group">
										<span class="input-group-addon"><i
											class="glyphicon glyphicon-user"></i></span>
										@if(isset($usuario)) {!!
										Form::text('NUM_IDENTIFICACION',null,['class'=>'form-control','placeholder'
										=> 'Digite Número de
										identificación','readonly'=>'readonly'])!!} @else {!!
										Form::text('NUM_IDENTIFICACION',null,['class'=>'form-control','placeholder'
										=> 'Digite Número de identificación'])!!} @endif
									</div>
									{!! $errors->first('NUM_IDENTIFICACION',' <span
										class="alert text-danger pull-right"><button type="button"
											class="close" data-dismiss="alert">&times;</button> :message.
									</span> ')!!}
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-6">
									<label class="col-md-5 control-label"><a class="requerido"></a>
										Primer Nombre</label>
									<div class="input-group">
										<span class="input-group-addon"><i
											class="glyphicon glyphicon-user"></i></span> {!!
										Form::text('PRIMER_NOMBRE',null,['class'=>'form-control','placeholder'=>
										'Digite Primer Nombre'])!!}
									</div>
									{!! $errors->first('PRIMER_NOMBRE',' <span
										class="alert text-danger pull-right"><button type="button"
											class="close" data-dismiss="alert">&times;</button> :message.
									</span> ')!!}
								</div>
								<div class="col-lg-6">
									<label class="col-md-5 control-label">&nbsp; &nbsp; Segundo
										Nombre</label>
									<div class="input-group">
										<span class="input-group-addon"><i
											class="glyphicon glyphicon-user"></i></span> {!!
										Form::text('SEGUNDO_NOMBRE',null,['class'=>'form-control','placeholder'=>
										'Digite Segundo Nombre'])!!}
									</div>
									{!! $errors->first('SEGUNDO_NOMBRE',' <span
										class="alert text-danger pull-right"><button type="button"
											class="close" data-dismiss="alert">&times;</button> :message.
									</span> ')!!}
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-6">
									<label class="col-md-5 control-label"><a class="requerido"></a>
										Primer Apellido</label>
									<div class="input-group">
										<span class="input-group-addon"><i
											class="glyphicon glyphicon-user"></i></span> {!!
										Form::text('PRIMER_APELLIDO',null,['class'=>'form-control','placeholder'
										=> 'Digite Primer Apellido'])!!}
									</div>
									{!! $errors->first('PRIMER_APELLIDO',' <span
										class="alert text-danger pull-right"><button type="button"
											class="close" data-dismiss="alert">&times;</button> :message.
									</span> ')!!}
								</div>
								<div class="col-lg-6">
									<label class="col-md-5 control-label"> &nbsp; &nbsp; Segundo
										Apellido</label>
									<div class="input-group">
										<span class="input-group-addon"><i
											class="glyphicon glyphicon-user"></i></span> {!!
										Form::text('SEGUNDO_APELLIDO',null,['class'=>'form-control','placeholder'
										=> 'Digite Segundo Apellido'])!!}
									</div>
									{!! $errors->first('SEGUNDO_APELLIDO',' <span
										class="alert text-danger pull-right"><button type="button"
											class="close" data-dismiss="alert">&times;</button> :message.
									</span> ')!!}
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-6">
									<label class="col-md-5 control-label"><a class="requerido"></a>
										Fecha de Nacimiento</label>
									<div class="input-group">
										<span class="input-group-addon"><i
											class="glyphicon glyphicon-user"></i></span> {!!
										Form::date('FECHA_DE_NACIMIENTO',null,['class'=>'form-control','placeholder'
										=> 'Digite Fecha de Nacimiento'])!!}
									</div>
									{!! $errors->first('FECHA_DE_NACIMIENTO',' <span
										class="alert text-danger pull-right"><button type="button"
											class="close" data-dismiss="alert">&times;</button> :message.
									</span> ')!!}
								</div>
								<div class="col-lg-6">
									<label class="col-md-5 control-label"><a class="requerido"></a>
										Genero</label> <label class="radio-inline">{!!
										Form::radio('SEXO', 'M', (old('SEXO') == 'M'), ['id' =>
										'Masculino']) !!}Masculino </label> <label
										class="radio-inline">{!! Form::radio('SEXO', 'F', (old('SEXO')
										== 'F'), ['id'=>'Femenino']) !!}Femenino </label> {!!
									$errors->first('SEXO',' <span
										class="alert text-danger pull-right"><button type="button"
											class="close" data-dismiss="alert">&times;</button> :message.
									</span> ')!!}
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-6">
									<label class="col-md-5 control-label"><a class="requerido"></a>
										Grupo Sanguíneo</label>
									<div class="input-group">
										<span class="input-group-addon"><i
											class="glyphicon glyphicon-user"></i></span>
										{!!Form::select('GRUPO_SANGUINEO', ['A' => 'A', 'B' => 'B',
										'O' => 'O', 'AB' => 'AB'], null,
										['class'=>'form-control','placeholder' => 'Seleccione Grupo
										Sanguineo'])!!}
									</div>
									{!! $errors->first('GRUPO_SANGUINEO',' <span
										class="alert text-danger pull-right"><button type="button"
											class="close" data-dismiss="alert">&times;</button> :message.
									</span> ')!!}
								</div>
								<div class="col-lg-6">
									<label class="col-md-5 control-label"><a class="requerido"></a>
										Factor RH</label> <label class="radio-inline">{!!
										Form::radio('FACTOR_RH', '+', (old('FACTOR_RH') == '+'), ['id'
										=> 'positivo']) !!}Positivo </label> <label
										class="radio-inline">{!! Form::radio('FACTOR_RH', '-',
										(old('FACTOR_RH') == '-'), ['id'=>'negativo']) !!}Negativo </label>
									{!! $errors->first('FACTOR_RH',' <span
										class="alert text-danger pull-right"><button type="button"
											class="close" data-dismiss="alert">&times;</button> :message.
									</span> ')!!}
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-6">
									<label class="col-md-5 control-label">&nbsp; &nbsp; Etnia</label>
									<div class="input-group">
										<span class="input-group-addon"><i
											class="glyphicon glyphicon-user"></i></span>
										{!!Form::select('ETNIA', ['01' => 'Indígena', '02' => 'Rrom
										(gitano)','03'=>'Raizal (San Andrés y
										Providencia)','04'=>'Palenquero (San Basilio de
										Palenque)','05'=>'Negro(a), afrocolombiano(a)'], null,
										['class'=>'form-control','placeholder' => 'Seleccione
										Etnia'])!!}
									</div>
									{!! $errors->first('ETNIA',' <span
										class="alert text-danger pull-right"><button type="button"
											class="close" data-dismiss="alert">&times;</button> :message.
									</span> ')!!}
								</div>
								<div class="col-lg-6">
									<label class="col-md-5 control-label"><a class="requerido"></a>
										Estado Civil</label>
									<div class="input-group">
										<span class="input-group-addon"><i
											class="glyphicon glyphicon-user"></i></span>
										{!!Form::select('ESTADO_CIVIL', ['S' => 'Soltero/a', 'P' =>
										'Comprometido/a','U'=>'Union
										Libre','E'=>'Separado/a','C'=>'Casado/a','D'=>'Divorciado/a','V'=>'Viudo/a'],
										null, ['class'=>'form-control','placeholder' => 'Seleccione
										Estado Civil'])!!}
									</div>
									{!! $errors->first('ESTADO_CIVIL',' <span
										class="alert text-danger pull-right"><button type="button"
											class="close" data-dismiss="alert">&times;</button> :message.
									</span> ')!!}
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-6">
									<label class="col-md-5 control-label"><a class="requerido"></a>
										Vínculo Laboral</label>
									<div class="input-group">
										<span class="input-group-addon"><i
											class="glyphicon glyphicon-user"></i></span>
										{!!Form::select('VINCULO_LABORAL', ['C' => 'Afiliado/a o
										Cotizante', 'B' => 'Beneficiario/a'], null,
										['class'=>'form-control','placeholder' => 'Seleccione Vínculo
										Laboral'])!!}
									</div>
									{!! $errors->first('VINCULO_LABORAL',' <span
										class="alert text-danger pull-right"><button type="button"
											class="close" data-dismiss="alert">&times;</button> :message.
									</span> ')!!}
								</div>
								<div class="col-lg-6">
									<label class="col-md-5 control-label"><a class="requerido"></a>
										Estado </label>
									<div class="input-group">
										<span class="input-group-addon"><i
											class="glyphicon glyphicon-user"></i></span>
										{!!Form::select('ESTADO', ['A' => 'ACTIVO', 'I' => 'INACTIVO',
										'M' => 'MORA', 'D' => 'DESACTIVADO'], null,
										['class'=>'form-control','placeholder' => 'Estado'])!!}
									</div>
									{!! $errors->first('ESTADO',' <span
										class="alert text-danger pull-right"><button type="button"
											class="close" data-dismiss="alert">&times;</button> :message.
									</span> ')!!}
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-6">
									<label class="col-md-5 control-label"><a class="requerido"></a>
										Discapacidad </label>
									<div class="input-group">
										<label class="radio-inline">{!! Form::radio('DISCAPACIDAD',
											'1', (old('DISCAPACIDAD') == '1'), ['id' => 'Discapacitado'])
											!!}Discapacitado </label> <label class="radio-inline">{!!
											Form::radio('DISCAPACIDAD', '0', (old('DISCAPACIDAD') ==
											'0'), ['id'=>'SinDiscapacidad']) !!}Sin Discapacidad </label>
									</div>
									{!! $errors->first('DISCAPACIDAD',' <span
										class="alert text-danger pull-right"><button type="button"
											class="close" data-dismiss="alert">&times;</button> :message.
									</span> ')!!}
								</div>
								<div class="col-lg-6">

									<label class="col-md-5 control-label"><a class="requerido"></a>
										<!-- 										Condición --> Cond Discapacidad</label>
									<div class="input-group">

										<label class="radio-inline">{!!
											Form::radio('CONDICION_DISCAPACIDAD', 'T',
											(old('CONDICION_DISCAPACIDAD') == 'T'), ['id' => 'Temporal'])
											!!}Temporal </label> <label class="radio-inline">{!!
											Form::radio('CONDICION_DISCAPACIDAD', 'P',
											(old('CONDICION_DISCAPACIDAD') == 'P'), ['id'=>'Permanente'])
											!!}Permanente </label>
									</div>
									{!! $errors->first('CONDICION_DISCAPACIDAD',' <span
										class="alert text-danger pull-right"><button type="button"
											class="close" data-dismiss="alert">&times;</button> :message.
									</span> ')!!}
								</div>
								<br>
								<div class="row">
									<div class="col-lg-6">
										<label class="col-md-5 control-label"><a class="requerido"></a>Tipo
											de Discapacidad </label>
										<div class="input-group">
											<span class="input-group-addon"><i
												class="glyphicon glyphicon-user"></i></span>
											{!!Form::select('TIPO_DISCAPACIDAD', ['F' => 'Física', 'N' =>
											'Neuro-sensorial','M'=>'Mental'], null,
											['class'=>'form-control','placeholder' => 'Seleccione Tipo
											Discapacidad'])!!}
										</div>
										{!! $errors->first('TIPO_DISCAPACIDAD',' <span
											class="alert text-danger pull-right"><button type="button"
												class="close" data-dismiss="alert">&times;</button>
											:message. </span> ')!!}
									</div>
								</div>
								<br>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">{!! Form::submit('Registrar',['class'=>'btn
				btn-default pull-right','id'=>'formUsuarioSubmit'])!!}</div>
		</div>
	</div>
</div>