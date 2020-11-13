<div class="modal fade" id="formModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-text-justify" id="formModalLabel"></h4>
            </div>
            <div class="modal-body ">
                <div id='mensajeError'> </div>
                <form id="FormDepartamento" name="FormDepartamento" class="form-horizontal" novalidate="false">

                    <div class="form-group">
                        <label for="id">Código Departamento</label>
                        <input class="form-control" id="id" name="id" type="text" placeholder="Digite el Código del Departamento." />
                    </div>

                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Digite el Nombre." value="">
                    </div>

                    <div class="form-group">
                        <label>País</label>
                        <select id="selectPais" name="selectPais" class="form-control mdb-select md-form" searchable="Seleccione un país..">
                            <!-- <option value="" disabled selected>Seleccione un país.</option> -->
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
