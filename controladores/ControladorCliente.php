<?php
    require_once 'vistas/VistaCliente.php';

    /**
    * Controlador para Clientes
    */
    class ControladorCliente
    {
        private $vistaCliente;
        function __construct()
        {
            $this->vistaCliente = new VistaCliente();
        }

        #Metodos
        public function listarClientes()
        {
            $this->vistaCliente->getClientes();
        }
        public function mostrarCliente($idCliente)
        {
            $this->vistaCliente->getCliente($idCliente);
        }
    }
?>