<?php
    class Clasificados_M extends ConexionClasificados_BD{

        public function __construct(){    
            parent::__construct();       
        }

        public function consultarProductos(){
            $stmt = $this->dbh->query(
                "SELECT productos.ID_Producto, ID_Suscriptor, opciones.ID_Opcion, producto, nombre_img, opcion, precioBolivar, precioDolar, cantidad, nuevo
                 FROM productos 
                 INNER JOIN imagenes ON productos.ID_Producto=imagenes.ID_Producto
                 INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto
                 INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion
                 ORDER BY RAND()"
            );

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

         //CONSULTA la cantidad de anuncios clasificados de un suscripto
         public function consultarAnunciosClasificados($ID_Suscriptor){
            $stmt = $this->dbh->prepare(
                "SELECT COUNT(ID_Producto) AS cantidadAnncios
                FROM productos  
                WHERE ID_Suscriptor = :ID_SUSCRIPTOR"
            );

            $stmt->bindValue(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_STR);
            
            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT de los productos que tiene un suscriptor especifico
        public function consultarTodosProductosSuscriptor($ID_Suscriptor){
            $stmt = $this->dbh->prepare(
                "SELECT productos.ID_Producto, producto, opciones.ID_Opcion, opcion, opciones.precioBolivar, opciones.precioDolar, cantidad, nombre_img
                FROM productos 
                INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto 
                INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion 
                INNER JOIN imagenes ON productos.ID_Producto=imagenes.ID_Producto 
                WHERE ID_Suscriptor = :ID_SUSCRIPTOR AND fotoPrincipal = :FOTOPRINCIPAL 
                ORDER BY productos.producto, opciones.opcion");

            $stmt->bindValue(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);
            $stmt->bindValue(':FOTOPRINCIPAL', 1, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }
        }
        
        //SELECT de la IMAGEN PRINCIPAL de un producto determinado
        public function consultarImagenPrincipal($ID_Producto){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Imagen, nombre_img 
                FROM imagenes 
                WHERE ID_Producto = :ID_PRODUCTO AND fotoPrincipal = :PRINCIPAL"
            );

            $stmt->bindValue(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);
            $stmt->bindValue(':PRINCIPAL', 1, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }
        }

        //SELECT de la IMAGEN PRINCIPAL de un producto determinado
        public function consultarImagenSecundaria($ID_Producto){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Imagen, nombre_img 
                FROM imagenes 
                WHERE ID_Producto = :ID_PRODUCTO AND fotoPrincipal = :SECUNDARIA"
            );

            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);
            $stmt->bindValue(':SECUNDARIA', 0, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }
        }

        //SELECT de un producto especificao de una tienda determinada
        public function consultarDescripcionProducto($ID_Producto){
            $stmt = $this->dbh->prepare(
                "SELECT productos.ID_Producto, opciones.ID_Opcion, producto, opcion, precioBolivar, precioDolar, cantidad
                FROM productos 
                INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto 
                INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion 
                WHERE productos.ID_Producto = :ID_PRODUCTO");

            $stmt->bindParam(':ID_PRODUCTO', $id_producto, PDO::PARAM_INT);

            $id_producto = $ID_Producto;

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        //SELECT de todas las imagenes de un producto
        public function consultarImagenesEliminar($ID_Producto){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_img 
                FROM imagenes 
                WHERE ID_Producto = :ID_PRODUCTO");

            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT de todas las imagenes de un producto
        public function consultarImageneEspecificaEliminar($ID_Imagen){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_img 
                FROM imagenes 
                WHERE ID_Imagen = :ID_IMAGEN");

            $stmt->bindParam(':ID_IMAGEN', $ID_Imagen, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        // ************************************************************************************
        // *********************************   INSERT   ***************************************
        // ************************************************************************************

        //INSERT de la imagen principal de un producto
        public function insertaImagenPrincipalProducto($ID_Producto, $nombre_imgProducto, $tipo_imgProducto, $tamanio_imgProducto){
            $stmt = $this->dbh->prepare(
                "INSERT INTO imagenes(ID_Producto, nombre_img, tipoArchivo, tamanoArchivo, fotoPrincipal, fecha, hora) 
                VALUES(:ID_PRODUCTO, :NOMBRE_IMG, :TIPO_ARCHIVO, :TAMANIO_ARCHIVO, :PRINCIPAL, CURDATE(), CURTIME())"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto);
            $stmt->bindParam(':NOMBRE_IMG', $nombre_imgProducto);
            $stmt->bindParam(':TIPO_ARCHIVO', $tipo_imgProducto);
            $stmt->bindParam(':TAMANIO_ARCHIVO', $tamanio_imgProducto);
            $stmt->bindValue(':PRINCIPAL', 1);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        } 
        
         //INSERT de la imagen secundarias de un producto
         public function insertaImagenSecundariaProducto($ID_Producto, $nombre_imgProducto, $tipo_imgProducto, $tamanio_imgProducto){
            $stmt = $this->dbh->prepare(
                "INSERT INTO imagenes(ID_Producto, nombre_img, tipoArchivo, tamanoArchivo, fotoPrincipal, fecha, hora) 
                VALUES(:ID_PRODUCTO, :NOMBRE_IMG, :TIPO_ARCHIVO, :TAMANIO_ARCHIVO, :PRINCIPAL, CURDATE(), CURTIME())"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto);
            $stmt->bindParam(':NOMBRE_IMG', $nombre_imgProducto);
            $stmt->bindParam(':TIPO_ARCHIVO', $tipo_imgProducto);
            $stmt->bindParam(':TAMANIO_ARCHIVO', $tamanio_imgProducto);
            $stmt->bindValue(':PRINCIPAL', 0);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        } 
        public function insertarDT_ProOpc( $ID_Producto, $ID_Opcion){
            $stmt = $this->dbh->prepare("INSERT INTO productos_opciones(ID_Producto, ID_Opcion) VALUES(:ID_PRODUCTO, :ID_OPCION)");

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_PRODUCTO', $id_producto);
            $stmt->bindParam(':ID_OPCION', $opcion);
            
            // insertar una fila
            $id_producto = $ID_Producto;
            $opcion = $ID_Opcion;

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        //INSERT de la opcion y el precio de un producto
        public function insertarOpcionesProducto($RecibeProducto){
            $stmt = $this->dbh->prepare(
                "INSERT INTO opciones(opcion, precioBolivar, precioDolar, cantidad) 
                VALUES (:OPCION, :PRECIOBS, :PRECIODOLAR, :CANTIDAD)"
            );

            //Se da formato al precio, dos decimales
            $PrecioDolar = number_format($RecibeProducto['PrecioDolar'], 2, '.', '');

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':OPCION', $RecibeProducto['Descripcion']);
            $stmt->bindParam(':PRECIOBS', $RecibeProducto['PrecioBs']);
            $stmt->bindParam(':PRECIODOLAR', $PrecioDolar);
            $stmt->bindParam(':CANTIDAD', $RecibeProducto['Cantidad']);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return $this->dbh->lastInsertId();
            }
            else{
                return false;
            }
        }
        
        //INSERT de un producto
        public function insertarProducto($RecibeProducto){
            $stmt = $this->dbh->prepare(
                "INSERT INTO productos(ID_Suscriptor, producto) 
                 VALUES (:ID_SUSCRIPTOR, :PRODUCTO)
            ");

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':PRODUCTO', $RecibeProducto['Producto']);
            $stmt->bindParam(':ID_SUSCRIPTOR', $RecibeProducto['ID_Suscriptor']);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                //se recupera el ID del registro insertado
                return $this->dbh->lastInsertId();
            }
            else{
                return false;
            }
        }
        
        // ************************************************************************************
        // *********************************   UPDATE   ***************************************
        // ************************************************************************************

        //UPDATE de un producto
        public function actualizarProducto($RecibeProducto){
            $stmt = $this->dbh->prepare(
                "UPDATE productos 
                SET producto = :PRODUCTO
                WHERE ID_Producto = :ID_PRODUCTO");

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_PRODUCTO', $RecibeProducto['ID_Producto']);
            $stmt->bindValue(':PRODUCTO', $RecibeProducto['Producto']);

            //Se ejecuta la actualización de los datos en la tabla
            $stmt->execute();
        }

        //UPDATE de una opcion
        public function actualizarOpcion($RecibeProducto){   
            $stmt = $this->dbh->prepare(
                "UPDATE opciones 
                 SET opcion = :OPCION, precioBolivar = :PRECIOBOLIVAR, precioDolar = :PRECIODOLAR, cantidad = :CANTIDAD
                  WHERE ID_Opcion = :ID_OPCION"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':OPCION', $RecibeProducto['Descripcion']);
            $stmt->bindValue(':PRECIOBOLIVAR', $RecibeProducto['PrecioBs']);
            $stmt->bindValue(':PRECIODOLAR', $RecibeProducto['PrecioDolar']);
            $stmt->bindValue(':CANTIDAD', $RecibeProducto['Cantidad']);
            $stmt->bindValue(':ID_OPCION', $RecibeProducto['ID_Opcion']);

            // Se ejecuta la actualización de los datos en la tabla
            $stmt->execute();
        
            //Se envia información de cuantos registros se vieron afectados por la consulta
            // return $stmt->rowCount();
        }

        //UPDATE de la fotografia principal de un producto
        public function actualizarImagenPrincipalProducto($ID_Producto, $nombre_imgProducto, $tipo, $tamanio){
            $stmt = $this->dbh->prepare(
                "UPDATE imagenes 
                SET nombre_img = :FOT_PRODUCTO, tipoArchivo = :TIPO_ARCHIVO, tamanoArchivo = :TAMANIO_ARCHIVO 
                WHERE ID_Producto = :ID_PRODUCTO AND fotoPrincipal = :FOTOPRINCIPAL"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':FOT_PRODUCTO', $nombre_imgProducto);
            $stmt->bindValue(':ID_PRODUCTO', $ID_Producto); 
            $stmt->bindParam(':TIPO_ARCHIVO', $tipo); 
            $stmt->bindParam(':TAMANIO_ARCHIVO', $tamanio); 
            $stmt->bindValue(':FOTOPRINCIPAL', 1);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
        // ************************************************************************************
        // *********************************   DELETE   ***************************************
        // ************************************************************************************
        
        //DELETE de Dependencia Transitiva entre productos y opciones
        public function eliminarOpcion($ID_Opcion){
            $stmt = $this->dbh->prepare(
                "DELETE FROM opciones 
                WHERE ID_Opcion = :ID_OPCION"
                );

            $stmt->bindParam(':ID_OPCION', $ID_Opcion, PDO::PARAM_INT);
            $stmt->execute();          
        } 

        //DELETE de productos de una tienda
        public function eliminarProductoSeccion($ID_Producto){
            $stmt = $this->dbh->prepare(
                "DELETE FROM secciones_productos 
                WHERE ID_Producto = :ID_PRODUCTO"
            );

            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);
            $stmt->execute();          
        }

        //DELETE de productos de una tienda
        public function eliminarProducto($ID_Producto){
            $stmt = $this->dbh->prepare("DELETE FROM productos WHERE ID_Producto = :ID_PRODUCTO");
            $stmt->bindValue(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);
            $stmt->execute();          
        }

        //DELETE de opciones de producto de una tienda
        public function eliminarProductoOpcion($ID_Producto){
            $stmt = $this->dbh->prepare(
                "DELETE FROM productos_opciones 
                WHERE ID_Producto = :ID_PRODUCTO"
            );

            $stmt->bindValue(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);
            $stmt->execute();          
        }
        
        //DELETE de imagen secundaria especifica de un producto
        public function eliminarImagenSecundariaNoticia($ID_Imagen){
            $stmt = $this->dbh->prepare(
                "DELETE FROM imagenes 
                WHERE ID_Imagen = :ID_IMAGEN"
            );

            $stmt->bindParam(':ID_IMAGEN', $ID_Imagen, PDO::PARAM_INT);
            $stmt->execute();          
        }
    }