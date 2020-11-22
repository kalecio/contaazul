<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permissões grupo</title>
</head>

<body>
    <h1>Permissões - Adicionar Grupo de Permissões</h1>

    <form method="post">
        <label> Nome do grupo de permissões <br>
            <input type="text" name="name" />
        </label><br><br>

        <label> Permissões </label> <br />
        <?php foreach ($permissions_list as $p) : ?>
            <div class="p_item">

                <input type="checkbox" name="permissions[]" value="<?php echo $p['id']; ?> " id="p_<?php echo $p['id']; ?>" />
                <label for="p_<?php echo $p['id']; ?>"><?php echo $p['name']; ?> <br /> </label>
            </div>

        <?php endforeach ?>
        <br />
        <input type="submit" value="Adicionar" class="button button-Excluir">
    </form>
</body>

</html>