var jQuery = $;

jQuery(document).ready(function() {


    // /* initialize the calendar
    //  -----------------------------------------------------------------*/
    // //Date for the calendar events (dummy data)
    // var date = new Date()
    // var d = date.getDate(),
    //     m = date.getMonth(),
    //     y = date.getFullYear()


    // var Calendar = FullCalendar.Calendar;
    // var Draggable = FullCalendarInteraction.Draggable;

    // var containerEl = document.getElementById('external-events');
    // var checkbox = document.getElementById('drop-remove');
    // var calendarEl = document.getElementById('calendar');

    // var calendar = new Calendar(calendarEl, {
    //     plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
    //     // lang: 'es-us',
    //     locale: 'es',
    //     weekNumbers: true, // numero de semana
    //     weekNumberCalculation: '−05:00',
    //     firstDay: 1, //inicia la semana el dia 1 es decir los lunes
    //     businessHours: {
    //         // days of week. an array of zero-based day of week integers (0=Sunday)
    //         daysOfWeek: [1, 2, 3, 4, 5], // Lunes  - viernes

    //         startTime: '07:00', // a start time (8am in this example)
    //         endTime: '18:00', // an end time (6pm in this example)
    //     },
    //     header: {
    //         left: 'prev,next, today',
    //         center: 'title',
    //         right: 'dayGridMonth,timeGridWeek,timeGridDay'
    //     },
    //     'themeSystem': 'bootstrap',
    //     //consult ajax events to databases
    //     // events: root_url,

    //     events: './eventos',
    //     editable: true,
    //     droppable: true, // this allows things to be dropped onto the calendar !!!
    //     drop: function(info) {
    //         // is the "remove after drop" checkbox checked?
    //         if (checkbox.checked) {
    //             // if so, remove the element from the "Draggable Events" list
    //             info.draggedEl.parentNode.removeChild(info.draggedEl);
    //         }
    //     }
    // });

    // calendar.render();


    // //----- Se realiza el llamado del modal para crear un item -----//
    jQuery('#btn-add').click(function() {

        jQuery('#formModalLabel').html("Crear Evento");
        jQuery('#btn-save').html("Crear");
        jQuery('#id').attr('readonly', false);
        jQuery('#btn-save').val("add");
        // jQuery('#myForm').trigger("reset");
        jQuery('#formModal').modal('show');


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
            reservationtime: jQuery('#reservationtime').val(),
            start: jQuery('#start').val(),
            end: jQuery('#end').val(),
            backgroundColor: jQuery('#backgroundColor').val(),
            borderColor: jQuery('#borderColor').val(),
            title: jQuery('#title').val(),
            descrption: jQuery('#descrption').val(),

        };

        // alert(formData['reservationtime']);
        // console.log(formData['reservationtime']);
        // return false;


        var state = jQuery('#btn-save').val();

        if (state == 'Edit') {

            updateItem(formData, './addevent', '#dataTableMunicipio')

        } else if (state == 'add') {

            createItem(formData, './addevent', '#dataTableMunicipio')

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






    $('#reservationtime').daterangepicker({
        "timePicker": true,
        "timePicker24Hour": true,
        "timePickerIncrement": 15,
        "startDate": moment(),
        "endDate": moment().startOf('hour').add(1, 'hour'),
        "locale": {
            "format": "YYYY-MM-DD hh:mm:ss A",
            "separator": " - ",
            "applyLabel": "Aceptar",
            "cancelLabel": "Cancelar",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "weekLabel": "Sem",
            "daysOfWeek": [
                "Do",
                "Lu",
                "Ma",
                "Mi",
                "Ju",
                "Vi",
                "Sa"
            ],
            "monthNames": [
                "ENE",
                "FEB",
                "MAR",
                "ABR",
                "MAY",
                "JUN",
                "JUL",
                "AGO",
                "SEP",
                "OCT",
                "NOV",
                "DIC"
            ],
            "firstDay": 1
        },
        "autoApply": true,
        "startDate": 0,
        "endDate": 30,
        "minDate": 0,
        "opens": "center",
        "drops": "auto"
    }, function(start, end, label) {
        console.log('New date range selected: ' + start.format('YYYY-MM-DD hh:mm:ss A') + ' to ' + end.format('YYYY-MM-DD hh:mm:ss A') + ' (predefined range: ' + label + ')');
    });





    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
        ele.each(function() {

            // create an Event Object (https://fullcalendar.io/docs/event-object)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            }

            // store the Event Object in the DOM element so we can get to it later
            jQuery(this).data('eventObject', eventObject)

            // make the event draggable using jQuery UI
            jQuery(this).draggable({
                zIndex: 1070,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 //  original position after the drag
            })

        })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var containerEl = document.getElementById('external-events');

    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
        itemSelector: '.external-event',
        eventData: function(eventEl) {
            return {
                title: eventEl.innerText,
                backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
            };
        }
    });

    var calendar = new Calendar(calendarEl, {


        plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
        // lang: 'es-us',
        locale: 'es',
        weekNumbers: true, // numero de semana
        weekNumberCalculation: '−05:00',
        firstDay: 1, //inicia la semana el dia 1 es decir los lunes
        businessHours: {
            // days of week. an array of zero-based day of week integers (0=Sunday)
            daysOfWeek: [1, 2, 3, 4, 5], // Lunes  - viernes

            startTime: '07:00', // a start time (8am in this example)
            endTime: '18:00', // an end time (6pm in this example)
        },
        header: {
            left: 'prev,next, today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        'themeSystem': 'bootstrap',
        events: './eventos',
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function(info) {
            // is the "remove after drop" checkbox checked?
            if (checkbox.checked) {
                // if so, remove the element from the "Draggable Events" list
                info.draggedEl.parentNode.removeChild(info.draggedEl);
            }
        }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
        // Color chooser button
    jQuery('#color-chooser > li > a').click(function(e) {
        e.preventDefault()
            // Save color
        currColor = $(this).css('color')
            // Add color effect to button
        jQuery('#add-new-event').css({
            'background-color': currColor,
            'border-color': currColor
        })
    })
    jQuery('#add-new-event').click(function(e) {


        e.preventDefault()
            // Get value and make sure it is not null
        var val = $('#new-event').val()
        if (val.length == 0) {
            return
        }

        // Create events
        var event = $('<div />')
        event.css({
            'background-color': currColor,
            'border-color': currColor,
            'color': '#fff'
        }).addClass('external-event')
        event.text(val)
        jQuery('#external-events').prepend(event)

        // Add draggable funtionality
        ini_events(event)

        // Remove event from text input
        jQuery('#new-event').val('')
    })
});
