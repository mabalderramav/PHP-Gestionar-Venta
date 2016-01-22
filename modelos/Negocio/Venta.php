<?php
    require_once 'modelos/AccesoDatos/aDatos.php';
    /**
    * Creación de la clase Venta
    */
    class Venta
    {
        #Atributos
        private $aDatos;
        private $idVenta;
        private $total;
        private $fechaRegistro;
        private $idCliente;
        private $idUsuario;

        #Propiedades
        public function setIdVenta($idVenta)
        {
            $this->idVenta = $idVenta;
        }
        public function getIdVenta()
        {
            return $this->idVenta;
        }
        public function setTotal($total)
        {
            $this->total = $total;
        }
        public function getTotal()
        {
            return $this->total;
        }
        public function setFechaRegistro($fechaRegistro)
        {
            $this->fechaRegistro = $fechaRegistro;
        }
        public function getFechaRegistro()
        {
            return $this->fechaRegistro;
        }
        public  function setIdCliente($idCliente)
        {
            $this->idCliente = $idCliente;
        }
        public function getIdCliente()
        {
            return $this->idCliente;
        }
        public  function setIdUsuario($idUsuario)
        {
            $this->idUsuario = $idUsuario;
        }
        public function getIdUsuario()
        {
            return $this->idUsuario;
        }

        #Contructor - Destructor
        public function __construct()
        {
            $this->aDatos = new aDatos();
            $this->idVenta = 0;
            $this->total = 0;
            $this->fechaRegistro = getdate();
        }
        public function __destruct()
        {}

        #Metodos Privados
        private function getListaVenta($lista)
        {
            $listaAux = array();
            foreach ($lista as $item)
            {
                $venta = new Venta();
                $venta->setIdVenta($item["idVenta"]);
                $venta->setNombre($item["nombre"]);
                $venta->setDireccion($item["Direccion"]);
                $listaAux[] = $venta;
            }
            return $listaAux;
        }

        #Metodos Publicos
        public function guardar()
        {
            $sql = "INSERT INTO venta (total,fechaRegistro,idCliente,idUsuario) 
                    VALUES('$this->total','$this->fechaRegistro',
                            $this->idCliente,$this->idUsuario)";
            $result = $this->aDatos->ejecutar($sql);
            return $result;
        }
        public function modificar()
        {
            $sql = "UPDATE venta 
                    set total='$this->total', fechaRegistro='$this->fechaRegistro',
                        idCliente=$this->idCliente,idUsuario=$this->idUsuario 
                    where idCliente = $this->idCliente";
            $result = $this->aDatos->ejecutar($sql);
            return $result;
        }
        public function eliminar()
        {
            $sql = "DELETE from venta where idVenta = $this->idVenta";
            $result = $this->aDatos->ejecutar($sql);
            return $result;
        }
        public function getVenta($idVenta)
        {
            $sql = "select idVenta,total,fechaRegistro,idCliente,idUsuario  
                    from venta 
                    where idVenta=$idVenta";
            $listaVentas = $this->getListaVenta($this->aDatos->getDatos($sql));
            $venta = $listaVentas[0];
            return $venta;
        }
        public function getVentas()
        {
            $sql = "select idVenta,total,fechaRegistro,idCliente,idUsuario 
                    from venta order by fechaRegistro asc";
            $listaVentas = $this->getListaVenta($this->aDatos->getDatos($sql));
            return $listaVentas;
        }
    }
?>