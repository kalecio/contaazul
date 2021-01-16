/*API desenvolvida para buscar cep de cidades do brasil,  utilizando ajax e json 

* sua maior parte escrita por Ajax e Json foi feito para buscar campos automaticamente assim que se digita o cep da cidade em que se quer cadastrar
* utilizando api do postmon.com.br para execução do projeto
* utilizando metodos de zipcode ou CEP dentro do território brasileiro para obtenção de dados em sistema


*/
$('input[name=address_zipcode]').on('blur', function () {
    var cep = $(this).val();

    $.ajax({
        url: 'https://api.postmon.com.br/v1/cep/' + cep,
        type: 'GET',
        dataType: 'json',
        success: function (json) {
            if (typeof json.logradouro != 'undefined') {
                $('input[name=address]').val(json.logradouro);
                $('input[name=address_neighb]').val(json.bairro);
                $('input[name=address_city]').val(json.cidade);
                $('input[name=address_state]').val(json.estado);
                $('input[name=address_country]').val("Brasil");
                $('input[name=address_number]').focus();  // campo para mandar para proximo campo preenchido manualmente pelo usuário do sistema

            }
        }
    });
    /*terminar de configurar API do sistema de CEP*/
    /*organização da API DO SISTEMA*/
});
// mascaras para cep e outross
$(function () {

    $('input[name=price]').mask('000.000.000.000.000,00', { reverse: true, placeholder: "0,00" });
    $('input[name=phone]').mask('000.(00).0.0000-0000', { reverse: true, placeholder: "Digite seu numero completo com o DDD iniciando com o 041" });


});