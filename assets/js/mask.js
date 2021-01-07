// TRATAMENTO PARA QUESTÕES DE NUMERO DE CELULAR
jQuery("input.phone")
    .mask("(99) 9.9999-9999")
    .focusout(function (event) {
        var target, phone, element;
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;
        phone = target.value.replace(/\D/g, '');
        element = $(target);
        element.unmask();
        if (phone.length > 10) {
            element.mask("(99) 9.9999-9999");
        } else {
            element.mask("(99) 9.9999-9999");
        }
    });


$(document).ready(function () {
    $("#address_zipcode").mask("99.999-999");
});
