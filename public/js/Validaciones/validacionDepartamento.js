jQuery("#btn-save").click(function() {

    // add the rule here
    // $.validator.addMethod("valueNotEquals", function(value, element, arg) {
    //     return arg !== value;
    // }, "Value must not equal arg.");

    jQuery("#FormDepartamento").validate({
        //   ignore : "not:hidden",
        onkeyup: true,
        debug: false,
        focusCleanup: true,
        rules: {
            "id": {
                required: true,
                minlength: 1,
                maxlength: 5,
                digits: true,
                nowhitespace: true
            },
            "name": {
                required: true,
                minlength: 1,
                maxlength: 150,
                lettersonly: true,
                nowhitespace: false,
                noSpace: false
            },
            "selectPais": {
                // valueNotEquals: "default",
                required: true
            },

            fruit: {
                required: true
            }
        },
        messages: {
            id: {
                required: "El campo Código Departamento es requerido.",
                minlength: "El campo Código Departamento debe tener al menos {0}  carácter.",
                maxlength: "El campo Código Departamento debe tener hasta {0} caracteres.",
                // lettersonly: "Name should contain only letters"
                digits: "El campo Código Departamento solo debe contener números.",
                nowhitespace: "El campo Código Departamento no debe contener espacios en blanco."
            },
            name: {
                required: "El campo Nombre es requerido.",
                minlength: "El campo Nombre debe tener al menos {0} carácter.",
                maxlength: "El campo Nombre debe tener hasta {0} caracteres.",
                lettersonly: "El campo Nombre solo debe contener letras.",
                nowhitespace: "El campo Nombre no debe contener espacios en blanco."
            },
            selectPais: {
                required: "El campo Seleccione un país es requerido.",
                // valueNotEquals: "Seleccione otra opción de país."
            },

        },
        errorClass: 'invalid-feedback',
        validClass: 'is-valid',
        errorElement: 'span',
        highlight: function(element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
        }

    });
    jQuery("#FormDepartamento").submit();
});
