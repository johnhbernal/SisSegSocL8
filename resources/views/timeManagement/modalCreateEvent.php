<div class="modal fade" id="formModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-text-justify" id="formModalLabel"></h4>
            </div>
            <div class="modal-body ">
                <div id='mensajeError'> </div>
                <form id="FormEvento" name="FormEvento" class="form-horizontal" novalidate="false">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <form>
                                    <div class="form-row">
                                        <!-- Date and time range -->
                                        <div class="col form-group">
                                            <label>Date and time range:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                                <input type="text" class="form-control float-right" id="reservationtime">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col form-group">
                                            <label for="id">Inicio de Evento</label>
                                            <input type="datetime" id="start" name="start" class="form-control" placeholder="Fecha de Inicio de evento">
                                        </div>
                                        <div class="col form-group">
                                            <label>Fin de Evento</label>
                                            <input type="time" id="end" name="end" class="form-control" placeholder="Fecha de fin de evento">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col form-group">
                                            <label>Color Fondo</label>
                                            <input type="color" id="backgroundColor" name="backgroundColor" class="form-control" placeholder="Fecha de Inicio de evento">
                                        </div>
                                        <div class="col form-group">
                                            <label>Color Texto</label>
                                            <input type="color" id="borderColor" name="borderColor" class="form-control" placeholder="Fecha de fin de evento">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="id">Titulo</label>
                                        <input class="form-control" id="title" name="title" type="text" placeholder="Digite el Titulo." />
                                    </div>

                                    <!--Textarea with icon prefix-->
                                    <div class="md-form amber-textarea active-amber-textarea-2">
                                        <label for="form24">Descripción </label>
                                        <i class="fas fa-pencil-alt prefix"></i>
                                        <textarea id="descrption" name="descrption" class="md-textarea form-control" rows="3"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
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


<!-- <script>
    jQuery('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY hh:mm A'
        }
    })
</script> -->
