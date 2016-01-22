<?php
    require_once 'modelos/AccesoDatos/aDatos.php';

    /**
    * Creación de la clase Producto
    */
    class Producto 
    {
        #Atributos
        private $aDatos;
        private $idProducto;
        private $nombre;
        private $stock;
        private $precio;

        #Propiedades
        public function setIdProducto($idProducto)
        {
            $this->idProducto = $idProducto;
        }
        public function getIdProducto()
        {
            return $this->idProducto;
        }
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }
        public function getNombre()
        {
            return $this->nombre;
        }
        public function setStock($stock)
        {
            $this->stock = $stock;
        }
        public function getStock()
        {
            return $this->stock;
        }
        public function setPrecio($precio)
        {
            $this->precio = $precio;
        }
        public function getPrecio()
        {
            return $this->precio;
        }

        #Contructor - Destructor
        public function __construct()
        {
            $this->idProducto = 0;
            $this->nombre = "";
            $this->stock = 0;
            $this->precio = 0;
            $this->aDatos = new aDatos();
        }

        #Metodos Privados
        private function getListaProducto($lista)
        {
            $listaAux = array();

            foreach ($lista as $item)
            {
                $producto = new Producto();
                $producto->setIdProducto($item["idProducto"]);
                $producto->setNombre($item["nombre"]);
                $producto->setStock($item["stock"]);
                $producto->setPrecio($item["precio"]);

                $listaAux[] = $producto;
            }
            return $listaAux;
        }
        #Metodos Publicos
        public function guardar()
        {
            $sql = "INSERT INTO producto (nombre,stock,precio) values('$this->nombre',$this->stock,$this->precio)";
            $result = $this->aDatos->ejecutar($sql);
            return $result;
        }

        public function eliminar()
        {
            $sql = "DELETE from producto where idProducto = $this->idProducto";
            $result = $this->aDatos->ejecutar($sql);
            return $result;
        }

        public function modificar()
        {
            $sql = "UPDATE producto 
                    set nombre= '$this->nombre',
                    stock=$this->stock,
                    precio= $this->precio 
                    where idProducto=$this->idProducto";
            $result = $this->aDatos->ejecutar($sql);
            return $result;
        }

        public function getProducto($idProducto)
        {
            $sql = "select idProducto,nombre,stock,precio
                    from producto where idProducto=$idProducto";
            $listaProductos = $this->getListaProducto($this->aDatos->getDatos($sql));
            $producto = $listaProductos[0];
            return $producto;
        }

        public function getProductos()
        {
            $sql = "select idProducto,nombre,stock,precio
                    from producto order by nombre asc";
            
            $listaProductos = $this->getListaProducto($this->aDatos->getDatos($sql));
            return $listaProductos;
        }
    }
?>