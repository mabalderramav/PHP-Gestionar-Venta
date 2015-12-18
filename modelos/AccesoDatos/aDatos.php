<?php
    /**
    * Clase que nos permite la conexión a MySql
    */
    class aDatos
    {
        #atributos
        private $conexion;
        private $servidor;
        private $usuario;
        private $pass;
        private $db;

        #Contructor - destructor
        public  function __construct()
        {
            $this->servidor = "127.0.0.1";
            $this->usuario = "root";
            $this->pass = "root";
            $this->db = "dbventas";
        }
        public function __destruct()
        {}

        #Metodos Privados
        private function openConexion()
        {
            $this->conexion = mysql_connect($this->servidor, $this->usuario, $this->pass);
            mysql_select_db($this->db, $this->conexion) or die('No se pudo seleccionar la base de datos');
        }
        private function  closeConexion()
        {
            mysql_close($this->conexion);
        }
        private function liberarDatos($datos)
        {
            mysql_free_result($datos);
        }
        private function consultar($sql)
        {
            $result = mysql_query($sql, $this->conexion) or die('Consulta fallida: ' . mysql_error());
            return $result;
        }
        private function ordenarDatos($datos)
        {
            while ($registro = mysql_fetch_array($datos, MYSQL_ASSOC))
            {
                $arreglo[] = $registro;
            }
            return $arreglo;
        }

        #Metodos Publicos
        public function ejecutar($sql)
        {
            $this->openConexion();
            $result = mysql_query($sql, $this->conexion);
            $this->closeConexion();

            return $result;
        }
        public function  getDatos($sql)
        {
            $this->openConexion();
            $datos_consulta = $this->consultar($sql);
            $datos = $this->ordenarDatos($datos_consulta);
            $this->liberarDatos($datos_consulta);
            $this->closeConexion();
            return $datos;
        }
    }
?>