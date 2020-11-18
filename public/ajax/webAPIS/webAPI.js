var jQuery = $;

jQuery(document).ready(function() {



    get_apis_prueba();

    // Funcion que carga los datos en formato json de un arreglo a una tabla de jquery datatable
    jQuery('#dataTableDivisas').DataTable({

        // dom: "Bfrtip",
        responsive: true,
        autoWidth: false,
        ajax: {
            url: './apisPrueba',
            dataSrc: ''
        },
        columns: [

            { data: 'uf' },
            { data: 'autor' },
            { data: 'fecha' },
            {
                "mData": null,
                "bSortable": false,
                "mRender": function(data, type, full) {
                    return '<button><a class="btn btn-link btn-sm btn-danger" id="delete' + full.version + ' " name="delete" value=' + full.version + ' data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-inbox">' + ' ' + '</i></a></button>' + '     ' +
                        '<button><a class="btn btn-link btn-sm btn-primary" id="edit' + full.version + ' " name="edit" value=' + full.version + ' data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit">' + '' + '</i></a></button>';
                }
            }

        ],
        "columnDefs": [

            // {
            //     "targets": [0],
            //     "visible": true,
            //     "searchable": false
            // },
            // {
            //     "targets": [3],
            //     "visible": false,
            //     "searchable": false
            // },
            // {
            //     "targets": [5],
            //     "visible": false,
            //     "searchable": false
            // },
            // {
            //     "targets": [7],
            //     "visible": false,
            //     "searchable": false
            // },
            // {
            //     "targets": [8],
            //     "visible": false,
            //     "searchable": false
            // },
            // {
            //     "targets": [9],
            //     "visible": false,
            //     "searchable": false
            // }
        ], //hide columns
        // stateSave: true, //save in session state datatable
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        // 'order': [
        //     [9, 'desc']
        // ]

    });




});


// funcion utilizada para cargar los datos de municipios en un select
function get_apis_prueba($selected) {

    $.ajax({
        url: './apisPrueba',
        type: 'GET',
        data: {},
        dataType: 'json',
        success: function(result) {


            if ($selected === undefined) {

                $('#info-box-1').append($('<text>', { value: result.version, text: result.version }));
                $('#info-box-2').append($('<text>', { value: result.autor, text: result.autor }));
                // $('#info-box-3').append($('<text>', { value: result.fecha, text: result.fecha.substring(0, 10) }));

            } else {
                $('#info-box-1').append($('<text>', { value: 'error', text: 'Error al momento de traer datos.' }));

            }
        },
        error: function(result) {
            //handle errors
            alert('error...' + result);
        }
    });
}
