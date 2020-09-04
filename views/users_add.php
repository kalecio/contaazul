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
<h1>Usuários - Adicionar</h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?php echo $error_msg; ?></div>
<?php endif; ?>

<form method="POST">

    <label for="email">E-mail</label><br />
    <input type="email" name="email" required /><br /><br />

    <label for="password">Senha</label><br />
    <input type="password" name="password" required /><br /><br />

    <label for="group">Grupo de Permissões</label><br />
    <select name="group" id="group" required>
        <?php foreach ($group_list as $g) : ?>
            <option value="<?php echo $g['id']; ?>"><?php echo $g['name']; ?></option>
        <?php endforeach; ?>
    </select><br /><br />

    <input type="submit" value="Adicionar"  class="button button-Adicionar">

</form>
</body>
</html>