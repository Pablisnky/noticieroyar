<?php
    class Noticias_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }
                
// ***********************************************************************************************
// SELECT
// ***********************************************************************************************

		//Muestra el select con las secciones
		public function ConsultarSecciones(){
            $stmt = $this->dbh->query(
                "SELECT ID_Seccion, seccion
                FROM secciones"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);			
		}

        public function consultarNoticiasGenerales(){
            $stmt = $this->dbh->prepare(
                "SELECT noticias.ID_Noticia, titulo, subtitulo, seccion, portada, nombre_imagenNoticia, DATE_FORMAT(fecha, '%d-%m-%Y') AS fechaPublicacion, fuente
                 FROM noticias 
                 INNER JOIN imagenes ON noticias.ID_Noticia=imagenes.ID_Noticia
                 INNER JOIN noticias_secciones ON noticias.ID_Noticia=noticias_secciones.ID_Noticia                
                 INNER JOIN secciones ON noticias_secciones.ID_Seccion=secciones.ID_Seccion
                 WHERE ImagenPrincipal = 1
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

        //SELECT de las imagnes asociados a las noticias 
        public function consultarImagenesNoticiaGenerales(){
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
        
        //SELECT de videos asociados a las noticias 
        public function consultarVideoNoticiaGenerales(){
            $stmt = $this->dbh->query(
                "SELECT ID_Noticia
                FROM videos"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT de los anuncios vigentes asociados a las noticias
        public function consultarAnuncioNoticiaGenerales(){
            $stmt = $this->dbh->query(
                "SELECT anuncios.ID_Anuncio, ID_Noticia
                FROM noticias_anuncios
                INNER JOIN anuncios ON noticias_anuncios.ID_Anuncio=anuncios.ID_Anuncio
                WHERE nombre_imagenPublicidad != 'imagen.png' AND fechaCulmina >= CURDATE() "
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT de cantidad de comentarios de las noticias en portada
        public function consultarCantidadComentarioNoticiaGenerales(){
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
        
        //SELECT de colecciones asociados a las noticias
        public function consultarColeccionNoticiaGenerales(){
            $stmt = $this->dbh->query(
                "SELECT ID_Noticia, colecciones.ID_Coleccion, serie, nombreColeccion, descripcionColeccion, comentarioColeccion
                FROM colecciones
                INNER JOIN noticias_colecciones  ON colecciones.ID_Coleccion=noticias_colecciones.ID_Coleccion
                GROUP BY ID_Noticia"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT de imagenes de colecciones asociados a las noticias
        public function consultarImagenesColeccionNoticiaGenerales(){
            $stmt = $this->dbh->query(
                "SELECT ID_Noticia, colecciones.ID_Coleccion, nombre_imColeccion, ImagenPrincipalColec, ID_ImagenColeccion
                FROM colecciones
                INNER JOIN imagnescolecciones ON colecciones.ID_Coleccion=imagnescolecciones.ID_Coleccion
                INNER JOIN noticias_colecciones  ON colecciones.ID_Coleccion=noticias_colecciones.ID_Coleccion"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarNoticiaDetalle($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT noticias.ID_Noticia, titulo, subtitulo, contenido, DATE_FORMAT(fecha, '%d-%m-%Y') AS fechaPublicacion, fuente 
                 FROM noticias 
                 INNER JOIN noticias_secciones ON noticias.ID_Noticia=noticias_secciones.ID_Noticia                
                 INNER JOIN secciones ON noticias_secciones.ID_Seccion=secciones.ID_Seccion
                 WHERE noticias.ID_Noticia = :ID_NOTICIA"
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

        //SELECT de todas las imagenes de una noticia especifica
        public function consultarImagenesNoticia($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Noticia, ID_Imagen, nombre_imagenNoticia, ImagenPrincipal
                 FROM imagenes 
                 WHERE ID_Noticia = :ID_NOTICIA
                 ORDER BY ImagenPrincipal
                 DESC"
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

        //Se CONSULTA la imagen que se solicito en detalles
        public function consultarDetalleImagen($ID_ImagenMiniatura){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_imagenNoticia
                 FROM imagenes 
                 WHERE ID_Imagen = :ID_IMAGEN"
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
        
          //SELECT del anuncio asociado a la noticia general
        public function consultarAnuncioNoticiaPortada($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT anuncios.ID_Anuncio, ID_Noticia, nombre_imagenPublicidad
                 FROM noticias_anuncios 
                 INNER JOIN anuncios ON noticias_anuncios.ID_Anuncio=anuncios.ID_Anuncio
                 WHERE ID_Noticia = :ID_NOTICIA AND nombre_imagenPublicidad != 'imagen.png' AND fechaCulmina >= CURDATE() "
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT del video de una noticia especifica
        public function consultarVideoNoticia($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Noticia, nombreVideo, youTube
                 FROM videos 
                 WHERE ID_Noticia = :ID_NOTICIA"
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

        // SELECT de comentarios realizado a noticia especifica
        public function consultarComentario($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Comentario, comentarios.ID_Suscriptor, comentario, DATE_FORMAT(fecha, '%d-%m-%Y') AS fechaComentario, DATE_FORMAT(hora, '%h:%i %p') AS horaComentario, nombreSuscriptor, apellidoSuscriptor
                 FROM comentarios
                 INNER JOIN suscriptores ON comentarios.ID_Suscriptor=suscriptores.ID_Suscriptor
                 WHERE ID_Noticia = :ID_NOTICIA
                 ORDER BY fecha DESC, hora DESC
                 "
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

        //SELECT de cantidad de comentarios de la noticia
        public function consultarCantidadComentario($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Noticia, COUNT(ID_Comentario) AS cantidadComentario 
                FROM comentarios 
                WHERE ID_Noticia = :ID_NOTICIA"
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

        public function consultarComentarioSuscriptor($ID_Comentario){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Comentario, nombreSuscriptor, apellidoSuscriptor, DATE_FORMAT(fecha, '%d-%m-%Y') AS fechaComentario, DATE_FORMAT(hora, '%h:%i %p') AS horaComentario
                FROM comentarios 
                INNER JOIN suscriptores ON comentarios.ID_Suscriptor=suscriptores.ID_Suscriptor
                WHERE ID_Comentario = :ID_COMENTARIO"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_COMENTARIO', $ID_Comentario, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }

        }

// ********************************************************************************************************
// INSERTAR
// ********************************************************************************************************
        
        public function insertarVisita($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "INSERT INTO visitas(ID_Noticia, fecha) 
                VALUES (:ID_NOTICIA, CURDATE())"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        public function insertarComentario($ID_Noticia, $ID_Suscriptor, $Comentario){
            $stmt = $this->dbh->prepare(
                "INSERT INTO comentarios (ID_Noticia, ID_Suscriptor, comentario, fecha, hora) 
                VALUES (:ID_NOTICIA, :ID_SUSCRIPTOR, :COMENTARIO, CURDATE(), CURTIME() )"
            
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);
            $stmt->bindParam(':COMENTARIO', $Comentario, PDO::PARAM_STR);

            if($stmt->execute()){
                //se recupera el ID del registro insertado
                return $this->dbh->lastInsertId();
            }
            else{
                return FALSE;
            }
        }

// ********************************************************************************************************
// DELETE
// ********************************************************************************************************
        
		// ELimina comentario
		public function eliminarComentario($ID_Comentario){
            $stmt = $this->dbh->prepare(
                "DELETE FROM comentarios 
                WHERE ID_Comentario = :ID_COMENTARIO"
            );
            $stmt->bindParam(':ID_COMENTARIO', $ID_Comentario, PDO::PARAM_INT);
            $stmt->execute(); 
		}
				
    }