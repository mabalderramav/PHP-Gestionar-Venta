<?php
    require_once 'modelos/Negocio/Cliente.php';
    $cliente = new Cliente();
?>
<table>
    <tr>
        <td align="center"><strong>IdCliente</strong></td>
        <td align="center"><strong>Nombre</strong></td>
        <td align="center"><strong>Dirección</strong></td>
    </tr>
    <?php
        $lista = $cliente->getClientes();
        foreach ($lista as $item)
        {
            echo("<tr>");
                echo("<td align='center'>".$item->getIdCliente()."</td>");
                echo("<td align='center'>".$item->getNombre() . "</td>");
                echo("<td align='center'>".$item->getDireccion()."</td>");
            echo("</tr>");
        }
    ?>
</table>