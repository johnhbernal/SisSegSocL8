jQuery(document).ready(function($) {

    // //----- Se realiza el llamado del modal para crear un item -----//
    jQuery('#btn-add').click(function() {

        jQuery('#formModalLabel').html("Crear Departamento");
        jQuery('#btn-save').html("Crear");
        jQuery('#id').attr('readonly', false);
        jQuery('#btn-save').val("add");
        // jQuery('#myForm').trigger("reset");
        jQuery('#formModal').modal('show');

        clearForm("#FormDepartamento")

        get_select_departments_countrys()

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
            selectPais: jQuery('select[id=selectPais]').val()

        };

        var state = jQuery('#btn-save').val();

        if (state == 'Edit') {

            updateItem(formData, './upddepartments', '#dataTableDepartamento')

        } else if (state == 'add') {

            createItem(formData, './adddepartments', '#dataTableDepartamento')

        } else {

            alert('Validar opcion.');
        }



    });

    //llamamos la funcion para que al momento de cargar la pagina realize la consulta de los paises
    get_departments_data()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Funcion utilizada para consultar todos los datos para rellenar la datatable
    function get_departments_data() {

        readItem('./departments', table_data_row, '#dataTableDepartamento')
    }

    //Funcion que es utilizada para generar las filas para la tabla de jquery tomadas de un archivo json
    function table_data_row(data) {

        var rows = '';

        $.each(JSON.parse(data), function(key, value) {

            rows = rows + '<tr>';
            rows = rows + '<td>' + value.id + '</td>';
            rows = rows + '<td>' + value.name + '</td>';
            rows = rows + '<td>' + value.country_code + '</td>';
            rows = rows + '<td data-id="' + value.id + '">';
            rows = rows + '<a class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" id="editCompany" data-id="' + value.id + '" data-toggle="modal" data-target="#modal-id">Edit</a> ';
            rows = rows + '<a class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" id="deleteCompany" data-id="' + value.id + '" >Delete</a> ';
            rows = rows + '</td>';
            rows = rows + '</tr>';
        });

        $("#departamentos-list").html(rows);
    }

    //Funcion utilizada para abrir el modal de edicion con los datos del pais seleccionado para modificar Pais
    $('body').on('click', '[name="edit"]', function(event) {


        var currentRow = $(this).closest("tr");
        var id = currentRow.find("td:eq(0)").html();

        $.get('./adddepartments/' + id + '/edit', function(data) {


            jQuery('#formModalLabel').html("Actualizar País");
            jQuery('#btn-save').html("Editar");
            jQuery('#btn-save').val("Edit");

            jQuery('#formModal').modal('show');

            $('#id').val(data.data.CODIGO_DEPARTAMENTO);
            $('#name').val(data.data.NOMBRE);
            get_select_departments_countrys(data.data.CODIGO_PAIS)
            $('#id').attr('readonly', true);


        })
    });

    //Funcion utilizada para realizar la funcion de eliminar Pais
    $('body').on('click', '[name="delete"]', function(event) {

        var currentRow = $(this).closest("tr");
        var id = currentRow.find("td:eq(0)").html();

        deleteItem(id, './adddepartments/', '#dataTableDepartamento')

    });

    // Funcion que carga los datos en formato json de un arreglo a una tabla de jquery datatable
    jQuery('#dataTableDepartamento').DataTable({

        // dom: "Bfrtip",
        responsive: true,
        autoWidth: false,
        ajax: {
            url: './departments',
            dataSrc: ''
        },
        columns: [

            { data: 'id' },
            { data: 'name' },
            { data: 'country_name' },
            { data: 'country_code' },
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
                "targets": [4],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [5],
                "visible": false,
                "searchable": false
            }, {
                "targets": [6],
                "visible": false,
                "searchable": false
            }
        ], //hide columns
        // stateSave: true, //save in session state datatable
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        'order': [
            [6, 'desc']
        ]

    });


    // Funcion que llama la funcion para limpiar los formularios
    // $('body').on('click', '[name="btnIdCancel"]', function(event) {
    $('body').on('click', '[id="btnIdCancel"]', function(event) {

        clearForm("#FormDepartamento")
    });

    // Funcion que limpia el formulario al momento de dar click en cancelar
    function clearForm($idForm) {

        jQuery($idForm).validate().resetForm();
        jQuery($idForm).find("input,textarea,select").val("");
        jQuery($idForm + "input[type='checkbox']").prop('checked', false).change();

    }

});

// get_select_departments_countrys($selected)
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
