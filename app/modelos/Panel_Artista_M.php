<?php
    class Panel_Artista_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }
          
    public function consultarObras($ID_Suscriptor){
        $stmt = $this->dbh->prepare(
            "SELECT COUNT(ID_Obra) as cantidadObras
            FROM obra
            WHERE ID_Suscriptor = :ID_SUSCRIPTOR"
        );

        //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
        $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);

        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function consultarImagenPortafolio($ID_Suscriptor){
        $stmt = $this->dbh->prepare(
            "SELECT nombreSuscriptor, apellidoSuscriptor, nombre_imagenPortafolio
            FROM suscriptores
            WHERE ID_Suscriptor = :ID_SUSCRIPTOR"
        );

        //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
        $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);

        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function consultarObrasArtista($ID_Suscriptor){
        $stmt = $this->dbh->prepare(
            "SELECT ID_Obra, nombreObra, imagenObra, precioDolarObra, precioBsObra
            FROM obra
            WHERE ID_Suscriptor = :ID_SUSCRIPTOR"
        );

        //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
        $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);

        if($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
        //SELECT de un producto especificao de una tienda determinada
        public function consultarDescripcionObra($ID_Obra){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Obra, nombreObra, descripcionObra, imagenObra, tecnicaObra, medidaObra, coleccionObra, anioObra, precioBsObra, precioDolarObra
                FROM obra 
                WHERE ID_Obra = :ID_OBRA"
            );

            $stmt->bindParam(':ID_OBRA', $ID_Obra, PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    public function actualizarImagenPortafolio($ID_Suscriptor, $nombre_Portafolio, $tipo_Portafolio, $tamanio_Portafolio, $Telefono){            
        $stmt = $this->dbh->prepare(
            "UPDATE suscriptores 
            SET nombre_imagenPortafolio = :NOMBRE_IMG, tipo_imagenPortafolio = :TIPO_IMG, tamanio_imagenPortafolio = :TAMANIO_IMG, telefonoSuscriptor = :TELEFONO
            WHERE ID_Suscriptor = :ID_SUSCRIPTOR"
        );

        // Se vinculan los valores de las sentencias preparadas
        $stmt->bindValue(':ID_SUSCRIPTOR', $ID_Suscriptor); 
        $stmt->bindValue(':NOMBRE_IMG', $nombre_Portafolio);
        $stmt->bindParam(':TIPO_IMG', $tipo_Portafolio); 
        $stmt->bindParam(':TAMANIO_IMG', $tamanio_Portafolio); 
        $stmt->bindParam(':TELEFONO', $Telefono); 

        // Se ejecuta la actualización de los datos en la tabla
        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    //UPDATE de datos de una obra
    public function actualizarDatosObra($RecibeObra){        
        $stmt = $this->dbh->prepare(
            "UPDATE obra 
            SET nombreObra = :NOMBRE_OBRA, descripcionObra = :DESCRIPCION_OBRA, tecnicaObra = :TECNICA_OBRA, medidaObra =:DIMENSIONES_OBRA, anioObra = :ANIO_OBRA, precioBsObra = :PRECIO_BS_OBRA, precioDolarObra = :PRECIO_DOLAR_OBRA, coleccionObra = :COLECCION_OBRA
            WHERE ID_Obra = :ID_OBRA"
        );

        // Se vinculan los valores de las sentencias preparadas
        $stmt->bindValue(':NOMBRE_OBRA', $RecibeObra['nombreObra']); 
        $stmt->bindValue(':DESCRIPCION_OBRA', $RecibeObra['descripcionObra']);
        $stmt->bindParam(':PRECIO_BS_OBRA', $RecibeObra['precioBsObra']); 
        $stmt->bindParam(':PRECIO_DOLAR_OBRA', $RecibeObra['precioDolarObra']); 
        $stmt->bindParam(':DIMENSIONES_OBRA', $RecibeObra['dimensionesObra']); 
        $stmt->bindParam(':TECNICA_OBRA', $RecibeObra['tecnicaObra']); 
        $stmt->bindParam(':COLECCION_OBRA', $RecibeObra['coleccionObra']); 
        $stmt->bindParam(':ANIO_OBRA', $RecibeObra['anioObra']); 
        $stmt->bindParam(':ID_OBRA', $RecibeObra['ID_Obra']); 

        // Se ejecuta la actualización de los datos en la tabla
        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    //UPDATE de la imagen de una obra
    public function actualizarImagenObra($RecibeObra, $nombre_imagenObra, $tamanio_imagenObra, $tipo_imagenObra){       
        $stmt = $this->dbh->prepare(
            "UPDATE obra 
            SET imagenObra = :NOMBRE_IMG, tamanioObra = :TAMANIO_IMG, tipoObra = :TIPO_IMG
            WHERE ID_Obra = :ID_OBRA"
        );

        // Se vinculan los valores de las sentencias preparadas
        $stmt->bindParam(':ID_OBRA', $RecibeObra['ID_Obra']); 
        $stmt->bindParam(':NOMBRE_IMG', $nombre_imagenObra);
        $stmt->bindParam(':TAMANIO_IMG', $tamanio_imagenObra); 
        $stmt->bindParam(':TIPO_IMG', $tipo_imagenObra);  

        // Se ejecuta la actualización de los datos en la tabla
        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function insertarObra($RecibeObra, $nombre_imagenObra, $tamanio_imagenObra, $tipo_imagenObra){
        $stmt = $this->dbh->prepare(
            "INSERT INTO  obra (ID_Suscriptor, nombreObra, descripcionObra, imagenObra, tamanioObra, tipoObra, tecnicaObra, medidaObra, precioBsObra, precioDolarObra, coleccionObra, anioObra) 
            VALUES (:ID_SUSCRIPTOR, :NOMBRE_OBRA, :DESCRIPCION_OBRA, :IMAGEN_OBRA, :TAMNIO_OBRA, :TIPO_OBRA, :TECNICA_OBRA, :MEDIDA_OBRA, :PRECIOBS_OBRA, :PRECIODOLAR_OBRA, :COLECCION_OBRA, :ANIO_OBRA)"
        );
        
        //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
        $stmt->bindParam(':ID_SUSCRIPTOR', $RecibeObra['id_suscriptor'], PDO::PARAM_INT);
        $stmt->bindParam(':NOMBRE_OBRA', $RecibeObra['nombreObra'], PDO::PARAM_STR);
        $stmt->bindParam(':DESCRIPCION_OBRA', $RecibeObra['descripcionObra'], PDO::PARAM_STR);
        $stmt->bindParam(':IMAGEN_OBRA', $nombre_imagenObra, PDO::PARAM_STR);
        $stmt->bindParam(':TAMNIO_OBRA', $tamanio_imagenObra, PDO::PARAM_STR);
        $stmt->bindParam(':TIPO_OBRA', $tipo_imagenObra, PDO::PARAM_STR);
        $stmt->bindParam(':TECNICA_OBRA', $RecibeObra['tecnicaObra'], PDO::PARAM_STR);
        $stmt->bindParam(':MEDIDA_OBRA', $RecibeObra['dimensionesObra'], PDO::PARAM_STR);
        $stmt->bindParam(':PRECIOBS_OBRA', $RecibeObra['precioBsObra'], PDO::PARAM_STR);
        $stmt->bindParam(':PRECIODOLAR_OBRA', $RecibeObra['precioDolarObra'], PDO::PARAM_STR);
        $stmt->bindParam(':COLECCION_OBRA', $RecibeObra['coleccionObra'], PDO::PARAM_STR);
        $stmt->bindParam(':ANIO_OBRA', $RecibeObra['anioObra'], PDO::PARAM_STR);

        //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
        if($stmt->execute()){
            return TRUE;
        }
        else{
            return FALSE;
        }

    }

    public function suscrptor($ID_Suscriptor){
        $stmt = $this->dbh->prepare(
            "SELECT ID_Suscriptor, nombreSuscriptor, apellidoSuscriptor
            FROM suscriptores
            WHERE ID_Suscriptor = :ID_SUSCRIPTOR"
        );

        //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
        $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);

        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        else{
            return false;
        }
    }
}