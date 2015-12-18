<?php
    require_once 'modelos/Negocio/Cliente.php';
    /**
    * Vista de los Clientes
    */
    class VistaCliente
    {
        #atributos
        private $cliente;

        #Contructor - Descructor
        public function __construct()
        {
            $this->cliente = new Cliente();
        }

        public function __destruct()
        {}

        #Metodos
        public function getClientes()
        {
            $lista = $this->cliente->getClientes();
            echo("<table>");
            foreach ($lista as $item)
            {
                    echo("<tr>");
                        echo("<td>".$item->getIdCliente()."</td>");
                        echo("<td>".$item->getNombre() . "</td>");
                        echo("<td>".$item->getDireccion()."</td>");
                    echo("</tr>");
            }
            echo("</table>");
        }
        public function getCliente($idCliente)
        {
            $cliente = $this->cliente->getCliente($idCliente);
            echo "<div>";
                echo "<p>";
                    echo "Trayento al Cliente : ".$cliente->getNombre();
                echo "</p>";
            echo "</div>";
        }
    }
?>