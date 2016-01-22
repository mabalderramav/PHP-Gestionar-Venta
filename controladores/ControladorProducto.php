<?php
    /**
    * Controlador para los productos
    */
    class ControladorProducto
    {
        #Contructor - Destructor
        public function __construct()
        {
        }
        public function __destruct()
        {
        }
        #Metodos
        public function listarProductos()
        {
            require_once 'vistas/Producto/VistaListarProductos.php';
        }
        public function frmProducto()
        {
            require_once 'vistas/Producto/VistaFromProducto.php';
        }
    }
?>