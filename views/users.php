<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
<h1>Usuários</h1>
<div class="button"><a href="<?php echo BASE_URL; ?>/users/add">Adicionar Usuário</a> </div>
<table  width="100%">
    <tr>
        <th>E-mail</th>
        <th>Grupo de Permissões</th>
        
        <th colspan="2">Ações</th>
    </tr>
    <?php foreach ($users_list as $us) : ?>
        <tr>
		<td ><?php echo $us['email']; ?></td>
            <td><?php echo $us['name']; ?></td>
            	
            <td>
                <div class="button button-Editar"><a href="<?php echo BASE_URL; ?>/users/edit/<?php echo $us['id']; ?>">Alterar</a></div>
            </td>   
            <td>
                <div class="button button-Excluir"><a href="<?php echo BASE_URL; ?>/users/delete/<?php echo $us['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Deletar</a></div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>