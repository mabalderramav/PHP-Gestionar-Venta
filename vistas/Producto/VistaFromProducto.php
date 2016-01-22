<?php
    require_once 'modelos/Negocio/Producto.php';
?>
<div>
    <form action="index.php" method="post">
        <div>
            <p>
                <strong>IdProducto :</strong>
                <input type="text" name="txtIdProducto" id="txtIdProducto"/>
            </p>
            <p>
                <strong>Nombre :</strong>
                <input type="text" name="txtNombre" id="txtNombre"/>
            </p>
            <p>
                <strong>Stock :</strong>
                <input type="text" name="txtStock" id="txtStock"/>
            </p>
            <p>
                <strong>Precio :</strong>
                <input type="text" name="txtPrecio" id="txtPrecio"/>
            </p>
        </div>
        <div>
            <input type="submit" name="guardar" id="guardar" value="Guardar">
            <input type="submit" name="modificar" id="modificar" value="Modificar">
            <input type="submit" name="eliminar" id="eliminar" value="Eliminar">
            <input type="reset" value="Limpiar">
        </div>
    </form>
</div>
<?php
    if ($_POST["guardar"])
    {
        if(!empty($_POST["txtNombre"]) && !empty($_POST["txtStock"]) && !empty($_POST["txtPrecio"]))
        {
            $idProducto = $_POST["txtIdProducto"];
            $nombre = $_POST["txtNombre"];
            $stock = $_POST["txtStock"];
            $precio = $_POST["txtPrecio"];

            $producto = new Producto();

            $producto->setIdProducto($idProducto);
            $producto->setNombre($nombre);
            $producto->setStock($stock);
            $producto->setPrecio($precio);

            if($producto->guardar())
            {
                echo "<script>alert('se guardo con exito');</script>";
            }
            else
            {
                echo "<script>alert('No se pudo guardar el registro');</script>";
            }
        }
        else
        {
            echo "<script>alert('Por favor ingrese datos validos al formulario');</script>";
        }        
    }
    if($_POST["modificar"])
    {
       if(!empty($_POST["txtIdProducto"]) && !empty($_POST["txtNombre"]) && !empty($_POST["txtStock"]) && !empty($_POST["txtPrecio"]))
       {
            $idProducto = $_POST["txtIdProducto"];
            $nombre = $_POST["txtNombre"];
            $stock = $_POST["txtStock"];
            $precio = $_POST["txtPrecio"];

            $producto = new Producto();

            $producto->setIdProducto($idProducto);
            $producto->setNombre($nombre);
            $producto->setStock($stock);
            $producto->setPrecio($precio);

            if($producto->modificar())
            {
                echo "<script>alert('se se modifico con exito');</script>";
            }
            else
            {
                echo "<script>alert('No se pudo modifico el registro');</script>";
            }
        }
        else
        {
            echo "<script>alert('Por favor ingrese datos validos al formulario');</script>";
        }
    }
    if($_POST["eliminar"])
    {
        if(!empty($_POST["txtIdProducto"]))
        {
            $idProducto = $_POST["txtIdProducto"];
            $producto = new Producto();
            $producto->setIdProducto($idProducto);
            if($producto->eliminar())
            {
                echo "<script>alert('se elimino con exito');</script>";
            }
            else
            {
                echo "<script>alert('No se pudo eliminar el registro');</script>";
            }
        }
        else
        {
            echo "<script>alert('Por favor ingrese datos validos al formulario');</script>";
        }
    }
?>