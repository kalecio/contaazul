<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Painel - <?php echo $viewData['company_name'] ?></title>
    <link href="<?php echo BASE_URL; ?>/assets/css/template.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script.js"></script>
</head>

<body>
    <h1> Permissoes </h1>

    <div class="tabarea">
        <div class="tabitem activetab"> Grupos de Permissões</div>
        <div class="tabitem"> Permissões</div>
    </div>
    <div class="tabcontent">
        <div class="tabbody" style="display:block;">
            <div class="button"><a href="<?php echo BASE_URL; ?>/permissions/add_group"> Adicionar grupo de Permissão</a> </div>

            <table border="0" width="100%">
                <tr>
                    <th>Nome do grupo de permissões</th>
                    <th width="70%">Ações</th>
                </tr>
                <?php foreach ($permissions_groups_list as $p) : ?>
                    <tr>
                        <td><?php echo $p['name']; ?></td>
                        <td width="100%">
                            <div class="button button-Excluir"><a href="<?php echo BASE_URL; ?>/permissions/delete_group/<?php echo $p['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir esta permissão?');">Excluir</a> </div>
                            <div class="button button-Editar"><a href="<?php echo BASE_URL; ?>/permissions/edit_group/<?php echo $p['id']; ?>" onclick=" return confirm('Tem certeza que deseja editar esta');">Editar</a> </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="tabbody">

            <div class="button"><a href="<?php echo BASE_URL; ?>/permissions/add"> Adicionar Permissão</a> </div>

            <table border="0" width="100%">
                <tr>
                    <th>Nome da Permissão</th>
                    <th width="70%">Ações</th>
                </tr>
                <?php foreach ($permissions_list as $p) : ?>
                    <tr>
                        <td><?php echo $p['name']; ?></td>
                        <td>
                            <div class="button button-Excluir"><a href="<?php echo BASE_URL; ?>/permissions/delete/<?php echo $p['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir esta permissão?');">Excluir</a> </div>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>

</html>