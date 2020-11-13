<div class="modal fade" id="formModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-text-justify" id="formModalLabel"></h4>
            </div>
            <div class="modal-body ">
                <div id='mensajeError'> </div>
                <!-- <form id="FormPaises" name="FormPaises" class="form-horizontal" novalidate=""> -->
                <form id="FormPaises" name="FormPaises" class="form-horizontal" novalidate="false">

                    <div class="form-group">
                        <label for="id">Código País</label>
                        <input class="form-control" id="id" name="id" type="text" placeholder="Digite el Código del País." />
                    </div>


                    <!-- <span class="has-float-label">
                        <label for="id">Código País</label>
                        <input class="form-control" id="id" name="id" type="text" placeholder="Digite el Código del País." />

                    </span> -->

                    <!-- <div class="form-group">
                        <div class="floating-label">
                            <label for="id">Floating label</label>
                            <input aria-describedby="idHelp" class="form-control" id="id" placeholder="Optional placeholder" type="text">
                        </div>
                        <small id="idHelp" class="form-text text-muted">Helper text placed outside <code>.floating-label</code>.</small>
                    </div> -->

                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Digite el Nombre." value="">
                    </div>

                    <div class="form-group">
                        <label>Iso</label>
                        <input type="text" class="form-control" id="iso" name="iso" placeholder="Digite el Código ISO del País." value="">
                    </div>

                    <div class="form-group">
                        <label>Código Telefónico</label>
                        <input type="text" class="form-control" id="phonecode" name="phonecode" placeholder="Digite el Código Telefónico." value="">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <!-- <button id="btnIdCancel" name="btnIdCancel" type="reset" class="btn btn-secondary btn-danger" data-dismiss="modal">Cancelar</button> -->
                <button type="button" class="btn btn-primary" id="btn-save" value="add"></button>
                <button type="button" id="btnIdCancel" name="btnIdCancel" class="btn btn-secondary btn-danger" data-dismiss="modal">Cancelar</button>

                <input type="hidden" id="todo_id" name="todo_id" value="0">
            </div>
        </div>
    </div>
</div>
