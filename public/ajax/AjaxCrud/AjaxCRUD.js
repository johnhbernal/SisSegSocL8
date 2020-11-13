    //funcion utilizada para crear un nuevo item, recibe el formulario y la direccion del ajax de crear
    function createItem(formData, ajaxurl, $dataTable) {

        var type = "POST";
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function(data) {

                if (data.success = 'true' && data.message != undefined) {

                    mostrarMensaje("#mensaje", 'true', data.message, $dataTable);
                }
                if (data.success = 'false' && data.error_msg != undefined) {

                    mostrarMensaje("#mensajeError", 'false', data.error_msg, $dataTable);
                }
            },
            error: function(data) {
                console.log('Error al momento de crear el item  ' + ' succes  ' + data.success + data.message)
                return false
            }
        });
    }

    //funcion utilizada para leer los items existente en la base de datos, recibe el formulario o tabla en que se va a mostrar  y la direccion del ajax de leer datos
    function readItem(ajaxUrl, ShowDataFunction, $dataTable) {
        $.ajax({
            url: ajaxUrl,
            type: 'GET',
            data: {}
        }).done(function(data) {
            ShowDataFunction + (data)
        });

    }

    //funcion utilizada para editar un item existente, recibe el formulario y la direccion del ajax de actualizar
    function updateItem(formData, ajaxUrl, $dataTable) {

        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Realmente deseas actualizar el campo de id = " + formData.id + " ?",
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: '¡Sí, actualícelo!',
            showCancelButton: true,
            cancelButtonText: '¡Cancelar!',
            cancelButtonColor: '#d33',
        }).then((result) => {

            if (result.value === true) {

                $.ajax({

                    url: ajaxUrl,
                    // type: "GET",
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    success: function(data) {

                        if (data.success = 'true' && data.message != undefined) {

                            mostrarMensaje("#mensaje", 'true', data.message, $dataTable);

                        }
                        if (data.success = 'false' && data.error_msg != undefined) {

                            mostrarMensaje("#mensajeError", 'false', data.error_msg, $dataTable);

                        }

                    },
                    error: function(data) {

                        console.log('Error al momento de realizar la actualización  succes  ' + data.success + '  Mensaje ' + data.message)
                        return false

                    }
                });
            }
        })
    }

    //funcion utilizada para eliminar un item existente, recibe el id del item del campo a eliminar  y la direccion del ajax de eliminar
    function deleteItem(id, ajaxUrl, $dataTable) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Realmente deseas eliminar el campo de id = " + id + " ?",
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: '¡Sí, elimínelo!',
            showCancelButton: true,
            cancelButtonText: '¡Cancelar!',
            cancelButtonColor: '#d33',
        }).then((result) => {

            if (result.value === true) {

                $.ajax({
                    url: ajaxUrl + id,
                    type: 'DELETE',
                    data: {
                        id: id
                    },
                    success: function(response) {

                        if (response.message != undefined) {
                            mostrarMensaje("#mensaje", 'true', response.message, $dataTable);
                        } else {
                            swal("Error!", results.message, "error");
                        }
                    }
                });

            } else {

                result.dismiss;

            }


        })

    }

    //Funcion utilizada para generar los mensajes y recargar la datatable que muestra la informacion.
    function mostrarMensaje($id, $success, $error_msg, $dataTable) {


        // alert('id = ' + $id + '  success ' + $success + '  error  ' + $error_msg)
        // return false

        if ($id == '#mensajeError' && $success == 'false' && $error_msg != undefined) {

            $($id).addClass("alert alert-warning alert-dismissible fade show");

            $($id).html(
                "<b> " + $error_msg + "</b>" +
                "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
                "<span aria-hidden='true'>&times;</span>" + "</button>"

            );

            cerrarFadePopup($id, $dataTable)

        } else if ($id == '#mensaje' && $success == 'true' && $error_msg != undefined) {


            // alert('Entro aqui dos')
            // return false

            if ($("#formModal").is(":visible")) {
                $('#formModal').modal('hide');

                $($id).addClass("alert alert-success alert-dismissible fade show");

                $($id).html(
                    // "<strong>Info!</strong>" +
                    "<b> " + $error_msg + "</b>" +
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
                    "<span aria-hidden='true'>&times;</span>" + "</button>"

                );

                cerrarFadePopup($id, $dataTable)

            } else {
                $($id).addClass("alert alert-success alert-dismissible fade show");

                $($id).html(
                    // "<strong>Info!</strong>" +
                    "<b> " + $error_msg + "</b>" +
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
                    "<span aria-hidden='true'>&times;</span>" + "</button>"

                );

                cerrarFadePopup($id, $dataTable)

            }



        } else if ($id == '#mensaje' && $success == 'false' && $error_msg != undefined) {
            //validacion cuando se presentan errores pero son manejados por jquery validate en caso de fallar se valida con larval validate


            var ariaInvalidNotFalse = document.querySelectorAll('input[aria-invalid]:not([aria-invalid="false"])');


            // alert('DDDDDDDDDDDDDDDD  ' + 'error  ' + $error_msg + ariaInvalidNotFalse.length);
            // return false

            if (ariaInvalidNotFalse.length < 0 || ariaInvalidNotFalse.length == 0) {

                // alert('EEEEEEEEEEEEEEEEEEEEEEEEEEEE  ' + $id + '  success  ' + $success + '   error msg ' + $error_msg);
                // return false


                $($id).addClass("alert alert-warning alert-dismissible fade show");

                $($id).html(
                    // "<strong>Warning!</strong>" +
                    "<b> " + $error_msg + "</b>" +
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
                    "<span aria-hidden='true'>&times;</span>" + "</button>"

                );

            }
        }
    }
    // funcion utilizada para cerrar el fadeout donde se muestra el mensaje y llega a el top de la pagina
    function cerrarFadePopup($id, $dataTable) {

        $("html, body").animate({ scrollTop: 0 }, "slow");

        $($id).fadeTo(2500, 1500).slideUp(1500, function() {
            $($id).slideUp(1500);
            $($dataTable).DataTable().ajax.reload();

        });
    }
