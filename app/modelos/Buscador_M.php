<?php
    class Buscador_M extends ConexionClasificados_BD{

        public function __construct(){    
            parent::__construct();       
        }

        //SELECT de tiendas o de productos ofrecidos en tiendas
        public function consultarBusquedaTienda($Buscar){                                
            $stmt = $this->dbh->prepare(
                "SELECT productos.ID_Producto, ID_Suscriptor, opciones.ID_Opcion, producto, opcion, precioBolivar, precioDolar, nombre_img, nuevo
                 FROM productos 
                 INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto 
                 INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion 
                 INNER JOIN imagenes ON productos.ID_Producto=imagenes.ID_Producto
                 WHERE producto LIKE '$Buscar%'   
                 GROUP BY ID_Producto"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
    }