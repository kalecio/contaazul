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
            setTimeout(function () {
                $('.searchresults').hide();

            }, 500);
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
                        if ($('.searchresults').length == 0) {
                            $('#busca').after('<div class="searchresults"></div>');
                        }
                        $('.searchresults').css('left', $('#busca').offset().left + 'px');
                        $('.searchresults').css('top', $('#busca').offset().top + $('#busca').height() + 3 + 'px');
                        let html = '';
                        for (let i in json) {
                            html += '<div class="si"><a href="' + json[i].link + '">' + json[i].name + '</a></div>';
                        }
                        $('.searchresults').html(html);
                        $('.searchresults').show();
                    }



                });

            }

        });
    });

});


(function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);
