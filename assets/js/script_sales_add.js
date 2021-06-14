function selectClient(obj) {
    var id = $(obj).attr('data-id');
    var name = $(obj).html();

    $('.searchresults').hide();
    $('#client_name').val(name);
    $('#client_name').attr('data_id', id);
}

$(function () {
    $('input[name=total_price]').mask('000.000.000.000.000,00', {reverse: true, placeholder: "00,00"});
    $('.clientAdd_button').on('click', function (e) {
        e.preventDefault();
        var name = $('#client_name').val();
        if (name != '' && name.length >= 4) {
            if (confirm('Você deseja adicionar um cliente   ' + name + '   ?   ')) {
                $.ajax({
                    url: BASE_URL + '/ajax/add_client',
                    type: 'POST',
                    data: {name: name},
                    datatype: 'json',
                    success: function (json) {
                        $('.searchresults').hide();
                        $('#client_name').attr('data_id', json.id);

                    }
                });
                return false;
            }

        }
    });
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