$(function () {
    $('#client_name').on('keyup', function () {
        var datatype = $(this).attr('data-type');
        var busca = $(this).val();


        if (datatype != '') {
            $.ajax({
                url: BASE_URL + '/ajax/' + datatype,
                type: 'GET',
                data: {busca: busca},
                dataType: 'json',
                success: function (json) {
                    if ($('.searchresults').length == 0) {
                        $('#client_name').after('<div class="searchresults"></div>');
                    }
                    $('.searchresults').css('left', $('#client_name').offset().left + 'px');
                    $('.searchresults').css('top', $('#client_name').offset().top + $('#client_name').height() + 3 + 'px');
                    let html = '';
                    for (let i in json) {
                        html += '<div class="si"><a href="javascript:;">' + json[i].name + '</a></div>';
                    }
                    $('.searchresults').html(html);
                    $('.searchresults').show();
                }



            });

        }

    });
});