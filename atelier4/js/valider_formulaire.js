
$(document).ready(function() {


    $("#saisie").validate({
        rules: {
            ville: "required",
            temperature: {
                required : true,
                number : true
            }
        },
        messages: {
            ville: {
                required: "n'avez vous pas oublié le nom de la ville ?",
            },
            temperature: {
                required: "la température est nécessaire",
                number: "d'habitude il faut un nombre"
            }
        }
    });

});

