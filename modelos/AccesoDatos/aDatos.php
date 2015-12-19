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
        //Función que abre una conexión al servidor MySQL.
        //Y selecciona una base de datos MySQL.
        private function openConexion()
        {
            $this->conexion = mysql_connect($this->servidor, $this->usuario, $this->pass);
            mysql_select_db($this->db, $this->conexion) or die('No se pudo seleccionar la base de datos');
        }
        //Función que cierra una conexión MySQL.
        private function  closeConexion()
        {
            mysql_close($this->conexion);
        }
        //Funcion que libera los datos de la memoria. 
        private function liberarDatos($datos)
        {
            mysql_free_result($datos);
        }
        //Función que retorna para SELECT, SHOW, DESCRIBE, EXPLAIN 
        //y otras sentencias que retornan un conjunto de resultados, 
        //devuelve un resource en caso de éxito, o FALSE en caso de error.
        //Y para otros tipos de sentencias SQL,
        //tales como INSERT, UPDATE, DELETE, DROP, etc,
        //devuelve TRUE en caso de éxito o FALSE en caso de error.
        private function consultar($sql)
        {
            $result = mysql_query($sql, $this->conexion) or die('Consulta fallida: ' . mysql_error());
            return $result;
        }
        //Funcion que retorna un array ordenado de un conjunt de resultado
        //generado por la ejecución de una consulta Select.
        private function ordenarDatos($datos)
        {
            while ($registro = mysql_fetch_array($datos, MYSQL_ASSOC))
            {
                $arreglo[] = $registro;
            }

            return $arreglo;
        }

        #Metodos Publicos
        //Funcion que retorna TRUE en caso de éxito
        //o FALSE en caso de error.
        public function ejecutar($sql)
        {
            //Abrimos una conexion a una base de datos MySql.
            $this->openConexion();
            //Ejecutamos una consulta sql de tipo Insert, Update o Delete
            //en la base de datos MySql.
            $result = $this->consultar($sql);
            //Cerramos la conexion a la base datos MySql.
            $this->closeConexion();

            return $result;
        }
        //Funcion que retorna con conjunto de resultado en caso de éxito,
        //o FALSE en caso de error.
        public function  getDatos($sql)
        {
            //Abrimos una conexion a una base de datos MySql.
            $this->openConexion();
            //Ejecutamos una consulta sql de Select que retorna un conjunto
            //de resultados de la base de datos MySql.
            $datos_consulta = $this->consultar($sql);
            //Ordenamos el conjunto de resultado devuelto por la consulta.
            $datos = $this->ordenarDatos($datos_consulta);
            //Liberamos el conjunto de resultados obtenidos por la conusulta.
            $this->liberarDatos($datos_consulta);
            //Cerramos la conexion a la base datos MySql.
            $this->closeConexion();

            return $datos;
        }
    }
?>