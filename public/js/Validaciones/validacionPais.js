jQuery("#btn-save").click(function() {

    jQuery("#FormPaises").validate({
        //   ignore : "not:hidden",
        onkeyup: true,
        debug: false,
        focusCleanup: true,
        rules: {
            "id": {
                required: true,
                minlength: 1,
                maxlength: 5,
                // lettersonly: true,
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
            "iso": {
                required: true,
                minlength: 2,
                maxlength: 5,
                lettersonly: true,
                nowhitespace: true
            },
            "phonecode": {
                required: true,
                minlength: 1,
                maxlength: 5,
                digits: true,
                nowhitespace: true
            }
        },
        messages: {
            id: {
                required: "El campo Código País es requerido.",
                minlength: "El campo Código País debe tener al menos {0}  carácter.",
                maxlength: "El campo Código País debe tener hasta {0} caracteres.",
                // lettersonly: "Name should contain only letters"
                digits: "El campo Código País solo debe contener números.",
                nowhitespace: "El campo Código País no debe contener espacios en blanco."
            },
            name: {
                required: "El campo Nombre es requerido.",
                minlength: "El campo Nombre debe tener al menos {0} carácter.",
                maxlength: "El campo Nombre debe tener hasta {0} caracteres.",
                lettersonly: "El campo Nombre solo debe contener letras.",
                nowhitespace: "El campo Nombre no debe contener espacios en blanco."
            },
            iso: {
                required: "El campo Iso es requerido.",
                minlength: "El campo Iso debe tener al menos {0} carácteres.",
                maxlength: "El campo Iso debe tener hasta {0} carácteres.",
                lettersonly: "El campo Iso solo debe contener letras.",
                nowhitespace: "El campo Iso no debe contener espacios en blanco."
            },
            phonecode: {
                required: "El campo Código Telefónico es requerido.",
                minlength: "El campo Código Telefónico debe tener al menos {0} carácteres.",
                maxlength: "El campo Código Telefónico debe tener hasta {0} carácteres.",
                digits: "El campo Código Telefónico solo debe contener números.",
                nowhitespace: "El campo Código Telefónico no debe contener espacios en blanco."
            }
        },
        errorClass: 'invalid-feedback',
        validClass: 'is-valid',
        errorElement: 'span',
        // highlight: function(element, errorClass, validClass) {
        //     $(element).parents("div.control-group").addClass(errorClass).removeClass(validClass);
        // },
        // unhighlight: function(element, errorClass, validClass) {
        //     $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        // }


        highlight: function(element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
        }

    });
    jQuery("#FormPaises").submit();
});
