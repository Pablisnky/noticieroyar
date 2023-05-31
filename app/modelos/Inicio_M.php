<?php
    class Inicio_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }
        
// ***********************************************************************************************
// SELECT
// ***********************************************************************************************

        //SELECT de las noticias del dia en curso
        public function consultarNoticiasPortada(){
            $stmt = $this->dbh->prepare(
                "SELECT noticias.ID_Noticia, titulo, subtitulo, portada, nombre_imagenNoticia, municipio, DATE_FORMAT(fecha, '%d-%m-%Y') AS fechaPublicacion, fuente, seccion
                 FROM noticias 
                 INNER JOIN imagenes ON noticias.ID_Noticia=imagenes.ID_Noticia
                 INNER JOIN noticias_secciones ON noticias.ID_Noticia=noticias_secciones.ID_Noticia
                 INNER JOIN secciones ON noticias_secciones.ID_Seccion=secciones.ID_Seccion
                 WHERE fecha BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND CURDATE() AND ImagenPrincipal = 1
                 ORDER BY fecha
                 DESC"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT de los anuncios asociados a las noticias de portada
        public function consultarAnuncioNoticiaPortada(){
            $stmt = $this->dbh->query(
                "SELECT anuncios.ID_Anuncio, ID_Noticia
                FROM noticias_anuncios
                INNER JOIN anuncios ON noticias_anuncios.ID_Anuncio=anuncios.ID_Anuncio
                WHERE nombre_imagenPublicidad != 'imagen.png' "
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT de las imagnes asociados a las noticias de portada
        public function consultarImagenesNoticiaPortada(){
            $stmt = $this->dbh->query(
                "SELECT  ID_Noticia, COUNT(ID_Noticia) AS cantidad 
                FROM imagenes
                GROUP BY ID_Noticia"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT de los videos asociados a la noticia de portada 
        public function consultarVideosNoticiaPortada(){
            $stmt = $this->dbh->query(
                "SELECT ID_Noticia, COUNT(ID_Noticia) AS cantidadVideo
                FROM videos
                GROUP BY ID_Noticia"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT de las imagnes asociados a la noticia de portada especificada
        public function consultarImagenesNoticiaPortadaEspec($ID_noticia){
            $stmt = $this->dbh->prepare(
                "SELECT  ID_Noticia, COUNT(ID_Noticia) AS cantidad 
                FROM imagenes
                WHERE ID_Noticia = :ID_NOTICIA"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_noticia, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT de videos asociados a la noticia de portada especificada
        public function consultarVideoNoticiaPortadaEspec($ID_noticia){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Noticia 
                FROM videos
                WHERE ID_Noticia = :ID_NOTICIA"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_noticia, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT de cantidad de comentarios de las noticias en portada
        public function consultarCantidadComentarioNoticiaPortadaEspec($ID_noticia){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Noticia, COUNT(ID_Comentario) AS cantidadComentario 
                FROM comentarios 
                WHERE ID_Noticia = :ID_NOTICIA"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_noticia, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT de los anuncios asociados a la noticia de portada especificada
        public function consultarAnuncioNoticiaPortadaEspec($ID_noticia){
            $stmt = $this->dbh->prepare(
                "SELECT  ID_Noticia, COUNT(ID_Noticia) AS cantidad 
                FROM noticias_anuncios
                INNER JOIN anuncios ON noticias_anuncios.ID_Anuncio=anuncios.ID_Anuncio
                WHERE ID_Noticia = :ID_NOTICIA AND nombre_imagenPublicidad != 'imagen.png' "
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_noticia, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT de las colecciones asociados a la noticia de portada especificada
        public function consultarColeccionPortadaEspec($ID_noticia){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Noticia, colecciones.ID_Coleccion, nombre_imColeccion, ImagenPrincipalColec, ID_ImagenColeccion, serie, nombreColeccion, descripcionColeccion, comentarioColeccion 
                FROM colecciones
                INNER JOIN imagnescolecciones ON colecciones.ID_Coleccion=imagnescolecciones.ID_Coleccion
                INNER JOIN noticias_colecciones  ON colecciones.ID_Coleccion=noticias_colecciones.ID_Coleccion
                WHERE ID_Noticia = :ID_NOTICIA "
            );
          
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_noticia, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT  de ID_Noticia posterior al introducido como parametro
        public function consultarID_NoticiaPosterior($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Noticia
                FROM noticias 
                WHERE ID_Noticia = (SELECT MIN(ID_Noticia) 
                                    FROM noticias 
                                    WHERE ID_Noticia > :ID_NOTICIA AND fecha BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND CURDATE() );"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }    
        
        //SELECT de ID_Noticia anterior al introducido como parametro
        public function consultarID_NoticiaAnterior($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Noticia 
                FROM noticias 
                WHERE ID_Noticia = (SELECT MAX(ID_Noticia) 
                                    FROM noticias 
                                    WHERE ID_Noticia < :ID_NOTICIA AND fecha BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND CURDATE() );"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }   
        
        //SELECT de la ultima noticia introducido en el dia
        public function consultarID_NoticiaPortadaUltimo(){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Noticia 
                FROM noticias 
                WHERE ID_Noticia = (SELECT MAX(ID_Noticia) 
                                    FROM noticias 
                                    WHERE fecha = CURDATE());"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }  
        
        //SELECT de la primera noticia introducido en el dia
        public function consultarID_NoticiaPortadaPrimera(){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Noticia 
                FROM noticias 
                WHERE ID_Noticia = (SELECT MIN(ID_Noticia) 
                                    FROM noticias 
                                    WHERE fecha BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND CURDATE() );"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }   

        //SELECT noticia de portada especifico
        public function consultarNoticiaPortada($ID_NoticiaConsultar){
            $stmt = $this->dbh->prepare(
                "SELECT noticias.ID_Noticia, titulo, subtitulo, portada, nombre_imagenNoticia, DATE_FORMAT(fecha, '%d-%m-%Y') AS fechaPublicacion, fuente
                 FROM noticias 
                 INNER JOIN imagenes ON noticias.ID_Noticia=imagenes.ID_Noticia
                 WHERE noticias.ID_Noticia = :ID_NOTICIA
                 ORDER BY ID_Noticia
                 DESC"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_NoticiaConsultar, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT de colecciones asociados a las noticias
        // public function consultarColeccionPortada(){
        //     $stmt = $this->dbh->query(
        //         "SELECT ID_Noticia, colecciones.ID_Coleccion, artistaColeccion, contactoArtista, nombre_imColeccion, ImagenPrincipalColec, ID_ImagenColeccion, serie, nombreColeccion, descripcionColeccion, comentarioColeccion
        //         FROM colecciones
        //         INNER JOIN imagnescolecciones ON colecciones.ID_Coleccion=imagnescolecciones.ID_Coleccion
        //         INNER JOIN noticias_colecciones  ON colecciones.ID_Coleccion=noticias_colecciones.ID_Coleccion"
        //     );

        //     if($stmt->execute()){
        //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //     }
        //     else{
        //         return false;
        //     }
        // }
        
        //Se CONSULTA la imagen que se solicito en detalles
        public function consultarDetalleImagen($ID_ImagenMiniatura){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_imColeccion
                 FROM imagnescolecciones 
                 WHERE ID_ImagenColeccion  = :ID_IMAGEN"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_IMAGEN', $ID_ImagenMiniatura, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT de cantidad de comentarios de las noticias en portada
        public function consultarCantidadComentarioPortada(){
            $stmt = $this->dbh->query(
                "SELECT ID_Noticia, COUNT(ID_Comentario) AS cantidadComentario 
                FROM comentarios 
                GROUP BY ID_Noticia"
            );
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarNoticiasSinComentarios(){
            $stmt = $this->dbh->prepare(
                "SELECT noticias.ID_Noticia 
                FROM noticias 
                LEFT JOIN comentarios ON noticias.ID_Noticia=comentarios.ID_Noticia
                WHERE comentario IS NULL
                ORDER BY noticias.ID_Noticia
                DESC"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            // $stmt->bindValue(':COMENTARIO', '', PDO::PARAM_STR);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        public function consultarNoticiaSinVideo(){
            $stmt = $this->dbh->prepare(
                "SELECT noticias.ID_Noticia 
                FROM noticias 
                LEFT JOIN videos ON noticias.ID_Noticia=videos.ID_Noticia
                WHERE nombreVideo IS NULL
                ORDER BY noticias.ID_Noticia
                DESC"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            // $stmt->bindValue(':COMENTARIO', '', PDO::PARAM_STR);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        // CONSULTA los videos de la serie YaracuyEnVideo
        public function consultarYaracuyEnVideo(){
            $stmt = $this->dbh->query(
                "SELECT ID_YaracuyEnVideo, nombreVideo
                FROM yaracuyenvideos"
            );

            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }
    }