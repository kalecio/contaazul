$(function () {
    $('.tabitem').on('click', function () {
        $('.activetab').removeClass('activetab');
        $(this).addClass('activetab');

        var item = $('.activetab').index();
        $('.tabbody').hide();
        $('.tabbody').eq(item).show();
    });
    //$('.tabbody').eq(0).show(); para modificação simples
    $('#busca').on('focus', function () {
        $(this).animate({
            width: '250px'
        });
        $('#busca').on('blur', function () {
            if ($(this).val() == '') {
                $(this).animate({
                    width: '100px'
                });
            }
        });

        $('#busca').on('keyup', function () {
            var datatype = $(this).attr('data-type');
            var busca = $(this).val();


            if (datatype != '') {
                $.ajax({
                    url: BASE_URL + '/ajax/' + datatype,
                    type: 'GET',
                    data: { busca: busca },
                    dataType: 'json',
                    success: function (json) {


                    }


                });

            }

        });
    });

});


