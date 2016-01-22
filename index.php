<?php
    require_once 'controladores/ControladorCliente.php';
    require_once 'controladores/ControladorProducto.php';

    //$controladorCliente = new ControladorCliente();
    $controladorProducto = new ControladorProducto();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestion de Ventas</title>
</head>
<body>
    <?php
        //$controladorCliente->fromCliente();
        //$controladorCliente->listarClientes();
        $controladorProducto->frmProducto();
        $controladorProducto->listarProductos();
    ?>
</body>
</html>