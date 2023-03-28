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
        
        //SELECT de las caracteristicas de un producto especifico
        public function consultarCaracterisicaProductoEsp($ID_Producto){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Producto 
                FROM caracteristicaproducto 
                WHERE ID_Producto = :ID_PRODUCTO"
            );

            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }
        

        //SELECT de las caracteristicas de los productos de una tienda
        public function consultarImagenesProducto($ID_Producto){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_img 
                FROM imagenes 
                WHERE ID_Producto = :ID_PRODUCTO"
            );

            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }
    }