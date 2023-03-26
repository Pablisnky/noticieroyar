<?php
    class Clasificados_M extends ConexionClasificados_BD{

        public function __construct(){    
            parent::__construct();       
        }

        public function consultarProductos(){
            $stmt = $this->dbh->prepare(
                "SELECT productos.ID_Producto, ID_Suscriptor, opciones.ID_Opcion, producto, nombre_img, opcion, precioBolivar, precioDolar, cantidad, disponible
                 FROM productos 
                 INNER JOIN imagenes ON productos.ID_Producto=imagenes.ID_Producto
                 INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto
                 INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }    
    }