jQuery(document).ready(function($) {

    // //----- Se realiza el llamado del modal para crear un item -----//
    jQuery('#btn-add').click(function() {

        jQuery('#formModalLabel').html("Crear Municipio");
        jQuery('#btn-save').html("Crear");
        jQuery('#id').attr('readonly', false);
        jQuery('#btn-save').val("add");
        // jQuery('#myForm').trigger("reset");
        jQuery('#formModal').modal('show');

        clearForm("#FormPerfil");

        get_select_type_id();
        get_state();
        get_sex();
        get_Blood_Type();
        get_Factor_Type();
        get_Civil_Status();
        get_Work_Related();
        discapacidad(0)
        get_Impairment();
        get_Type_Impairment();
        get_Etnia();



    });

    // Funcion utilizada para crear un nuevo campo o llamar la funcion para actualizar
    $("#btn-save").click(function(e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();

        var valDiscapacidad;

        if ($("#discapacidad").is(':checked')) {
            valDiscapacidad = 1;
        } else {
            valDiscapacidad = 0;
        }


        var formData = {
            id: jQuery('#id').val(),
            type_id: jQuery('select[id=selectTypeId]').val(),
            first_name: jQuery('#first_name').val(),
            second_name: jQuery('#second_name').val(),
            last_name: jQuery('#last_name').val(),
            second_surname: jQuery('#second_surname').val(),
            date_of_birth: jQuery('#date_of_birth').val(),
            state: jQuery('select[id=selectState]').val(),
            sex: jQuery('select[id=selectSex]').val(),
            blood_type: jQuery('select[id=selectBloodType]').val(),
            factor_type: jQuery('select[id=selectFactorType]').val(),
            civil_status: jQuery('select[id=selectCivilStatus]').val(),
            work_related: jQuery('select[id=selectWorkRelated]').val(),
            impairment: valDiscapacidad,
            type_impairment: jQuery('select[id=selectTypeImpairment]').val(),
            status_impairment: jQuery('select[id=selectStatusImpairment]').val(),
            ethnic_group: jQuery('select[id=selectEthnicGroup]').val()

        };

        var state = jQuery('#btn-save').val();

        if (state == 'Edit') {

            updateItem(formData, './updPerfiles', '#dataTableUsuario')

        } else if (state == 'add') {

            createItem(formData, './addPerfiles', '#dataTableUsuario')

        } else {

            alert('Validar opcion.');
        }



    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Funcion utilizada para abrir el modal de edicion con los datos del pais seleccionado para modificar Pais
    $('body').on('click', '[name="edit"]', function(event) {


        var currentRow = $(this).closest("tr");
        var id = currentRow.find("td:eq(0)").html();

        $.get('./addPerfiles/' + id + '/edit', function(data) {


            jQuery('#formModalLabel').html("Actualizar Municipio");
            jQuery('#btn-save').html("Editar");
            jQuery('#btn-save').val("Edit");

            jQuery('#formModal').modal('show');

            $('#divSelectStatusImpairment').hide();


            var valDiscapacidad;

            if ($("#discapacidad").is(':checked')) {
                valDiscapacidad = 1;
            } else {
                valDiscapacidad = 0;
            }

            $('#id').val(data.data.id);
            get_select_type_id(data.data.TIPO_DOCUMENTO)
            $('#first_name').val(data.data.PRIMER_NOMBRE);
            $('#second_name').val(data.data.SEGUNDO_NOMBRE);
            $('#last_name').val(data.data.PRIMER_APELLIDO);
            $('#second_surname').val(data.data.SEGUNDO_APELLIDO);
            $('#date_of_birth').val(data.data.FECHA_DE_NACIMIENTO);
            get_state(data.data.ESTADO)
            get_sex(data.data.SEXO)
            get_Blood_Type(data.data.GRUPO_SANGUINEO)
            get_Factor_Type(data.data.FACTOR_RH)
            get_Civil_Status(data.data.ESTADO_CIVIL)
            get_Work_Related(data.data.VINCULO_LABORAL)
            discapacidad(data.data.DISCAPACIDAD)
            get_Impairment(data.data.TIPO_DISCAPACIDAD)
            get_Type_Impairment(data.data.CONDICION_DISCAPACIDAD)
            get_Etnia(data.data.ETNIA)
            $('#id').attr('readonly', true);

        })
    });

    //Funcion utilizada para realizar la funcion de eliminar Pais
    $('body').on('click', '[name="delete"]', function(event) {

        var currentRow = $(this).closest("tr");
        var id = currentRow.find("td:eq(0)").html();

        deleteItem(id, './addPerfiles/', '#dataTableUsuario')

    });

    // Funcion que carga los datos en formato json de un arreglo a una tabla de jquery datatable
    jQuery('#dataTableUsuario').DataTable({

        // dom: "Bfrtip",
        responsive: true,
        autoWidth: false,
        ajax: {
            url: './perfiles',
            dataSrc: ''
        },

        columns: [

            { data: 'id' },
            { data: 'num_id' },
            { data: 'type_id' },
            { data: 'first_name' },
            { data: 'last_name' },
            // { data: 'date_of_birth' },
            // { data: 'state' },
            // { data: 'sex' },
            // { data: 'blood_type' },
            // { data: 'factor_type' },
            // { data: 'civil_status' },
            // { data: 'work_related' },
            // { data: 'impairment' },
            // { data: 'type_impairment' },
            // { data: 'status_impairment' },
            // { data: 'ethnic_group' },
            // { data: 'created' },
            // { data: 'cretedat' },
            { data: 'updated' },
            {
                "mData": null,
                "bSortable": false,
                "mRender": function(data, type, full) {
                    return '<button><a class="btn btn-link btn-sm btn-danger" id="delete' + full.id + ' " name="delete" value=' + full.id + ' data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-inbox">' + ' ' + '</i></a></button>' + '     ' +
                        '<button><a class="btn btn-link btn-sm btn-primary" id="edit' + full.id + ' " name="edit" value=' + full.id + ' data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit">' + '' + '</i></a></button>';
                }
            }

        ],
        "columnDefs": [{
                "targets": [5],
                "visible": false,
                "searchable": false
            },
            // {
            //     "targets": [6],
            //     "visible": false,
            //     "searchable": false
            // },
            // {
            //     "targets": [7],
            //     "visible": false,
            //     "searchable": false
            // }
        ], //hide columns
        // stateSave: true, //save in session state datatable
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        'order': [
            [5, 'desc']
        ]

    });


    // Funcion que llama la funcion para limpiar los formularios
    // $('body').on('click', '[name="btnIdCancel"]', function(event) {
    $('body').on('click', '[id="btnIdCancel"]', function(event) {

        clearForm("#FormPerfil")
    });

    // Funcion que limpia el formulario al momento de dar click en cancelar
    function clearForm($idForm) {

        jQuery($idForm).validate().resetForm();
        jQuery($idForm).find("input,textarea,select").val("");
        jQuery($idForm + "input[type='checkbox']").prop('checked', false).change();

    }


    //manejamos el checked para asignar y llamar a la funcio discapacidad
    $(".form-check-input").click(function() {

        if ($("#discapacidad").is(':checked')) {
            $("#discapacidad").prop("checked", true);
            discapacidad(1)
        } else {
            $("#discapacidad").prop("checked", false);
            discapacidad(0)
        }


    });

    // funcion utilizada para asignar valor a l campo checked de discapacidad si esta seleccionado muestra los div de tipo de imcapacidad y estado de la imcapacidad
    function discapacidad($valDiscapacidad) {

        var val = $valDiscapacidad;

        if (val == 1) {

            $("#discapacidad").prop("checked", true);
            $('#divSelectStatusImpairment').show();
            $('#divSelectTypeImpairment').show();

        } else {

            $("#discapacidad").prop("checked", false);
            $('#divSelectStatusImpairment').hide();
            $('#divSelectTypeImpairment').hide();

        }


    }


});


// funcion utilizada para cargar los datos de tipo de id en un select
function get_select_type_id($selected) {

    $.ajax({
        url: './fullSelectTypeId',
        type: 'GET',
        data: {},
        dataType: 'json',
        success: function(result) {

            $('#selectTypeId').find('option').remove().end();

            $('#selectTypeId').append($('<option>', { value: 'disabled', text: 'Seleccione un tipo de identificación.' }));

            if ($selected === undefined) {

                $.each(result, function(k, v) {

                    $('#selectTypeId').append($('<option>', { value: v[0], text: v[1] }));
                });

            } else {

                $.each(result, function(k, v) {

                    var id = v[0];
                    var name = v[1];

                    $("#selectTypeId").append("<option value='" + id + "'>" + name + "</option>");

                    if (id === $selected) {

                        $("#selectTypeId").attr('selected', 'selected').val(id);
                    }

                });

            }
        },
        error: function(result) {
            //handle errors
            alert('error...' + result);
        }
    });
}

// funcion utilizada para cargar los datos de estados civiles de id en un select
function get_state($selected) {

    $.ajax({
        url: './fullState',
        type: 'GET',
        data: {},
        dataType: 'json',
        success: function(result) {

            $('#selectState').find('option').remove().end();

            $('#selectState').append($('<option>', { value: 'disabled', text: 'Seleccione un estado civil.' }));

            if ($selected === undefined) {

                $.each(result, function(k, v) {

                    $('#selectState').append($('<option>', { value: v[0], text: v[1] }));
                });

            } else {

                $.each(result, function(k, v) {

                    var id = v[0];
                    var name = v[1];

                    $("#selectState").append("<option value='" + id + "'>" + name + "</option>");

                    if (id === $selected) {

                        $("#selectState").attr('selected', 'selected').val(id);
                    }

                });

            }
        },
        error: function(result) {
            //handle errors
            alert('error...' + result);
        }
    });
}

// funcion utilizada para cargar los datos de sexos de id en un select
function get_sex($selected) {

    $.ajax({
        url: './fullSex',
        type: 'GET',
        data: {},
        dataType: 'json',
        success: function(result) {

            $('#selectSex').find('option').remove().end();

            $('#selectSex').append($('<option>', { value: 'disabled', text: 'Seleccione un sexo.' }));

            if ($selected === undefined) {

                $.each(result, function(k, v) {

                    $('#selectSex').append($('<option>', { value: v[0], text: v[1] }));
                });

            } else {

                $.each(result, function(k, v) {

                    var id = v[0];
                    var name = v[1];

                    $("#selectSex").append("<option value='" + id + "'>" + name + "</option>");

                    if (id === $selected) {

                        $("#selectSex").attr('selected', 'selected').val(id);
                    }

                });

            }
        },
        error: function(result) {
            //handle errors
            alert('error...' + result);
        }
    });
}

// funcion utilizada para cargar los datos de tipo de sangre de id en un select
function get_Blood_Type($selected) {

    $.ajax({
        url: './fullBloodType',
        type: 'GET',
        data: {},
        dataType: 'json',
        success: function(result) {

            $('#selectBloodType').find('option').remove().end();

            $('#selectBloodType').append($('<option>', { value: 'disabled', text: 'Seleccione un tipo de Sangre.' }));

            if ($selected === undefined) {

                $.each(result, function(k, v) {

                    $('#selectBloodType').append($('<option>', { value: v[0], text: v[1] }));
                });

            } else {

                $.each(result, function(k, v) {

                    var id = v[0];
                    var name = v[1];

                    $("#selectBloodType").append("<option value='" + id + "'>" + name + "</option>");

                    if (id === $selected) {

                        $("#selectBloodType").attr('selected', 'selected').val(id);
                    }

                });

            }
        },
        error: function(result) {
            //handle errors
            alert('error...' + result);
        }
    });
}

// funcion utilizada para cargar los factores de tipo de sangre de id en un select
function get_Factor_Type($selected) {

    $.ajax({
        url: './fullFactorType',
        type: 'GET',
        data: {},
        dataType: 'json',
        success: function(result) {

            $('#selectFactorType').find('option').remove().end();

            $('#selectFactorType').append($('<option>', { value: 'disabled', text: 'Seleccione un factor de tipo de Sangre.' }));

            if ($selected === undefined) {

                $.each(result, function(k, v) {

                    $('#selectFactorType').append($('<option>', { value: v[0], text: v[1] }));
                });

            } else {

                $.each(result, function(k, v) {

                    var id = v[0];
                    var name = v[1];

                    $("#selectFactorType").append("<option value='" + id + "'>" + name + "</option>");

                    if (id === $selected) {

                        $("#selectFactorType").attr('selected', 'selected').val(id);
                    }

                });

            }
        },
        error: function(result) {
            //handle errors
            alert('error...' + result);
        }
    });
}

// funcion utilizada para cargar los estados civiles de id en un select
function get_Civil_Status($selected) {

    $.ajax({
        url: './fullCivilStatus',
        type: 'GET',
        data: {},
        dataType: 'json',
        success: function(result) {

            $('#selectCivilStatus').find('option').remove().end();

            $('#selectCivilStatus').append($('<option>', { value: 'disabled', text: 'Seleccione un estado civil.' }));

            if ($selected === undefined) {

                $.each(result, function(k, v) {

                    $('#selectCivilStatus').append($('<option>', { value: v[0], text: v[1] }));
                });

            } else {

                $.each(result, function(k, v) {

                    var id = v[0];
                    var name = v[1];

                    $("#selectCivilStatus").append("<option value='" + id + "'>" + name + "</option>");

                    if (id === $selected) {

                        $("#selectCivilStatus").attr('selected', 'selected').val(id);
                    }

                });

            }
        },
        error: function(result) {
            //handle errors
            alert('error...' + result);
        }
    });
}

// funcion utilizada para cargar las relaciones de trabjo de id en un select
function get_Work_Related($selected) {

    $.ajax({
        url: './fullWorkRelated',
        type: 'GET',
        data: {},
        dataType: 'json',
        success: function(result) {

            $('#selectWorkRelated').find('option').remove().end();

            $('#selectWorkRelated').append($('<option>', { value: 'disabled', text: 'Seleccione una relacion laboral.' }));

            if ($selected === undefined) {

                $.each(result, function(k, v) {

                    $('#selectWorkRelated').append($('<option>', { value: v[0], text: v[1] }));
                });

            } else {

                $.each(result, function(k, v) {

                    var id = v[0];
                    var name = v[1];

                    $("#selectWorkRelated").append("<option value='" + id + "'>" + name + "</option>");

                    if (id === $selected) {

                        $("#selectWorkRelated").attr('selected', 'selected').val(id);
                    }

                });

            }
        },
        error: function(result) {
            //handle errors
            alert('error...' + result);
        }
    });
}

// funcion utilizada para cargar los tipos de incapacidad de id en un select
function get_Impairment($selected) {

    $.ajax({
        url: './fullImpairment',
        type: 'GET',
        data: {},
        dataType: 'json',
        success: function(result) {

            $('#selectTypeImpairment').find('option').remove().end();

            $('#selectTypeImpairment').append($('<option>', { value: 'disabled', text: 'Seleccione un estado civil.' }));

            if ($selected === undefined) {

                $.each(result, function(k, v) {

                    $('#selectTypeImpairment').append($('<option>', { value: v[0], text: v[1] }));
                });

            } else {

                $.each(result, function(k, v) {

                    var id = v[0];
                    var name = v[1];

                    $("#selectTypeImpairment").append("<option value='" + id + "'>" + name + "</option>");

                    if (id === $selected) {

                        $("#selectTypeImpairment").attr('selected', 'selected').val(id);
                    }

                });

            }
        },
        error: function(result) {
            //handle errors
            alert('error...' + result);
        }
    });
}

// funcion utilizada para cargar los estados de tipo de incapacidad de id en un select
function get_Type_Impairment($selected) {

    $.ajax({
        url: './fullTypeImpairment',
        type: 'GET',
        data: {},
        dataType: 'json',
        success: function(result) {

            $('#selectStatusImpairment').find('option').remove().end();

            $('#selectStatusImpairment').append($('<option>', { value: 'disabled', text: 'Seleccione un estado civil.' }));

            if ($selected === undefined) {

                $.each(result, function(k, v) {

                    $('#selectStatusImpairment').append($('<option>', { value: v[0], text: v[1] }));
                });

            } else {

                $.each(result, function(k, v) {

                    var id = v[0];
                    var name = v[1];

                    $("#selectStatusImpairment").append("<option value='" + id + "'>" + name + "</option>");

                    if (id === $selected) {

                        $("#selectStatusImpairment").attr('selected', 'selected').val(id);
                    }

                });

            }
        },
        error: function(result) {
            //handle errors
            alert('error...' + result);
        }
    });
}

// funcion utilizada para cargar los  tipo de etnia de id en un select
function get_Etnia($selected) {

    $.ajax({
        url: './fullEthnicGroup',
        type: 'GET',
        data: {},
        dataType: 'json',
        success: function(result) {

            $('#selectEthnicGroup').find('option').remove().end();

            $('#selectEthnicGroup').append($('<option>', { value: 'disabled', text: 'Seleccione una línea.' }));

            if ($selected === undefined) {

                $.each(result, function(k, v) {

                    $('#selectEthnicGroup').append($('<option>', { value: v[0], text: v[1] }));
                });

            } else {

                $.each(result, function(k, v) {

                    var id = v[0];
                    var name = v[1];

                    $("#selectEthnicGroup").append("<option value='" + id + "'>" + name + "</option>");

                    if (id === $selected) {

                        $("#selectEthnicGroup").attr('selected', 'selected').val(id);
                    }

                });

            }
        },
        error: function(result) {
            //handle errors
            alert('error...' + result);
        }
    });
}