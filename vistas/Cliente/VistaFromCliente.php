<?php
    require_once 'modelos/Negocio/Cliente.php';
?>
<div>
    <form method="post" action="index.php">
        <div>    
            <p>
                <strong>IdCliente :</strong> 
                <input type="text" name="idCliente" id="idCliente" />
            </p>
            <p>
                <strong>Nombre :</strong> 
                <input type="text" name="nombre" id="nombre" />
            </p>
            <p>
                <strong>Dirección :</strong> 
                <input type="text" name="direccion" id="direccion" />
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
    if($_POST["guardar"])
    {
        if(!empty($_POST["direccion"]) && !empty($_POST["nombre"]))
        {
            $idCliente = $_POST["IdCliente"];
            $nombre = $_POST["nombre"];
            $direccion = $_POST["direccion"];

            $cliente = new Cliente();

            $cliente->setIdCliente($idCliente);
            $cliente->setNombre($nombre);
            $cliente->setDireccion($direccion);

            if($cliente->guardar())
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
        if(!empty($_POST["idCliente"]) && !empty($_POST["direccion"]) && !empty($_POST["nombre"]))
        {
            $idCliente = $_POST["idCliente"];
            $nombre = $_POST["nombre"];
            $direccion = $_POST["direccion"];

            $cliente = new Cliente();

            $cliente->setIdCliente($idCliente);
            $cliente->setNombre($nombre);
            $cliente->setDireccion($direccion);

            if($cliente->modificar())
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
        if(!empty($_POST["idCliente"]))
        {
            $idCliente = $_POST["idCliente"];
            $cliente = new Cliente();

            $cliente->setIdCliente($idCliente);

            if($cliente->eliminar())
            {
                echo "<script>alert('se eliminó con exito el registro');</script>";
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