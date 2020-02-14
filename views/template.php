<html>

<head>
    <meta charset="UTF-8">
    <title>Painel - <?php echo $viewData['company_name'] ?></title>
    <link href="<?php echo BASE_URL; ?>/assets/css/template.css " rel="stylesheet">
</head>

<body>
    <div class="leftmenu">
        <div class="company_name">
            <?php echo $viewData['company_name'] ?>
        </div>
    </div>
    <div class="container">
        <div class="top">

            <div class="top_right"> <a href="<?php echo BASE_URL . '/login/logout'; ?> ">SAIR </a> </div>
            <div class="top_right"> <?php echo $viewData['user_email']; ?> </div>
        </div>
    </div>
</body>

</html>