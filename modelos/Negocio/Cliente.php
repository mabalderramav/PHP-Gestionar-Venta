<?php
    require_once 'modelos/AccesoDatos/aDatos.php';
    /**
    *  Creación de la clase persona
    */
    class Cliente
    {
        #Atributos
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
        public function getCliente($idCliente)
        {
            $aDatos = new aDatos();
            $sql = "select idCliente,nombre,Direccion from cliente where idCliente = ".$idCliente;
            $listaClientes = $this->getListaCliente($aDatos->getDatos($sql));
            $cliente = $listaClientes[0];
            return $cliente;
        }
        public function getClientes()
        {
            $aDatos = new aDatos();
            $sql = "select idCliente,nombre,Direccion from cliente";
            $listaClientes = $this->getListaCliente($aDatos->getDatos($sql));
            return $listaClientes;
        }
        public function Guardar()
        {
            $aDatos = new aDatos();
            $sql = "INSERT INTO cliente (nombre,Direccion) VALUES('$this->nombre','$this->direccion')";
            $result = $aDatos->ejecutar($sql);
            return $result;
        }
        public function Modificar()
        {
            $aDatos = new aDatos();
            $sql = "UPDATE cliente set nombre= '$this->nombre' Direccion= '$this->direccion' where idCliente = $this->idCliente";
            $result = $aDatos->ejecutar($sql);
            return $result;
        }
        public function Eliminar()
        {
            $aDatos = new aDatos();
            $sql = "DELETE from cliente where idCliente = $this->idCliente";
            $result = $aDatos->ejecutar($sql);
            return $result;
        }
    }
?>