<div class="modal fade" id="formModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-text-justify" id="formModalLabel"></h4>
            </div>
            <div class="modal-body ">
                <div id='mensajeError'> </div>
                <form id="FormPerfil" name="FormPerfil" class="form-horizontal" novalidate="false">

                    <div class="form-group">
                        <label for="id">Numero de Identificación</label>
                        <input class="form-control" id="id" name="id" type="text" placeholder="Digite el número de identificación." />
                    </div>

                    <div class="form-group">
                        <label>Tipo de Identificación</label>
                        <select id="selectTypeId" name="selectTypeId" class="form-control mdb-select md-form" searchable="Seleccione el tipo de identificación.">
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Primer Nombre</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Digite el Nombre." value="">
                    </div>

                    <div class="form-group">
                        <label>Segundo Nombre</label>
                        <input type="text" class="form-control" id="second_name" name="second_name" placeholder="Digite el segundo Nombre." value="">
                    </div>

                    <div class="form-group">
                        <label>Primer Apellido</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Digite el primer apellido." value="">
                    </div>

                    <div class="form-group">
                        <label>Segundo Apellido</label>
                        <input type="text" class="form-control" id="second_surname" name="second_surname" placeholder="Digite el segundo apellido." value="">
                    </div>

                    <div class="form-group">
                        <label>Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Digite la fecha de nacimiento." value="">
                    </div>

                    <div class="form-group">
                        <label>Estado</label>
                        <select id="selectState" name="selectState" class="form-control mdb-select md-form" searchable="Seleccione un estado.">
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Sexo</label>
                        <select id="selectSex" name="selectSex" class="form-control mdb-select md-form" searchable="Seleccione un sexo.">
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tipo de Sangre</label>
                        <select id="selectBloodType" name="selectBloodType" class="form-control mdb-select md-form" searchable="Seleccione un tipo de sangre.">
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Factor RH</label>
                        <select id="selectFactorType" name="selectFactorType" class="form-control mdb-select md-form" searchable="Seleccione el factor de sangre.">
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Estado civil</label>
                        <select id="selectCivilStatus" name="selectCivilStatus" class="form-control mdb-select md-form" searchable="Seleccione un estado civil.">
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Relación Laboral</label>
                        <select id="selectWorkRelated" name="selectWorkRelated" class="form-control mdb-select md-form" searchable="Seleccione una relación laboral.">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id">Discapacidad</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="discapacidad" name="discapacidad">
                            <label class="form-check-label" for="discapacidad">Seleccioné si presenta alguna discapacidad.</label>
                        </div>
                    </div>



                    <div id="divSelectTypeImpairment" class="form-group">
                        <label>Tipo de Discapacidad</label>
                        <select id="selectTypeImpairment" name="selectImpairment" class="form-control mdb-select md-form" searchable="Seleccione un Tipo de Discapacidad.">
                        </select>
                    </div>

                    <div id="divSelectStatusImpairment" class="form-group">
                        <label>Estado de Discapacidad</label>
                        <select id="selectStatusImpairment" name="selectStatusImpairment" class="form-control mdb-select md-form" searchable="Seleccione un Estado de Discapacidad.">
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Etnía</label>
                        <select id="selectEthnicGroup" name="selectEthnicGroup" class="form-control mdb-select md-form" searchable="Seleccione una Etnía.">
                        </select>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add"></button>
                <button type="button" id="btnIdCancel" name="btnIdCancel" class="btn btn-secondary btn-danger" data-dismiss="modal">Cancelar</button>

                <input type="hidden" id="todo_id" name="todo_id" value="0">
            </div>
        </div>
    </div>
</div>
