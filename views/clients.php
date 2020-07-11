<h1>Clientes</h1>
<?php if ($edit_permission) : //FUNÇÃO PARA VERIFICAR SE O USUÁRIO TEM PERMISSÃO DE ADICIONAR NOVOS CLIENTES
?>
    <div class="button"><a href="<?php echo BASE_URL; ?>/clients/add">Adicionar Clientes</a> </div>
<?php endif; ?>

<!--  LEBMRAR DE POR UM LINK VIA JS PARA MELHORAR O USO DO BOTÃO
* OLHAR EM  MEUS RESUMOS-->

<table border="0" width="100%">
    <tr>
        <th>NOME</th>
        <th>TELEFONE</th>
        <th>CIDADE</th>
        <th>ESTRELAS</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($clients_list as $clients) : ?>
        <tr>
            <td><?php echo $clients['name']; ?></td>
            <td><?php echo $clients['phone']; ?></td>
            <td><?php echo $clients['address_city']; ?></td>
            <td><?php echo $clients['stars']; ?></td>

            <td width="100%">
                <div class="button button_small"><a href="<?php echo BASE_URL; ?>/clients/edit/<?php echo $clients['id']; ?>">Alterar</a></div>
                <div class="button button_small"><a href="<?php echo BASE_URL; ?>/clients/delete/<?php echo $clients['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Deletar</a></div>
            </td>
        </tr>
    <?php endforeach; ?>
</table><!-- LEMBRAR DE POR RESPOSIVIDAE DENTRO DAS VIEWS DO SISTEMA web-->