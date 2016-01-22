<?php
    require_once 'modelos/AccesoDatos/aDatos.php';
    /**
    * Creación de la clase Detalle
    */
    class Detalle
    {
        #Atributos
        private $aDatos;
        private $idVenta;
        private $idProducto;
        private $cantidad;
        private $subTotal;

        #Propiedades
        public function setIdVenta($idVenta)
        {
            $this->idVenta = $idVenta;
        }
        public function getIdVenta()
        {
            return $this->idVenta;
        }
        public function setIdProducto($idProducto)
        {
            $this->idProducto = $idProducto;
        }
        public function getIdProducto()
        {
            return $this->idProducto;
        }
        public function setCantidad($cantidad)
        {
            $this->cantidad = $cantidad;
        }
        public function getCantidad()
        {
            return $this->cantidad;
        }
        public function setSubTotal($subTotal)
        {
            $this->subTotal = $subTotal;
        }
        public function getSubTotal()
        {
            return $this->subTotal;
        }

        #Contructor - Destructor
        public function __construct()
        {
            $this->aDatos = new aDatos();
            $this->idVenta = 0;
            $this->idProducto = 0;
            $this->cantidad = 0;
            $this->subTotal = 0;
        }
        public function __destruct()
        {}

        #Metodos Privados
        private function getListaDetalle($lista)
        {
            $listaAux = array();
            foreach ($lista as $item)
            {
                $detalle = new Detalle();
                $detalle->setIdVenta($item["idVenta"]);
                $detalle->setIdProducto($item["idProducto"]);
                $detalle->setCantidad($item["cantidad"]);
                $detalle->setSubTotal($item["subTotal"]);
                $listaAux[] = $detalle;
            }
            return $listaAux;
        }
        #Metodos Publicos
        public function guardar()
        {
            $sql = "INSERT INTO detalle (idVenta,idProducto,cantidad,subTotal) 
                    VALUES($this->idVenta,$this->idProducto,$this->cantidad,$this->subTotal)";
            $result = $this->aDatos->ejecutar($sql);
            return $result;
        }
        public function modificar()
        {
            $sql = "UPDATE detalle 
                    set idVenta= '$this->idVenta', idProducto= '$this->idProducto',
                        cantidad=$this->cantidad,subTotal=$this->subTotal 
                    where idVenta=$this->idVenta and idProducto=$this->idProducto";
            $result = $this->aDatos->ejecutar($sql);
            return $result;
        }
        public function eliminar()
        {
            $sql = "DELETE from detalle 
                    where idVenta = $this->idVenta and idProducto=$this->idProducto";
            $result = $this->aDatos->ejecutar($sql);
            return $result;
        }
        public function getDetalle($idDetalle,$idProducto)
        {
            $sql = "select idVenta,idProducto,cantidad,subTotal  
                    from detalle 
                    where idVenta = $idVenta and idProducto=$idProducto";
            $listaDetalles = $this->getListaDetalle($this->aDatos->getDatos($sql));
            $detalle = $listaDetalles[0];
            return $detalle;
        }
        public function getDetalles()
        {
            $sql = "select idVenta,idProducto,cantidad,subTotal 
                    from detalle order by idVenta,idProducto desc";
            $listaDetalles = $this->getListaDetalle($this->aDatos->getDatos($sql));
            return $listaDetalles;
        }
        public function getDetalles($idVenta)
        {
            $sql = "select idVenta,idProducto,cantidad,subTotal 
                    from detalle 
                    where idVenta=$idVenta 
                    order by idProducto desc";
            $listaDetalles = $this->getListaDetalle($this->aDatos->getDatos($sql));
            return $listaDetalles;
        }
    }
?>