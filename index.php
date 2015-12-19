<?php
    require_once 'controladores/ControladorCliente.php';

    $controladorCliente = new ControladorCliente();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestion de Ventas</title>
</head>
<body>
    <?php
        $controladorCliente->fromCliente();
        $controladorCliente->listarClientes();
    ?>
</body>
</html>