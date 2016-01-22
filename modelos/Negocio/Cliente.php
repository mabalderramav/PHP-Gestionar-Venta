<?php
    require_once 'modelos/AccesoDatos/aDatos.php';
    /**
    *  Creación de la clase persona
    */
    class Cliente
    {
        #Atributos
        private $aDatos;
        private $idCliente;
        private $nombre;
        private $direccion;

        #Propiedades
        public  function setIdCliente($idCliente)
        {
            $this->idCliente = $idCliente;
        }
        public function getIdCliente()
        {
            return $this->idCliente;
        }
        public  function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }
        public function getNombre()
        {
            return $this->nombre;
        }
        public  function setDireccion($direccion)
        {
            $this->direccion = $direccion;
        }
        public function getDireccion()
        {
            return $this->direccion;
        }

        #Contructor y Destructor
        public function __construct()
        {
            $this->idCliente = 0;
            $this->nombre = "";
            $this->direccion = "";
            $this->aDatos = new aDatos();
        }
        public function __destruct()
        {}
        #Metodos Privados
        private function getListaCliente($lista)
        {
            $listaAux = array();
            foreach ($lista as $item)
            {
                $cliente = new Cliente();
                $cliente->setIdCliente($item["idCliente"]);
                $cliente->setNombre($item["nombre"]);
                $cliente->setDireccion($item["Direccion"]);
                $listaAux[] = $cliente;
            }
            return $listaAux;
        }
        #Metodos Publicos
        public function guardar()
        {
            $sql = "INSERT INTO cliente (nombre,Direccion) VALUES('$this->nombre','$this->direccion')";
            $result = $this->aDatos->ejecutar($sql);
            return $result;
        }
        public function modificar()
        {
            $sql = "UPDATE cliente set nombre= '$this->nombre', Direccion= '$this->direccion' where idCliente = $this->idCliente";
            $result = $this->aDatos->ejecutar($sql);
            return $result;
        }
        public function eliminar()
        {
            $sql = "DELETE from cliente where idCliente = $this->idCliente";
            $result = $this->aDatos->ejecutar($sql);
            return $result;
        }
        public function getCliente($idCliente)
        {
            $sql = "select idCliente,nombre,Direccion from cliente where idCliente = ".$idCliente;
            $listaClientes = $this->getListaCliente($this->aDatos->getDatos($sql));
            $cliente = $listaClientes[0];
            return $cliente;
        }
        public function getClientes()
        {
            $sql = "select idCliente,nombre,Direccion from cliente";
            $listaClientes = $this->getListaCliente($this->aDatos->getDatos($sql));
            return $listaClientes;
        }
    }
?>