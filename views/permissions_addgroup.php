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
    <input type="submit" value="Adicionar">
</form>