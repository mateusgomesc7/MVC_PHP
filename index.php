<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mateus</title>
</head>
<body>
    <?php
        require './vendor/autoload.php';

        // O "as" é para criar um apelido
        use Core\ConfigController as Home;
        // Está instanciando o objeto
        $Url = new Home();
        //Este método serve para carrgar a página de aquisição
        $Url->carregar();
    ?>
</body>
</html>