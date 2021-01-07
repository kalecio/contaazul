<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Painel - <?php echo $viewData['company_name'] ?></title>
    <link href="<?php echo BASE_URL; ?>/assets/css/template.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script.js"></script>
</head>

<body>
    <h1>Clientes</h1>
    <?php if ($edit_permission) : //FUNÇÃO PARA VERIFICAR SE O USUÁRIO TEM PERMISSÃO DE ADICIONAR NOVOS CLIENTES
    ?>
        <div>
            <div class="button"><a href="<?php echo BASE_URL; ?>/clients/add">Adicionar Clientes</a> </div>
        <?php endif; ?>
        <input type="text" id="busca" data-type="search_clients" />
        <br />
        </div>
        <br />
        <div>
            <table border="0" width="100%">
                <tr>
                    <th>NOME</th>
                    <th>TELEFONE</th>
                    <th>CIDADE</th>
                    <th>ESTRELAS</th>
                    <th colspan="2">Ações</th>
                </tr>
                <?php foreach ($clients_list as $clients) : ?>
                    <tr>
                        <td><?php echo $clients['name']; ?></td>
                        <td><?php echo $clients['phone']; ?></td>
                        <td><?php echo $clients['address_city']; ?></td>
                        <td><?php echo $clients['stars']; ?></td>

                        <td width="100%">
                            <div class="button button-Editar"><a href="<?php echo BASE_URL; ?>/clients/edit/<?php echo $clients['id']; ?>">Alterar</a></div>

                            <div class="button button-Excluir"><a href="<?php echo BASE_URL; ?>/clients/delete/<?php echo $clients['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Deletar</a></div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div><!-- LEMBRAR DE POR RESPOSIVIDAE DENTRO DAS VIEWS DO SISTEMA web-->
        <div class="pagination">
            <?php for ($q = 1; $q <= $p_count; $q++) : ?>
                <div class="pag_item <?php echo ($q == $p) ? 'pag_ativo' : ''; ?>"><a href="<?php echo BASE_URL; ?>/clients?p=<?php echo $q; ?>"><?php echo $q; ?></a></div>
            <?php endfor; ?>
            <div style="clear:both"></div>
        </div>
</body>

</html>