<?php
    class Catalogos_M extends ConexionClasificados_BD{

        public function __construct(){    
            parent::__construct();       
        }

        //SELECT de todos los productos de un catalogo
        public function consultarProductos($ID_Suscriptor){
            $stmt = $this->dbh->prepare(
                "SELECT productos.ID_Producto, ID_Suscriptor, ID_Seccion, opciones.ID_Opcion, producto, nombre_img, opcion, precioBolivar, precioDolar, cantidad, nuevo
                 FROM productos 
                 INNER JOIN imagenes ON productos.ID_Producto=imagenes.ID_Producto
                 INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto
                 INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion
                 INNER JOIN secciones_productos ON productos.ID_Producto=secciones_productos.ID_Producto
                 WHERE ID_Suscriptor = :ID_SUSCRIPTOR AND fotoPrincipal = 1"
            );

            $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);

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
                "SELECT productos.ID_Producto, ID_Suscriptor, producto, nuevo, opcion, precioBolivar, precioDolar, cantidad
                FROM productos
                INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto
                INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion
                WHERE productos.ID_Producto = :ID_PRODUCTO"
            );

            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
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
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT de todas las imagenes de un producto especifico
        public function consultarTodasImagenesProducto($ID_Producto){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Imagen, nombre_img
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

        //SELECT de las secciones de un catalogo especifico
        public function consultarSecciones($ID_Suscriptor){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Seccion, seccion
                 FROM secciones 
                 WHERE ID_Suscriptor = :ID_SUSCRIPTOR"
            );

            $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        } 

        // SELECT de todos los productos de una seccion especifica
        public function consultarProductosSeccion($ID_Suscriptor, $ID_Seccion){
            $stmt = $this->dbh->prepare(
                "SELECT productos.ID_Producto, productos.ID_Suscriptor, opciones.ID_Opcion, ID_Seccion, producto, nombre_img, opcion, precioBolivar, precioDolar, cantidad, nuevo
                 FROM productos 
                 INNER JOIN imagenes ON productos.ID_Producto=imagenes.ID_Producto
                 INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto
                 INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion
                 INNER JOIN secciones_productos ON productos.ID_Producto=secciones_productos.ID_Producto
                 WHERE productos.ID_Suscriptor = :ID_SUSCRIPTOR AND ID_Seccion = :ID_SECCION AND fotoPrincipal = 1"
            );

            $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);
            $stmt->bindParam(':ID_SECCION', $ID_Seccion, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        } 
        
        // SELECT de todos los productos de un catalogo
        public function consultarProductosTodos($ID_Suscriptor){
            $stmt = $this->dbh->prepare(
                "SELECT productos.ID_Producto, productos.ID_Suscriptor, ID_Seccion, opciones.ID_Opcion, producto, nombre_img, opcion, precioBolivar, precioDolar, cantidad, nuevo
                 FROM productos 
                 INNER JOIN imagenes ON productos.ID_Producto=imagenes.ID_Producto
                 INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto
                 INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion
                 INNER JOIN secciones_productos ON productos.ID_Producto=secciones_productos.ID_Producto
                 WHERE productos.ID_Suscriptor = :ID_SUSCRIPTOR AND fotoPrincipal = 1"
            );

            $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        } 
    }