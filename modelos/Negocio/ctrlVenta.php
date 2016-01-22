<?php 
    require_once 'modelos/AccesoDatos/aDatos.php';
    require_once 'modelos/Negocio/Venta.php';
    require_once 'modelos/Negocio/Detalle.php';
    require_once 'modelos/Negocio/Producto.php';
    /**
    * Creacion de la clase ctrlVenta
    * encargada de gestionar una venta
    */
    class ctrlVenta
    {
        #Atributos
        private $trans;
        private $venta;
        private $listaDetalle;
        private $producto;
        #Propiedades
        public function setVenta($venta)
        {
            $this->venta = $venta;
        }
        public function getVenta()
        {
            return $this->venta;
        }
        public function setListaDetalle($listaDetalle)
        {
            $this->listaDetalle = $listaDetalle;
        }
        public function getListaDetalle()
        {
            return $this->listaDetalle;
        }
        public function setProducto($producto)
        {
            $this->producto = $producto;
        }
        public function getProducto()
        {
            return $this->producto;
        }
        #Contructor - Destructor
        public function __construct()
        {
            $this->venta = new Venta();
            $this->listaDetalle = Array();
            $this->producto = new Producto();
            $this->trans = new aDatos();
        }
        public function __destruct()
        {}

        #Metodos
        public function guardar()
        {
            if ($this->trans->iniciarTransaccion()) 
            {
                $this->venta->setTrans($this->trans);
                if($this->venta->guardar())
                {
                    $sql = "select top 1 idVenta 
                            from venta 
                            order by idVenta desc";
                    $idVenta = $this->trans->ejecutar($sql);
                    foreach ($listaDetalle as $detalle) 
                    {
                        $detalle->setTrans($this->trans);
                        $detalle->setIdVenta($idVenta);
                        if($detalle->guardar())
                        {
                            $this->producto = $this->producto->getProducto($detalle->getIdProducto()); 
                            $stock = $this->producto->getStock();
                            $cantidad = $detalle->getCantidad();
                            $stock = $stock - $cantidad;
                            $this->producto->setProducto($stock);
                            if(!$this->producto->modificar())
                            {
                                $this->trans->revertirTransaccion();
                                return false;
                            }
                        }
                        else
                        {
                            $this->trans->revertirTransaccion();
                            return false;
                        }
                    }
                }
                else
                {
                    $this->trans->revertirTransaccion();
                    return false;
                }
                $this->trans->confirmarTransaccion();
                $this->trans->cerrarTransaccion();
            }
            
        }
    }
?>