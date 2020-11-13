jQuery(document).ready(function($) {

    // //----- Se realiza el llamado del modal para crear un item -----//
    jQuery('#btn-add').click(function() {

        jQuery('#formModalLabel').html("Crear País");
        jQuery('#btn-save').html("Crear");
        jQuery('#id').attr('readonly', false);
        jQuery('#btn-save').val("add");
        // jQuery('#myForm').trigger("reset");
        jQuery('#formModal').modal('show');

        clearForm("#FormPaises")

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
            iso: jQuery('#iso').val(),
            phone_code: jQuery('#phonecode').val()

        };
        var state = jQuery('#btn-save').val();

        if (state == 'Edit') {

            // alert(formData.id)
            // return false

            updateItem(formData, './updCountry', '#dataTablePaises')

        } else if (state == 'add') {

            createItem(formData, './addcountry', '#dataTablePaises')

        } else {

            alert('Validar opcion.');
        }



    });

    //llamamos la funcion para que al momento de cargar la pagina realize la consulta de los paises
    get_country_data()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Funcion utilizada para consultar todos los datos para rellenar la datatable
    function get_country_data() {

        readItem('./paises', table_data_row, '#dataTablePaises')
    }

    //Funcion que es utilizada para generar las filas para la tabla de jquery tomadas de un archivo json
    function table_data_row(data) {

        var rows = '';

        $.each(JSON.parse(data), function(key, value) {

            rows = rows + '<tr>';
            rows = rows + '<td>' + value.id + '</td>';
            rows = rows + '<td>' + value.name + '</td>';
            rows = rows + '<td>' + value.iso + '</td>';
            rows = rows + '<td>' + value.phone_code + '</td>';

            rows = rows + '<td data-id="' + value.id + '">';
            rows = rows + '<a class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" id="editCompany" data-id="' + value.id + '" data-toggle="modal" data-target="#modal-id">Edit</a> ';
            rows = rows + '<a class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" id="deleteCompany" data-id="' + value.id + '" >Delete</a> ';
            rows = rows + '</td>';
            rows = rows + '</tr>';
        });

        $("#paises-list").html(rows);
    }

    //Funcion utilizada para abrir el modal de edicion con los datos del pais seleccionado para modificar Pais
    $('body').on('click', '[name="edit"]', function(event) {


        var currentRow = $(this).closest("tr");
        var id = currentRow.find("td:eq(0)").html();

        $.get('./addcountry/' + id + '/edit', function(data) {

            jQuery('#formModalLabel').html("Actualizar País");
            jQuery('#btn-save').html("Editar");
            jQuery('#btn-save').val("Edit");


            jQuery('#formModal').modal('show');

            $('#id').val(data.data.CODIGO_PAIS);
            $('#name').val(data.data.NOMBRE);
            $('#iso').val(data.data.ISO);
            $('#phonecode').val(data.data.CODIGO_TELEFONICO);
            $('#id').attr('readonly', true);


        })
    });

    //Funcion utilizada para realizar la funcion de eliminar Pais
    $('body').on('click', '[name="delete"]', function(event) {

        var currentRow = $(this).closest("tr");
        var id = currentRow.find("td:eq(0)").html();

        deleteItem(id, './addcountry/', '#dataTablePaises')

    });

    // Funcion que carga los datos en formato json de un arreglo a una tabla de jquery datatable
    jQuery('#dataTablePaises').DataTable({

        // dom: "Bfrtip",
        responsive: true,
        autoWidth: false,
        ajax: {
            url: './paises',
            dataSrc: ''
        },
        columns: [

            { data: 'id' },
            // { data: 'name' },
            {
                className: 'f32', // used by world-flags-sprite library
                data: 'name',
                render: function(data, type) {

                    if (type === 'display') {
                        var country = '';

                        switch (data) {
                            case 'Colombia':
                                country = 'CO';
                                break;
                        }

                        return '<span class="flag ' + country + '"></span> ' + data;
                    }

                    return data;
                }
            },
            { data: 'iso' },
            { data: 'phone_code' },
            { data: 'created' },
            { data: 'updated' },
            { data: 'cretedat' },
            {
                "mData": null,
                "bSortable": false,
                "mRender": function(data, type, full) {
                    return '<button><a class="btn btn-danger btn-link btn-sm" id="delete' + full.id + ' " name="delete" value=' + full.id + ' data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-inbox">' + ' ' + '</i></a></button>' + '     ' +
                        '<button><a class="btn btn-primary btn-link btn-sm" id="edit' + full.id + ' " name="edit" value=' + full.id + ' data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit">' + '' + '</i></a></button>';
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
                "targets": [4],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [5],
                "visible": false,
                "searchable": false
            },
            {
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

        clearForm("#FormPaises")
    });

    // Funcion que limpia el formulario al momento de dar click en cancelar
    function clearForm($idForm) {

        jQuery($idForm).validate().resetForm();
        jQuery($idForm).find("input,textarea,select").val("");
        jQuery($idForm + "input[type='checkbox']").prop('checked', false).change();

    }

});
