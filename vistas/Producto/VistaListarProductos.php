<?php
    require_once 'modelos/Negocio/Producto.php';
    $producto = new Producto();
?>
<table>
    <tr>
        <td><strong>idProducto</strong></td>
        <td><strong>Producto</strong></td>
        <td><strong>Stock</strong></td>
        <td><strong>Precio</strong></td>
    </tr>
    <?php
        $lista = $producto->getProductos();

        foreach ($lista as $item) 
        {
            echo "<tr>";
                echo "<td aling='center'>".$item->getIdProducto()."</td>";
                echo "<td aling='center'>".$item->getNombre()."</td>";
                echo "<td aling='center'>".$item->getStock()."</td>";
                echo "<td aling='center'>".$item->getPrecio()."</td>";
            echo "</tr>";
        }
    ?>
</table>