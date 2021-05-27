<h1>Área de vendas</h1>
<div class="button"><a href="<?php echo BASE_URL; ?>/sales/add">Adicionar Venda</a> </div>

<table border ="0" width="100%">
    <tr>
        <th>Nome cliente</th>

        <th>Data </th>

        <th>Status</th>

        <th>Valor</th>

        <th>Ações</th>
    </tr>
    <?php foreach ($sales_list as $sale_item): ?>
        <tr>
            <td> <?php echo $sales_item['name']; ?></td>
            <td> <?php echo date('d/m/y', strtotime($sales_item('date_sale'))); ?></td>
            <td> <?php echo $sales_item['status']; ?></td>
            <td>R$ <?php echo number_format($sales_item['valor'], 2, ',', '.'); ?></td>
            <td></td>

        </tr>
    <?php endforeach ?>
</table>
