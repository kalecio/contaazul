<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar</title>
</head>

<body>
    <h1>Usuário - Adicionar</h1>

    <form method="post">
        <label> Email<br>
            <input type="email" name="email" require />
        </label><br><br>
        <label> Senha<br>
            <input type="password" name="password" require/>
        </label><br><br>
        <label for="group">Grupo de Permissõess</label>
        <select name="group" id="group">
		
		<!--  Mostrando resultado de cada usuário vinculado a um grupo-->
            <?php foreach ($group_list as $group) : ?>
                <option value="<?php echo $group['id']; ?>"> <?php echo $group['name']; ?>

                </option>
            <?php endforeach ?> 
        </select> <br> <br>

        <input type="submit" value="Adicionar">
    </form>
</body>

</html>