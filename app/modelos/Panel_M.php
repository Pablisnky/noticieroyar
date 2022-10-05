<?php
    class Panel_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }

// ********************************************************************************************************
// SELECT
// ********************************************************************************************************

        //SELECT de las noticias de portada
        public function consultarNoticiasPortada(){
            $stmt = $this->dbh->query(
                "SELECT ID_Noticia, titulo, subtitulo, seccion, fecha 
                FROM noticias 
                INNER JOIN secciones ON noticias.ID_Seccion=secciones.ID_Seccion
                WHERE portada = 1 AND fecha >= CURDATE()
                ORDER BY ID_Noticia
                DESC"
            );
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //SELECT de las imagenes de las noticias portadas
        public function consultarImagenesNoticiasPortada(){
            $stmt = $this->dbh->query(
                "SELECT ID_Noticia, nombre_imagenNoticia
                FROM imagenes"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //SELECT de la noticia a actualizar
        public function consultarNoticiaActualizar($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT noticias.ID_Noticia, secciones.ID_Seccion, titulo, subtitulo, seccion, fecha, nombre_imagenNoticia
                 FROM noticias 
                 INNER JOIN imagenes ON noticias.ID_Noticia=imagenes.ID_Noticia
                 INNER JOIN secciones ON noticias.ID_Seccion=secciones.ID_Seccion
                 WHERE noticias.ID_Noticia = :ID_NOTICIA"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT de la noticia general
        public function consultarNoticiaGeneral($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT noticias.ID_Noticia, titulo, subtitulo, fecha, nombre_imagenNoticia
                 FROM noticias 
                 INNER JOIN imagenes ON noticias.ID_Noticia=imagenes.ID_Noticia
                 WHERE noticias.ID_Noticia = :ID_NOTICIA"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        // SELECT de noticias generales
        public function consultarNoticiasGenerales(){
            $stmt = $this->dbh->query(
                "SELECT ID_Noticia, titulo, subtitulo, fecha 
                FROM noticias
                WHERE fecha < CURDATE()
                ORDER BY fecha
                DESC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //SELECT de las secciones del periodico
        public function consultarSecciones(){
            $stmt = $this->dbh->query(
                "SELECT ID_Seccion, seccion
                FROM secciones"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


// ********************************************************************************************************
// INSERT 
// ********************************************************************************************************

        // INSERT de noticia portada
        public function InsertarNoticia($Titulo, $SubTitulo, $ID_Seccion, $Fecha, ){
            $stmt = $this->dbh->prepare(
                "INSERT INTO noticias(titulo, subtitulo, ID_Seccion, fecha, portada) 
                VALUES (:TITULO, :SUBTITULO, :ID_SECCION, :FECHA, :PORTADA)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':TITULO', $Titulo);
            $stmt->bindParam(':SUBTITULO', $SubTitulo);
            $stmt->bindParam(':ID_SECCION', $ID_Seccion);
            $stmt->bindParam(':FECHA', $Fecha);
            $stmt->bindValue(':PORTADA', 1);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                //se recupera el ID del registro insertado
                return $this->dbh->lastInsertId();
            }
            else{
                return FALSE;
            }
        }
        
        // INSERT de imagenes de noticia prinicpal
        public function InsertarImagenesNoticiaPortada($ID_Noticia, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal){
            $stmt = $this->dbh->prepare(
                "INSERT INTO imagenes(ID_Noticia, nombre_imagenNoticia, tamanio_imagenNoticia, tipo_imagenNoticia) 
                VALUES (:ID_NOTICIA, :NOMBRE_IMAGEN, :TAMANIO_IMAGEN, :TIPO_IMAGEN)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia);
            $stmt->bindParam(':NOMBRE_IMAGEN', $Nombre_imagenPrincipal);
            $stmt->bindParam(':TAMANIO_IMAGEN', $Tipo_imagenPrincipal);
            $stmt->bindParam(':TIPO_IMAGEN', $Tamanio_imagenPrincipal);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        //INSERT de solo el ID_Noticia en la tabla imagenes, cuando no se tiene una imagen para la noticia
        public function InsertarID_Imagenes($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "INSERT INTO imagenes(ID_Noticia) 
                VALUES (:ID_NOTICIA)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return TRUE;
            }
            else{
                return FALSE;
            }

        }

// ********************************************************************************************************
// UPDATE
// ********************************************************************************************************
        
        // UODATE de datos de noticia 
        public function ActualizarNoticia($ID_Noticia, $ID_Seccion, $Titulo, $SubTitulo,  $Fecha){            
            $stmt = $this->dbh->prepare(
                "UPDATE noticias 
                SET ID_Seccion = :ID_SECCION, titulo = :TITULO, subtitulo = :SUBTITULO, fecha = :FECHA
                WHERE ID_Noticia = :ID_NOTICIA"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia);
            $stmt->bindParam(':ID_SECCION', $ID_Seccion);
            $stmt->bindParam(':TITULO', $Titulo);
            $stmt->bindParam(':SUBTITULO', $SubTitulo);
            $stmt->bindParam(':FECHA', $Fecha);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        
        // UODATE de datos de noticia de portada
        public function ActualizarImagenNoticiaPortada($ID_Noticia, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal){            
            $stmt = $this->dbh->prepare(
                "UPDATE imagenes 
                SET nombre_imagenNoticia = :NOMBRE_IMGNOTICIA, tamanio_imagenNoticia = :TAMANIO_IMGNOTICIA, tipo_imagenNoticia = :TIPO_IMGNOTICIA 
                WHERE ID_Noticia = :ID_NOTICIA"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia);
            $stmt->bindParam(':NOMBRE_IMGNOTICIA', $Nombre_imagenPrincipal);
            $stmt->bindParam(':TIPO_IMGNOTICIA', $Tipo_imagenPrincipal);
            $stmt->bindParam(':TAMANIO_IMGNOTICIA', $Tamanio_imagenPrincipal);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

// ********************************************************************************************************
// DELETE
// ********************************************************************************************************

        // Elimina noticia
        public function eliminarNoticia($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "DELETE FROM noticias 
                WHERE ID_Noticia = :ID_NOTICIA"
            );
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->execute(); 
        }
        
        // Elimina imagnes de noticia principal
        public function eliminarImagenesNoticia($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "DELETE FROM imagenes 
                WHERE ID_Noticia = :ID_NOTICIA"
            );
            $stmt->bindValue(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->execute(); 
        }






































        //SELECT de las ultimas obras
        public function consultar_ultimas_obras(){
            $stmt = $this->dbh->query(
                "SELECT ID_UltimaObra, nombre_UltimaObra, tecnica_UltimaObra, tamanio_UltimaObra, nombre_ImgUltimaObra 
                FROM ultimasobras 
                ORDER BY ID_UltimaObra 
                DESC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //SELECT de las pinturas
        public function consultarpinturas(){
            $stmt = $this->dbh->query(
                "SELECT ID_Pintura, nombre_pintura, medida_pintura, tecnica_pintura, nombre_ImgPintura, nombre_coleccion
                FROM pinturas 
                INNER JOIN colecciones ON pinturas.ID_COleccion=colecciones.ID_COleccion
                ORDER BY ID_Pintura 
                DESC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //SELECT de las miniaturas de pinturas
        public function consultarminiaturas(){
            $stmt = $this->dbh->query(
                "SELECT ID_ImagenMiniatura, ID_Pintura, nombre_ImagenMiniatura FROM imagenesminiaturas"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
// ********************************************************************************************************
// INSERT
// ********************************************************************************************************

        //INSERT de colecciones
        public function insertarColecciones($Colecciones){ 
            for($i = 0; $i<count($Colecciones); $i++){
                $stmt = $this->dbh->prepare(
                    "INSERT INTO colecciones(nombre_coleccion, fecha_creacion) 
                    VALUES (:NOMBRE, CURDATE())"
                );

                //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
                $stmt->bindParam(':NOMBRE', $Colecciones[$i]);

                //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
                $stmt->execute();
            }
        }   

        // INSERT de ponchos
        public function insertarPoncho($Nombre_Poncho, $nombre_ImgPoncho, $tipo_ImgPoncho, $tamanio_ImgPoncho){
            $stmt = $this->dbh->prepare(
                "INSERT INTO ponchos(nombrePoncho, nombre_ImgPoncho, tamanio_ImgPoncho, tipo_ImgPoncho, fecha) 
                VALUES (:NOMBRE, :NOMBRE_IMG, :TAMANIO_IMG, :TIPO_IMG, CURDATE())"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':NOMBRE', $Nombre_Poncho);
            $stmt->bindParam(':NOMBRE_IMG', $nombre_ImgPoncho);
            $stmt->bindParam(':TAMANIO_IMG', $tamanio_ImgPoncho);
            $stmt->bindParam(':TIPO_IMG', $tipo_ImgPoncho);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                //se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        // INSERT de ultimas obras
        public function insertarUltimasObras($Nombre_UltimasObras, $Medidas_UltimasObras, $Tecnica_UltimasObras, $Nombre_ImgUltimasObras, $Tipo_ImgUltimasObras, $Tamanio_ImgUltimasObras){
            $stmt = $this->dbh->prepare(
                "INSERT INTO ultimasobras(nombre_UltimaObra, tamanio_UltimaObra, tecnica_UltimaObra, nombre_ImgUltimaObra, tamanio_ImgUltimaObra, tipo_ImgUltimaObra, fecha) 
                VALUES (:NOMBRE_ULTIMAOBRA, :MEDIDAS_ULTIMAOBRA, :TECNICA_ULTIMAOBRA, :NOMBRE_IMG_ULTIMAOBRA, :TAMANIO_IMG_ULTIMAOBRA, :TIPO_IMG_ULTIMAOBRA, CURDATE())"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':NOMBRE_ULTIMAOBRA', $Nombre_UltimasObras);
            $stmt->bindParam(':MEDIDAS_ULTIMAOBRA', $Medidas_UltimasObras);
            $stmt->bindParam(':TECNICA_ULTIMAOBRA', $Tecnica_UltimasObras);
            $stmt->bindParam(':NOMBRE_IMG_ULTIMAOBRA', $Nombre_ImgUltimasObras);
            $stmt->bindParam(':TAMANIO_IMG_ULTIMAOBRA', $Tipo_ImgUltimasObras);
            $stmt->bindParam(':TIPO_IMG_ULTIMAOBRA', $Tamanio_ImgUltimasObras);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                //se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        //INSERT de pinturas
        public function insertarPintura($ID_Coleccion, $Nombre_Pintura, $Medidas_Pintura, $Tecnica_Pintura, $Nombre_ImgPintura, $tipo_ImgPintura, $tamanio_ImgPintura){
            $stmt = $this->dbh->prepare(
                "INSERT INTO pinturas(ID_Coleccion, nombre_pintura, medida_pintura, tecnica_pintura, nombre_ImgPintura, tamanio_ImgPintura, tipo_ImgPintura, fecha) 
                VALUES (:ID_COLECCION,:NOMBRE, :MEDIDAS, :TECNICA, :NOMBRE_IMG, :TAMANIO_IMG, :TIPO_IMG, CURDATE())"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_COLECCION', $ID_Coleccion);
            $stmt->bindParam(':NOMBRE', $Nombre_Pintura);
            $stmt->bindParam(':MEDIDAS', $Medidas_Pintura);
            $stmt->bindParam(':TECNICA', $Tecnica_Pintura);
            $stmt->bindParam(':NOMBRE_IMG', $Nombre_ImgPintura);
            $stmt->bindParam(':TIPO_IMG', $tipo_ImgPintura);
            $stmt->bindParam(':TAMANIO_IMG', $tamanio_ImgPintura);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                //se recupera el ID del registro insertado
                return $this->dbh->lastInsertId();
            }
            else{
                return die("No pudo insertarse la pintura");
            }
        }
    
        public function insertarMniaturas($ID_Pintura, $nombre_imgMiniaturas, $tipo_imgMiniaturas, $tamanio_imgMiniaturas){
            $stmt = $this->dbh->prepare(
                "INSERT INTO imagenesminiaturas(ID_Pintura, nombre_ImagenMiniatura, tipo_Miniatura, tamanio_Miniatura) 
                VALUES (:ID_PINTURA, :NOMBRE_IMG, :TIPO_IMG, :TAMANIO_IMG)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_PINTURA', $ID_Pintura);
            $stmt->bindParam(':NOMBRE_IMG', $nombre_imgMiniaturas);
            $stmt->bindParam(':TIPO_IMG', $tipo_imgMiniaturas);
            $stmt->bindParam(':TAMANIO_IMG', $tamanio_imgMiniaturas);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

// ********************************************************************************************************
// UPDATE
// ********************************************************************************************************
        
        // UODATE de datos de poncho
        public function actualizar_Poncho($ID_Poncho){            
            $stmt = $this->dbh->prepare(
                "UPDATE poncho 
                SET nombrePoncho = :NOMBRE_PONCHO 
                WHERE ID_Poncho = :ID_PONCHO"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_PONCHO', $ID_Poncho);
            $stmt->bindParam(':NOMBRE_PONCHO', $ID_Poncho);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        // UPDATE de fotografia de perfil
        public function actualizarFotografia($nombre_Fotografia, $tipo_Fotografia, $tamanio_Fotografia){
            $stmt = $this->dbh->prepare(
                "UPDATE artista 
                SET nombre_Fotografia = :NOMBRE_FOTO, tipo_Fotografia = :TIPO_FOTO, tamanio_Fotografia = :TAMANIO_FOTO"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':NOMBRE_FOTO', $nombre_Fotografia);
            $stmt->bindParam(':TIPO_FOTO', $tipo_Fotografia);
            $stmt->bindParam(':TAMANIO_FOTO', $tamanio_Fotografia);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
    


// ********************************************************************************************************
// DELETE
// ********************************************************************************************************       
        //DELETE de coleccion 
        public function eliminarColeccion($ID_Coleccion){
            $stmt = $this->dbh->prepare(
                "DELETE FROM colecciones 
                WHERE ID_Coleccion = :ID_COLECCION"
            );
            $stmt->bindValue(':ID_COLECCION', $ID_Coleccion, PDO::PARAM_INT);
            $stmt->execute();          
        }

        //DELETE de ponchos 
        public function eliminar_Poncho($ID_Poncho){
            $stmt = $this->dbh->prepare(
                "DELETE FROM ponchos 
                WHERE ID_Poncho = :ID_PONCHO"
            );
            $stmt->bindValue(':ID_PONCHO', $ID_Poncho, PDO::PARAM_INT);
            $stmt->execute();    
        }

        //DELETE de pinturas
        public function eliminar_Pintura($ID_Pintura){
            $stmt = $this->dbh->prepare(
                "DELETE FROM pinturas 
                WHERE ID_PINTURA = :ID_PINTURA"
            );
            $stmt->bindValue(':ID_PINTURA', $ID_Pintura, PDO::PARAM_INT);
            $stmt->execute();  
        }

        //DELETE de miniaturas de pinturas
        public function eliminar_Miniaturas($ID_Pintura){
            $stmt = $this->dbh->prepare(
                "DELETE FROM imagenesminiaturas  
                WHERE ID_PINTURA = :ID_PINTURA"
            );
            $stmt->bindValue(':ID_PINTURA', $ID_Pintura, PDO::PARAM_INT);
            $stmt->execute();  
        }

        //DELETE de ultima obra
        public function eliminar_ID_UltimaObra($ID_UltimaObra){
            $stmt = $this->dbh->prepare(
                "DELETE FROM ultimasobras  
                WHERE ID_UltimaObra = :ID_UltimaObra"
            );
            $stmt->bindValue(':ID_UltimaObra', $ID_UltimaObra, PDO::PARAM_INT);
            $stmt->execute();  
        }
}