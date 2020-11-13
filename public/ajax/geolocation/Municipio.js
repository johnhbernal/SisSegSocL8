jQuery(document).ready(function($) {

    // //----- Se realiza el llamado del modal para crear un item -----//
    jQuery('#btn-add').click(function() {

        jQuery('#formModalLabel').html("Crear Municipio");
        jQuery('#btn-save').html("Crear");
        jQuery('#id').attr('readonly', false);
        jQuery('#btn-save').val("add");
        // jQuery('#myForm').trigger("reset");
        jQuery('#formModal').modal('show');

        clearForm("#FormMunicipio");

        get_select_departments_countrys();
        get_select_cities_departments();

    });

    // Funcion utilizada para crear un nuevo campo o llamar la funcion para actualizar
    $("#btn-save").click(function(e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();

        var formData = {
            id: jQuery('#id').val(),
            name: jQuery('#name').val(),
            region: jQuery('#region').val(),
            selectPais: jQuery('select[id=selectPais]').val(),
            selectDepartamento: jQuery('select[id=selectDepartamento]').val()

        };

        var state = jQuery('#btn-save').val();

        if (state == 'Edit') {

            updateItem(formData, './updCities', '#dataTableMunicipio')

        } else if (state == 'add') {

            createItem(formData, './addCities', '#dataTableMunicipio')

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

        $.get('./addCities/' + id + '/edit', function(data) {


            jQuery('#formModalLabel').html("Actualizar Municipio");
            jQuery('#btn-save').html("Editar");
            jQuery('#btn-save').val("Edit");

            jQuery('#formModal').modal('show');

            $('#id').val(data.data.CODIGO_MUNICIPIO);
            $('#name').val(data.data.NOMBRE);
            $('#region').val(data.data.REGION);
            get_select_departments_countrys(data.data.CODIGO_PAIS);
            get_select_cities_departments(data.data.CODIGO_DEPARTAMENTO);
            $('#id').attr('readonly', true);


        })
    });

    //Funcion utilizada para realizar la funcion de eliminar Pais
    $('body').on('click', '[name="delete"]', function(event) {

        var currentRow = $(this).closest("tr");
        var id = currentRow.find("td:eq(0)").html();

        deleteItem(id, './addCities/', '#dataTableMunicipio')

    });

    // Funcion que carga los datos en formato json de un arreglo a una tabla de jquery datatable
    jQuery('#dataTableMunicipio').DataTable({

        // dom: "Bfrtip",
        responsive: true,
        autoWidth: false,
        ajax: {
            url: './cities',
            dataSrc: ''
        },
        columns: [

            { data: 'id' },
            { data: 'name' },
            { data: 'region' },
            { data: 'country_code' },
            { data: 'country_name' },
            { data: 'department_code' },
            { data: 'department_name' },
            { data: 'created' },
            { data: 'cretedat' },
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
        "columnDefs": [

            // {
            //     "targets": [0],
            //     "visible": true,
            //     "searchable": false
            // },
            {
                "targets": [3],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [5],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [7],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [8],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [9],
                "visible": false,
                "searchable": false
            }
        ], //hide columns
        // stateSave: true, //save in session state datatable
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        'order': [
            [9, 'desc']
        ]

    });


    // Funcion que llama la funcion para limpiar los formularios
    // $('body').on('click', '[name="btnIdCancel"]', function(event) {
    $('body').on('click', '[id="btnIdCancel"]', function(event) {

        clearForm("#FormMunicipio")
    });

    // Funcion que limpia el formulario al momento de dar click en cancelar
    function clearForm($idForm) {

        jQuery($idForm).validate().resetForm();
        jQuery($idForm).find("input,textarea,select").val("");
        jQuery($idForm + "input[type='checkbox']").prop('checked', false).change();

    }

    //cuando cambia el valor del select de pais filtra los departamentos de ese pais en el select de departamento
    $("#selectPais").change(function() {
        var val = $(this).val();

        get_select_cities_departments(val)

    });

});

// get_select_cities_countrys($selected)
// funcion utilizada para cargar los datos de paises en un select
function get_select_departments_countrys($selected) {

    $.ajax({
        url: './fullSelectCountry',
        type: 'GET',
        data: {},
        dataType: 'json',
        success: function(result) {


            $('#selectPais').find('option').remove().end();

            $('#selectPais').append($('<option>', { value: 'disabled', text: 'Seleccione un país' }));

            if ($selected === undefined) {

                $.each(result, function(k, v) {
                    $('#selectPais').append($('<option>', { value: v.CODIGO_PAIS, text: v.NOMBRE }));
                });

            } else {

                $.each(result, function(k, v) {

                    var id = v.CODIGO_PAIS;
                    var name = v.NOMBRE;

                    $("#selectPais").append("<option value='" + id + "'>" + name + "</option>");

                    if (id === $selected) {

                        $("#selectPais").attr('selected', 'selected').val(id);
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

// funcion utilizada para cargar los datos de municipios en un select
function get_select_cities_departments($selected) {

    $.ajax({
        url: './fullSelectCities',
        type: 'GET',
        data: {},
        dataType: 'json',
        success: function(result) {


            $('#selectDepartamento').find('option').remove().end();

            $('#selectDepartamento').append($('<option>', { value: 'disabled', text: 'Seleccione un departamento' }));

            if ($selected === undefined) {

                $.each(result, function(k, v) {
                    $('#selectDepartamento').append($('<option>', { value: v.CODIGO_DEPARTAMENTO, text: v.NOMBRE }));
                });

            } else {

                $.each(result, function(k, v) {

                    var id = v.CODIGO_DEPARTAMENTO;
                    var name = v.NOMBRE;

                    $("#selectDepartamento").append("<option value='" + id + "'>" + name + "</option>");

                    if (id === $selected) {

                        $("#selectDepartamento").attr('selected', 'selected').val(id);
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
