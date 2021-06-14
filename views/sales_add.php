<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ADICIONAR VENDAS</title>
    </head>

    <body>
        <h1> Vendas adicionar</h1>
        <form method="POST">

            <label for="client_name">Nome do Cliente</label><br />
            <button class="clientAdd_button"> + </button>
            <input type="text" name="client_name" id="client_name" data-type="search_clients" />

            <div style="clear:both"> </div>
            <br /> <br />  <br /> <br />
            <label for ="status"> Status da venda </label>
            <select name="status" id="status">
                <option value="0"> AGUARDANDO PGTO</option>
                <option value="1">PAGO</option>
                <option value="2">CANCELADOS</option>
            </select>  <br /> <br />  <br /> <br />
            <label for="total_price"> Preço de venda</label>
            <input type="text" name="total_price"/>  <br /> <br />  <br /> <br />

            <input type="submit" value="Adicionar venda"/>
        </form>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_inventory_add.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_sales_add.js"></script>
    </body>

</html>