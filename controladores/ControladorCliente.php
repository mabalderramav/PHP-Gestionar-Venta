<?php

    /**
    * Controlador para Clientes
    */
    class ControladorCliente
    {
        function __construct()
        {
        }

        #Metodos
        public function listarClientes()
        {
            require_once 'vistas/Cliente/VistaListarClientes.php';
        }
        public function fromCliente()
        {
            require_once 'vistas/Cliente/VistaFromCliente.php';
        }
    }
?>