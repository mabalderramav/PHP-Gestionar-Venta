<?php
    require_once 'modelos/AccesoDatos/aDatos.php';
    /**
    * Creación de la clase Usuario
    */
    class ClassName extends AnotherClass
    {
        #Atributos
        private $aDatos;
        private $idUsuario;
        private $nombre;
        private $contrasena;
        private $idRol;

        #Propiedadades
        public  function setIdUsuario($idUsuario)
        {
            $this->idUsuario = $idUsuario;
        }
        public function getIdUsuario()
        {
            return $this->idUsuario;
        }
        public  function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }
        public function getNombre()
        {
            return $this->nombre;
        }
        public  function setContrasena($contrasena)
        {
            $this->contrasena = $contrasena;
        }
        public function getContrasena()
        {
            return $this->contrasena;
        }
        public function setIdRol($idRol)
        {
            $this->idRol = $idRol;
        }
        public function getIdRol()
        {
            return $this->idRol;
        }

        #Contructor - Destructor
        public function __construct()
        {
            $this->aDatos = new aDatos();
            $this->idUsuario = 0;
            $this->nombre = "";
            $this->contrasena = "";
            $this->idRol = 0;
        }
        public function __destruct()
        {}

        #Metodos Privados
        private function getListaUsuario($lista)
        {
            $listaAux = array();
            foreach ($lista as $item)
            {
                $usuario = new Usuario();
                $usuario->setIdUsuario($item["idUsuario"]);
                $usuario->setNombre($item["nombre"]);
                $usuario->setContrasena($item["contrasena"]);
                $usuario->setIdRol($item["idRol"]);
                $listaAux[] = $usuario;
            }
            return $listaAux;
        }

        #Metodos Públicos
        public function guardar()
        {
            $sql = "INSERT INTO usuario (nombre,contrasena,idRol) 
                    VALUES('$this->nombre','$this->contrasena',$this->idRol)";
            $result = $this->aDatos->ejecutar($sql);
            return $result;
        }
        public function modificar()
        {
            $sql = "UPDATE usuario 
                    set nombre='$this->nombre', contrasena='$this->contrasena', 
                        idRol=$this->idRol 
                    where idUsuario = $this->idUsuario";
            $result = $this->aDatos->ejecutar($sql);
            return $result;
        }
        public function eliminar()
        {
            $sql = "DELETE from usuario where idUsuario = $this->idUsuario";
            $result = $this->aDatos->ejecutar($sql);
            return $result;
        }
        public function getUsuario($idUsuario)
        {
            $sql = "select idUsuario,nombre,contrasena,idRol 
                    from usuario where idUsuario = ".$idUsuario;
            $listaUsuarios = $this->getListaUsuario($this->aDatos->getDatos($sql));
            $usuario = $listaUsuarios[0];
            return $usuario;
        }
        public function getUsuarios()
        {
            $sql = "select idUsuario,nombre,contrasena,idRol 
                    from usuario";
            $listaUsuarios = $this->getListaUsuario($this->aDatos->getDatos($sql));
            return $listaUsuarios;
        }
    }
?>