<h1>Usuários</h1>
<div class="button"><a href="<?php echo BASE_URL; ?>/users/add">Adicionar Usuário</a> </div>
<!--  LEBMRAR DE POR UM LINK VIA JS PARA MELHORAR O USO DO BOTÃO
* OLHAR EM  MEUS RESUMOS-->

<table  width="100%">
    <tr>
        <th>E-mail</th>
        <th>Grupo de Permissões</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($users_list as $us) : ?>
        <tr>
		<td ><?php echo $us['email']; ?></td>
            <td><?php echo $us['name']; ?></td>
            	
            <td width="100%">
                <div class="button button_small"><a href="<?php echo BASE_URL; ?>/users/edit/<?php echo $us['id']; ?>">Alterar</a></div>
                <div class="button button_small"><a href="<?php echo BASE_URL; ?>/users/delete/<?php echo $us['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Deletar</a></div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>