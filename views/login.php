<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema Conta Azul</title>
    <link href="<?php echo BASE_URL; ?>/assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>

<body>
    <div class="AreaLogin">
        <form method="post">
            Digite seu email <br>
            <input type="email" class="email" name="email" placeholder="Digite seu email padrão">
            Senha
            <input type="password" class="password" name="password" placeholder="Digite sua senha">
            <input type="submit" value="Enviar">
            <?php if (isset($error) && !empty($error)) : ?>

                <!--VERICAÇÃO login e senha ("exibe mensagem caso exista error")-->
                <div class="warning"> <?php echo $error; ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>