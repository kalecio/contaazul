<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
</head>

<body>
    <h1>Estoque</h1>

    <?php if ($add_permission) : ?>
        <div>
            <div class="button"><a href="<?php echo BASE_URL; ?>/inventory/add">Adicionar Produto</a> </div>
        <?php endif; ?>

        <input type="text" id="busca" data-type="search_inventory" />
        <table border="0" width="100%">
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Quant. Minima</th>

                <th>Ações</th>

            </tr>

        </table>
        <?php foreach ($inventory_list as $product) : ?>
            <td> <?php echo $product['name']; ?></td>
            <td><?php echo number_format($product['price'], 2); ?></td>
            <td><?php echo $product['quant']; ?></td>
            <td><?php echo $product['min_quant']; ?></td>
            <td> </td>
            }
        <?php endforeach; ?>

        
</body>

</html>