<?php
    require_once 'modelos/AccesoDatos/aDatos.php';
    /**
    * Creación de la clase Rol
    */
    class Rol
    {
        #Atributos
        private $aDatos;
        private $idRol;
        private $descripcion;

        #Propiedades
        public function setIdRol($idRol)
        {
            $this->idRol = $idRol;
        }
        public function getIdRol()
        {
            return $this->idRol;
        }
        public function setDescripcion($descripcion)
        {
            $this->descripcion = $descripcion;
        }
        public function getDescripcion()
        {
            return $this->descripcion;
        }

        #Contructor - Destructor
        public function __construct()
        {
            $this->aDatos = new aDatos();
            $this->idRol = 0;
            $this->descripcion = "";
        }
        public function __destruct()
        {}

        #Metodos Privados
        private function getListaRoles($lista)
        {
            $listaAux = array();
            foreach ($lista as $item)
            {
                $rol = new Rol();
                $rol->setIdRol($item["idRol"]);
                $rol->setDescripcion($item["descripcion"]);
                $listaAux[] = $rol;
            }
            return $listaAux;
        }
        #Metodos Públicos
        public function guardar()
        {
            $sql = "INSERT INTO rol (descripcion) 
                    VALUES('$this->descripcion')";
            $result = $this->aDatos->ejecutar($sql);
            return $result;
        }
        public function modificar()
        {
            $sql = "UPDATE rol set descripcion= '$this->descripcion' 
                    where idRol = $this->idRol";
            $result = $this->aDatos->ejecutar($sql);
            return $result;
        }
        public function eliminar()
        {
            $sql = "DELETE from rol where idRol = $this->idRol";
            $result = $this->aDatos->ejecutar($sql);
            return $result;
        }
        public function getRol($idRol)
        {
            $sql = "select idRol,descripcion 
                    from rol 
                    where idRol = ".$idRol;
            $listaRoles = $this->getListaRol($this->aDatos->getDatos($sql));
            $rol = $listaRoles[0];
            return $Rol;
        }
        public function getRoles()
        {
            $sql = "select idRol,descripcion from rol";
            $listaRoles = $this->getListaRoles($this->aDatos->getDatos($sql));
            return $listaRoles;
        }
    }
?>