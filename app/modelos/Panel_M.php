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
                "SELECT noticias.ID_Noticia, titulo, subtitulo, DATE_FORMAT(fecha, '%d-%m-%Y') AS fechaPublicacion 
                FROM noticias 
                INNER JOIN noticias_secciones ON noticias.ID_Noticia=noticias_secciones.ID_Noticia                
                INNER JOIN secciones ON noticias_secciones.ID_Seccion=secciones.ID_Seccion
                WHERE fecha >= CURDATE()
                GROUP BY titulo
                ORDER BY ID_Noticia
                DESC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //SELECT de las imagenes de las noticias portadas
        public function consultarImagenesNoticiasPortada(){
            $stmt = $this->dbh->query(
                "SELECT noticias.ID_Noticia, nombre_imagenNoticia
                FROM imagenes
                INNER JOIN noticias ON imagenes.ID_Noticia=noticias.ID_Noticia
                WHERE ImagenPrincipal = 1 AND fecha >= CURDATE()"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //SELECT de las secciones de las noticias portadas
        public function consultarSeccionessNoticiasPortada(){
            $stmt = $this->dbh->query(
                "SELECT noticias.ID_Noticia, seccion
                FROM secciones
                INNER JOIN noticias_secciones ON secciones.ID_Seccion=noticias_secciones.ID_Seccion
                INNER JOIN noticias ON noticias_secciones.ID_Noticia=noticias.ID_Noticia
                WHERE fecha >= CURDATE()"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // SELECT de noticias generales
        public function consultarNoticiasGenerales(){
            $stmt = $this->dbh->query(
                "SELECT noticias.ID_Noticia, titulo, subtitulo, DATE_FORMAT(fecha, '%d-%m-%Y') AS fechaPublicacion
                FROM noticias
                INNER JOIN noticias_secciones ON noticias.ID_Noticia=noticias_secciones.ID_Noticia                
                INNER JOIN secciones ON noticias_secciones.ID_Seccion=secciones.ID_Seccion
                WHERE fecha < CURDATE()
                GROUP BY titulo
                ORDER BY fecha
                DESC"
            );

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // SELECT de noticias generales
        public function consultarNoticiasGeneralesPaginacion($Limit, $Desde){
            $stmt = $this->dbh->query(
                "SELECT noticias.ID_Noticia, titulo, subtitulo, DATE_FORMAT(fecha, '%d-%m-%Y') AS fechaPublicacion
                FROM noticias
                INNER JOIN noticias_secciones ON noticias.ID_Noticia=noticias_secciones.ID_Noticia                
                INNER JOIN secciones ON noticias_secciones.ID_Seccion=secciones.ID_Seccion
                WHERE fecha < CURDATE()
                GROUP BY titulo
                ORDER BY fecha
                DESC
                LIMIT $Desde, $Limit"
                 //se muestran $limit registros desde el registro Nro $desde
            );

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function consultarCantidadNoticiasGenerales(){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Noticia, COUNT(noticias.ID_Noticia) AS cantidad 
                 FROM noticias 
                 WHERE fecha < CURDATE()"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "Hubo un fallo";
            }
        }
        
        //SELECT de las imagenes de las noticias generales
        public function consultarImagenesNoticiasGenerales(){
            $stmt = $this->dbh->query(
                "SELECT noticias.ID_Noticia, nombre_imagenNoticia
                FROM imagenes
                INNER JOIN noticias ON imagenes.ID_Noticia=noticias.ID_Noticia
                WHERE ImagenPrincipal = 1 AND fecha < CURDATE()"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //SELECT de las secciones de las noticias generales
        public function consultarSeccionessNoticiasGenerales(){
            $stmt = $this->dbh->query(
                "SELECT noticias.ID_Noticia, seccion
                FROM secciones
                INNER JOIN noticias_secciones ON secciones.ID_Seccion=noticias_secciones.ID_Seccion
                INNER JOIN noticias ON noticias_secciones.ID_Noticia=noticias.ID_Noticia
                WHERE fecha < CURDATE()"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // SELECT de colecciones en noticias generales
        // public function consultarColeccionNoticiasGenerales(){
        //     $stmt = $this->dbh->query(
        //         "SELECT noticias.ID_Noticia, nombreColeccion 
        //         FROM noticias_colecciones 
        //         INNER JOIN colecciones ON noticias_colecciones.ID_Coleccion=colecciones.ID_Coleccion 
        //         INNER JOIN noticias ON noticias_colecciones.ID_Noticia=noticias.ID_Noticia 
        //         WHERE fecha < CURDATE() "
        //     );
        //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
        // }
        
        // SELECT de anuncios en noticias generales
        public function consultarAnunciosNoticiasGenerales(){
            $stmt = $this->dbh->query(
                "SELECT noticias.ID_Noticia, razonSocial 
                FROM noticias_anuncios 
                INNER JOIN anuncios ON noticias_anuncios.ID_Anuncio=anuncios.ID_Anuncio 
                INNER JOIN noticias ON noticias_anuncios.ID_Noticia=noticias.ID_Noticia 
                WHERE fecha < CURDATE() "
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // SELECT de efemerides
        public function consultarEfemerides(){
            $stmt = $this->dbh->query(
                "SELECT efemeride.ID_Efemeride, titulo, contenido, DATE_FORMAT(fecha, '%d-%m-%Y') AS fechaPublicacion, nombre_ImagenEfemeride
                FROM efemeride
                INNER JOIN imagenesefemerides ON efemeride.ID_Efemeride=imagenesefemerides.ID_Efemeride
                ORDER BY fecha
                DESC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // SELECT agenda
        public function consultarAgenda(){
            $stmt = $this->dbh->query(
                "SELECT ID_Agenda, nombre_imagenAgenda, DATE_FORMAT(caducidad, '%d-%m-%Y') AS fechaPublicacion 
                FROM agenda
                WHERE disponibilidad = 'activado'
                ORDER BY ID_Agenda
                DESC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // SELECT de todos los anuncios publicitarios incluyendo caducados
        public function consultarAnuncioTodos(){
            $stmt = $this->dbh->query(
                "SELECT ID_Anuncio, nombre_imagenPublicidad, razonSocial, DATE_FORMAT(fechaInicio, '%d-%m-%Y') AS fechaInicioPublicacion, DATE_FORMAT(fechaCulmina, '%d-%m-%Y') AS fechaCulminaPublicacion
                FROM anuncios
                ORDER BY fechaCulmina
                DESC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // SELECT de anuncios publicitarios disponibles para publicar
        public function consultarAnuncio(){
            $stmt = $this->dbh->query(
                "SELECT ID_Anuncio, nombre_imagenPublicidad, razonSocial, DATE_FORMAT(fechaInicio, '%d-%m-%Y') AS fechaInicioPublicacion, DATE_FORMAT(fechaCulmina, '%d-%m-%Y') AS fechaCulminaPublicacion
                FROM anuncios
                WHERE fechaCulmina >= CURDATE()
                ORDER BY fechaCulmina
                DESC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
                
        // SELECT de anuncio publicitario existente en una noticia
        public function consultarAnuncioEspecifico($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT anuncios.ID_Anuncio, nombre_imagenPublicidad
                FROM noticias_anuncios
                INNER JOIN anuncios ON noticias_anuncios.ID_Anuncio=anuncios.ID_Anuncio
                WHERE ID_Noticia = :ID_NOTICIA"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
        }
        
        // SELECT de video especifico
        public function consultarVideoEspecifico($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Noticia, ID_Video, nombreVideo 
                FROM videos
                WHERE ID_Noticia = :ID_NOTICIA"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
        }

        // SELECT de colecciones mostradas en el panel de periodista
        public function consultarColeccionPanel(){
            $stmt = $this->dbh->query(
                "SELECT colecciones.ID_Coleccion , nombreColeccion, nombre_imColeccion
                FROM colecciones
                INNER JOIN imagnescolecciones ON colecciones.ID_Coleccion=imagnescolecciones.ID_Coleccion
                WHERE ImagenPrincipalColec = 1
                ORDER BY colecciones.ID_Coleccion
                DESC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // SELECT obituario
        public function consultarObituario(){
            $stmt = $this->dbh->query(
                "SELECT ID_imagObituario, nombre_difunto, nombreImagObituario
                FROM  imagenesobiturario 
                ORDER BY ID_imagObituario 
                DESC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //SELECT de la noticia general
        public function consultarNoticiaGeneral($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT noticias.ID_Noticia, titulo, subtitulo, DATE_FORMAT(fecha, '%d-%m-%Y') AS fechaPublicacion, nombre_imagenNoticia
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

        //SELECT de la noticia a actualizar
        public function consultarNoticiaActualizar($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT noticias.ID_Noticia, secciones.ID_Seccion, titulo, subtitulo, contenido, seccion, DATE_FORMAT(fecha, '%d-%m-%Y') AS fechaPublicacion, nombre_imagenNoticia, ID_Imagen, fuente 
                 FROM noticias 
                 INNER JOIN imagenes ON noticias.ID_Noticia=imagenes.ID_Noticia
                INNER JOIN noticias_secciones ON noticias.ID_Noticia=noticias_secciones.ID_Noticia                
                INNER JOIN secciones ON noticias_secciones.ID_Seccion=secciones.ID_Seccion
                 WHERE noticias.ID_Noticia = :ID_NOTICIA AND ImagenPrincipal = 1"
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

        //SELECT de las imagenes de noticia a actualizar
        public function consultarImagenesNoticiaActualizar($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Noticia, ID_Imagen, nombre_imagenNoticia
                 FROM imagenes 
                 WHERE ID_Noticia = :ID_NOTICIA AND ImagenPrincipal = 0"
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

        //SELECT de la efemeride a actualizar
        public function consultarEfemerideActualizar($ID_Efemeride){
            $stmt = $this->dbh->prepare(
                "SELECT efemeride.ID_Efemeride, ID_ImagenEfemeride, titulo, contenido, DATE_FORMAT(fecha, '%d-%m-%Y') AS fechaPublicacion, nombre_ImagenEfemeride, imagenPrincipalEfemeride
                 FROM efemeride
                 INNER JOIN imagenesefemerides ON efemeride.ID_Efemeride=imagenesefemerides.ID_Efemeride
                 WHERE efemeride.ID_Efemeride = :ID_EFEMERIDE"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_EFEMERIDE', $ID_Efemeride, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT de la agenda a actualizar
        public function consultarAgendaActualizar($ID_Agenda){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Agenda, nombre_imagenAgenda, DATE_FORMAT(caducidad, '%d-%m-%Y') AS fechaPublicacion
                 FROM agenda 
                 WHERE ID_Agenda = :ID_AGENDA"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_AGENDA', $ID_Agenda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT del anuncio a actualizar
        public function consultarAnuncioActualizar($ID_Anuncio ){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Anuncio, nombre_imagenPublicidad, DATE_FORMAT(fechaCulmina, '%d-%m-%Y') AS finfechaPublicacion
                 FROM anuncios
                 WHERE ID_Anuncio = :ID_ANUNCIO"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_ANUNCIO', $ID_Anuncio , PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        //SELECT de la coleccion a actualizar
        public function consultarColeccionActualizar($ID_Coleccion){
            $stmt = $this->dbh->prepare(
                "SELECT colecciones.ID_Coleccion, serie, nombreColeccion, descripcionColeccion, comentarioColeccion, nombre_imColeccion
                 FROM colecciones 
                 INNER JOIN  imagnescolecciones ON colecciones.ID_Coleccion=imagnescolecciones.ID_Coleccion
                 WHERE colecciones.ID_Coleccion = :ID_COLECCION"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_COLECCION', $ID_Coleccion, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        // SELECT de las imagenes secundarias de una coleccion
        public function consultarImagenesColeccionActualizar($ID_Coleccion){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_imColeccion
                FROM imagnescolecciones 
                WHERE ID_Coleccion = :ID_COLECCION AND ImagenPrincipalColec = :IMG_PRINCIPAL "
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_COLECCION', $ID_Coleccion, PDO::PARAM_INT);
            $stmt->bindValue(':IMG_PRINCIPAL', 0, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT de los artistas de la galeria de arte
        public function consultarArtistaActualizar($ID_Artista){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Artista, nombreArtista, apellidoArtista, catgeoriaArtista, municipioArtista, imagenArtista
                FROM artistas  
                WHERE ID_Artista = :ID_ARTISTA"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_ARTISTA', $ID_Artista , PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }

        }

        //SELECT de obras de un artista especifico
        public function consultarObrasArtistaActualizar($ID_Artista){
            $stmt = $this->dbh->prepare(
                "SELECT nombreObra, imagenObra
                FROM obra 
                WHERE ID_Artista = :ID_ARTISTA"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_ARTISTA', $ID_Artista, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }

        }

        //SELECT de las secciones del periodico
        public function consultarSecciones(){
            $stmt = $this->dbh->query(
                "SELECT ID_Seccion, seccion
                FROM secciones"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        //SELECT de 
        public function consultarSeriesColeccion(){
            $stmt = $this->dbh->query(
                "SELECT nombreSerie
                FROM seriecoleccion "
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        //SELECT de la forma de arte de un artista
        public function consultarFormaArte(){
            $stmt = $this->dbh->query(
                "SELECT formaArte
                FROM formaarte"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //SELECT del ID_Seccion del nombre de una seccion
        public function Consultar_ID_Seccion($Seccion){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Seccion
                FROM secciones
                WHERE seccion = :SECCION"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':SECCION', $Seccion, PDO::PARAM_STR);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT de los ID_Seccion de varias secciones
        // $SeccionesVarias contiene un string con los ID_Seccion separados por comas
        public function ConsultarVarios_ID_Seccion($SeccionesVarias){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Seccion
                FROM secciones
                WHERE seccion IN ($SeccionesVarias)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            // $stmt->bindParam(':SECCION', $Seccion, PDO::PARAM_STR);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT de las fuentes de redaccion disponibles
        public function consultarFuentes(){
            $stmt = $this->dbh->query(
                "SELECT ID_Fuente, fuente
                FROM fuentes
                ORDER BY fuente"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function consultaVisitasNoticia(){
            $stmt = $this->dbh->query(
                "SELECT ID_Noticia, COUNT(ID_Noticia) AS 'visitas'
                FROM visitas
                GROUP BY ID_Noticia"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }

        }
        
        //SELECT de colecciones adjudicadas a cada noticia
        // public function consultarColeccion(){
        //     $stmt = $this->dbh->query(
        //         "SELECT ID_Noticia, nombreColeccion
        //         FROM colecciones
        //         INNER JOIN noticias_colecciones ON colecciones.ID_Coleccion=noticias_colecciones.ID_Coleccion"
        //     );
        //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
        // }

        //SELECT de anuncios publicitarios asociados a cada noticia
        public function consultarPublicidad(){
            $stmt = $this->dbh->query(
                "SELECT ID_Noticia, razonSocial
                FROM anuncios
                INNER JOIN noticias_anuncios ON anuncios.ID_Anuncio=noticias_anuncios.ID_Anuncio"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);            
        }

        //CONSULTA si existe un anuncio para una noticia especifica
        public function consultar_DT_noticia_anuncio($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Anuncio
                FROM noticias_anuncios 
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
        
        //CONSULTA si existe una coleccion para una noticia especifica
        public function consultar_DT_noticia_coleccion($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Coleccion
                FROM noticias_colecciones 
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

        // public function consultarColeccionEspecifico($ID_Noticia){
        //     $stmt = $this->dbh->prepare(
        //         "SELECT colecciones.ID_Coleccion, nombre_imColeccion
        //         FROM  noticias_colecciones
        //         INNER JOIN colecciones ON noticias_colecciones.ID_Coleccion=colecciones.ID_Coleccion
        //         INNER JOIN  imagnescolecciones  ON colecciones.ID_Coleccion=imagnescolecciones.ID_Coleccion
        //         WHERE ID_Noticia = :ID_NOTICIA"
        //     );

        //     //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
        //     $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);

        //     if($stmt->execute()){
        //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //     }
        //     else{
        //         return false;
        //     }
        // }

        // CONSULTA los artistas registrados en la galeria
        public function consultaArtistasPanel(){
            $stmt = $this->dbh->query(
                "SELECT ID_Artista, nombreArtista, apellidoArtista, catgeoriaArtista, municipioArtista, imagenArtista
                FROM artistas"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 

        }

// // ********************************************************************************************************
// // INSERT 
// // ********************************************************************************************************

        // INSERT de noticia portada
        public function InsertarNoticia($Titulo, $SubTitulo, $Contenido, $Fecha, $Fuente){
            $stmt = $this->dbh->prepare(
                "INSERT INTO noticias(titulo, subtitulo, contenido, fecha, fuente, portada) 
                VALUES (:TITULO, :SUBTITULO, :CONTENIDO, STR_TO_DATE( '$Fecha', '%d-%m-%Y' ), :FUENTE, :PORTADA)"
            ); 

            // STR_TO_DATE( '$Fecha', '%d-%m-%Y' ) se recibe la fecha en formato USA y se cambia a formato EUR

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':TITULO', $Titulo, PDO::PARAM_STR);
            $stmt->bindParam(':SUBTITULO', $SubTitulo, PDO::PARAM_STR);
            $stmt->bindParam(':CONTENIDO', $Contenido, PDO::PARAM_STR);
            $stmt->bindParam(':FUENTE', $Fuente, PDO::PARAM_STR);
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
        
        // INSERT de imagen de noticia 
        public function InsertarImagenNoticia($ID_Noticia, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal){
            $stmt = $this->dbh->prepare(
                "INSERT INTO imagenes(ID_Noticia, nombre_imagenNoticia, tamanio_imagenNoticia, tipo_imagenNoticia, ImagenPrincipal) 
                VALUES (:ID_NOTICIA, :NOMBRE_IMAGEN, :TAMANIO_IMAGEN, :TIPO_IMAGEN, :IMG_PRINCIPAL)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->bindParam(':NOMBRE_IMAGEN', $Nombre_imagenPrincipal, PDO::PARAM_STR);
            $stmt->bindParam(':TAMANIO_IMAGEN', $Tipo_imagenPrincipal, PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_IMAGEN', $Tamanio_imagenPrincipal, PDO::PARAM_STR);
            $stmt->bindValue(':IMG_PRINCIPAL', 1);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        
        // INSERT de imagenes secundarias de noticia 
        public function insertarFotografiasSecun($ID_Noticia, $archivonombre, $tipo, $tamanio){
            $stmt = $this->dbh->prepare(
                "INSERT INTO imagenes(ID_Noticia, nombre_imagenNoticia, tamanio_imagenNoticia, tipo_imagenNoticia)VALUES (:ID_NOTICIA, :NOMBRE_IMG, :TIPO_ARCHIVO, :TAMANIO_ARCHIVO)"
            );
            
            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->bindParam(':NOMBRE_IMG', $archivonombre, PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_ARCHIVO', $tipo, PDO::PARAM_STR);
            $stmt->bindParam(':TAMANIO_ARCHIVO', $tamanio, PDO::PARAM_STR);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        }
        
        
        // INSERT de video de noticia 
        public function InsertarVideoNoticia($ID_Noticia, $Nombre_video, $Tamanio_video, $Tipo_video){
            $stmt = $this->dbh->prepare(
                "INSERT INTO videos(ID_Noticia, nombreVideo, tamanioVideo, tipoVideo, youTube) 
                VALUES (:ID_NOTICIA, :NOMBRE_VIDEO, :TAMANIO_VIDEO, :TIPO_VIDEO, :YOUTUBE)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->bindParam(':NOMBRE_VIDEO', $Nombre_video, PDO::PARAM_STR);
            $stmt->bindParam(':TAMANIO_VIDEO', $Tamanio_video,PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_VIDEO',  $Tipo_video, PDO::PARAM_STR);
            $stmt->bindValue(':YOUTUBE', 0);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        // INSERT de dependencia transitiva entre noticias y secciones
        public function Insertar_DT_noticia_seccion($ID_Noticia, $ID_Seccion){
            $stmt = $this->dbh->prepare(
                "INSERT INTO noticias_secciones(ID_Noticia, ID_Seccion)VALUES (:ID_NOTICIA, :ID_SECCION)"
            );
            
            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->bindParam(':ID_SECCION', $ID_Seccion, PDO::PARAM_INT);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();

        }
        
        // INSERT de dependencia transitiva entre noticias y anuncios
        public function Insertar_DT_noticia_anuncio($ID_Noticia, $ID_Anuncio){
            $stmt = $this->dbh->prepare(
                "INSERT INTO noticias_anuncios(ID_Noticia, ID_Anuncio)VALUES (:ID_NOTICIA, :ID_ANUNCIO)"
            );
            
            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->bindParam(':ID_ANUNCIO', $ID_Anuncio, PDO::PARAM_INT);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        }

        // INSERT de dependencia transitiva entre noticias y colecciones
        public function insertar_DT_ColeccionSeleccionada($ID_Noticia, $ID_Coleccion){
            $stmt = $this->dbh->prepare(
                "INSERT INTO noticias_colecciones(ID_Noticia, ID_Coleccion)VALUES (:ID_NOTICIA, :ID_COLECCION)"
            );
            
            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->bindParam(':ID_COLECCION', $ID_Coleccion, PDO::PARAM_INT);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        }

        //INSERT de solo el ID_Noticia en la tabla imagenes, cuando no se tiene una imagen para la noticia
        public function InsertarID_ImagenPrincipal($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "INSERT INTO imagenes(ID_Noticia, ImagenPrincipal) 
                VALUES (:ID_NOTICIA, :IMG_PRINCIPAL)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->bindValue(':IMG_PRINCIPAL', 1);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada)
            $stmt->execute();
        }

        //INSERT de solo el ID_Noticia en la tabla imagenes, cuando no se tiene una imagen para la noticia
        public function InsertarID_Anunio(){
            $stmt = $this->dbh->prepare(
                "INSERT INTO anuncios(nombre_imagenPublicidad) 
                VALUES (:NOMBRE_ANUNCIO)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindValue(':NOMBRE_ANUNCIO', 'imagen.png', PDO::PARAM_STR);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                //se recupera el ID del registro insertado
                return $this->dbh->lastInsertId();
            }
            else{
                return FALSE;
            }
        }
        
        //INSERT de efemeride
        public function InsertarEfemeride($Titulo, $Contenido, $Fecha){
            $stmt = $this->dbh->prepare(
                "INSERT INTO efemeride(titulo, contenido, fecha) 
                VALUES (:TITULO, :CONTENIDO, STR_TO_DATE( '$Fecha', '%d-%m-%Y' ))"
            );

            // STR_TO_DATE( '$Fecha', '%d-%m-%Y' ) se recibe la fecha en formato USA y se cambia a formato EUR
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':TITULO', $Titulo, PDO::PARAM_STR);
            $stmt->bindParam(':CONTENIDO', $Contenido, PDO::PARAM_STR);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                //se recupera el ID del registro insertado
                return $this->dbh->lastInsertId();
            }
            else{
                return FALSE;
            }
        }

        //Se inserta la imagen principal de la efemeride
        public function InsertarImagenPrincipalEfemeride($ID_Efemeride, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal){
            $stmt = $this->dbh->prepare(
                "INSERT INTO  imagenesefemerides(ID_Efemeride, nombre_ImagenEfemeride, tipo_ImagenEfemeride, tamanio_ImagenEfemeride, imagenPrincipalEfemeride) 
                VALUES (:ID_EFEMERIDE, :NOMBRE_IMG_EFEMERIDE, :TIPO_IMG_EFEMERIDE, :TAMANIO_IMG_EFEMERIDE, :IMG_EFEMERIDE_PRINCIPAL)"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_EFEMERIDE', $ID_Efemeride, PDO::PARAM_INT);
            $stmt->bindParam(':NOMBRE_IMG_EFEMERIDE', $Nombre_imagenPrincipal, PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_IMG_EFEMERIDE', $Tipo_imagenPrincipal, PDO::PARAM_STR);
            $stmt->bindParam(':TAMANIO_IMG_EFEMERIDE', $Tamanio_imagenPrincipal, PDO::PARAM_STR);
            $stmt->bindValue(':IMG_EFEMERIDE_PRINCIPAL', 1, PDO::PARAM_INT);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        
        //Se inserta la imagen principal de la coleccion
        public function InsertarImagenPrincipalColeccion($ID_Coleccion, $Nombre_imagenPrincipalColeccion, $Tipo_imagenPrincipalColeccion, $Tamanio_imagenPrincipalColeccion){
            $stmt = $this->dbh->prepare(
                "INSERT INTO  imagnescolecciones (ID_Coleccion, nombre_imColeccion, tamanio_imColeccion, tipo_imColeccion, ImagenPrincipalColec) 
                VALUES (:ID_COLECCION, :NOMBRE_IMG_COLECCION, :TIPO_IMG_COLECCION, :TAMANIO_IMG_COLECCION, :IMG_COLECCION_PRINCIPAL)"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_COLECCION', $ID_Coleccion, PDO::PARAM_INT);
            $stmt->bindParam(':NOMBRE_IMG_COLECCION', $Nombre_imagenPrincipalColeccion, PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_IMG_COLECCION', $Tipo_imagenPrincipalColeccion, PDO::PARAM_STR);
            $stmt->bindParam(':TAMANIO_IMG_COLECCION', $Tamanio_imagenPrincipalColeccion, PDO::PARAM_STR);
            $stmt->bindValue(':IMG_COLECCION_PRINCIPAL', 1, PDO::PARAM_INT);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        
        //INSERT imagenes secundarias de coleccion
        public function insertarFotografiasColeccionSecun($ID_Coleccion, $Nombre_imagenSecundaria, $tipo_imagenSecundaria, $tamanio_imagenSecundaria){
            $stmt = $this->dbh->prepare(
                "INSERT INTO imagnescolecciones (ID_Coleccion, nombre_imColeccion, tamanio_imColeccion, tipo_imColeccion, ImagenPrincipalColec) 
                VALUES (:ID_COLECCION, :NOMBRE_IMG_SEC_COLECCION, :TIPO_IMG_SEC_COLECCION, :TAMANIO_IMG_SEC_COLECCION, :IMG_SEC_COLECCION_PRINCIPAL)"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_COLECCION', $ID_Coleccion, PDO::PARAM_INT);
            $stmt->bindParam(':NOMBRE_IMG_SEC_COLECCION', $Nombre_imagenSecundaria, PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_IMG_SEC_COLECCION', $tipo_imagenSecundaria, PDO::PARAM_STR);
            $stmt->bindParam(':TAMANIO_IMG_SEC_COLECCION', $tamanio_imagenSecundaria, PDO::PARAM_STR);
            $stmt->bindValue(':IMG_SEC_COLECCION_PRINCIPAL', 0, PDO::PARAM_INT);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        //INSERT de evento en agenda
        public function InsertarAgenda($FechaCaducidad, $Nombre_imagenAgenda, $Tipo_imagenAgenda, $Tamanio_imagenAgenda){
            $stmt = $this->dbh->prepare(
                "INSERT INTO agenda(nombre_imagenAgenda, typo_imagenAgenda, tamanio_imagenAgenda, disponibilidad, caducidad) 
                VALUES (:NOMBRE_IMAGEN, :TIPO_IMAGEN, :TAMANIO_IMAGEN, :DISPONIBILIDAD, STR_TO_DATE( '$FechaCaducidad', '%d-%m-%Y'))"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':NOMBRE_IMAGEN', $Nombre_imagenAgenda, PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_IMAGEN', $Tipo_imagenAgenda, PDO::PARAM_STR);
            $stmt->bindParam(':TAMANIO_IMAGEN', $Tamanio_imagenAgenda, PDO::PARAM_STR);
            $stmt->bindValue(':DISPONIBILIDAD', 'activado');

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        //INSERT de obituario en agenda
        public function InsertarObituario($NombreDIfunto, $Nombre_imagenObituario, $Tipo_imagenObituario, $Tamanio_imagenObituario){
            $stmt = $this->dbh->prepare(
                "INSERT INTO imagenesobiturario(nombre_difunto, nombreImagObituario, TypoImagObituario, TamanioImagObituario) 
                VALUES (:DIFUNTO, :NOMBRE_IMAGEN, :TIPO_IMAGEN, :TAMANIO_IMAGEN)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':DIFUNTO', $NombreDIfunto, PDO::PARAM_STR);
            $stmt->bindParam(':NOMBRE_IMAGEN', $Nombre_imagenObituario, PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_IMAGEN', $Tipo_imagenObituario, PDO::PARAM_STR);
            $stmt->bindParam(':TAMANIO_IMAGEN', $Tamanio_imagenObituario, PDO::PARAM_STR);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        
        //INSERT de anuncio publicitario
        public function InsertarAnuncio($RazonSocial, $FechaCaducidad, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal){
            $stmt = $this->dbh->prepare(
                "INSERT INTO anuncios(razonSocial, fechaCulmina, nombre_imagenPublicidad, tipo_imagenPublicidad, tamanio_imagenPublicidad) 
                VALUES (:RAZON_SOCIAL, STR_TO_DATE('$FechaCaducidad', '%d-%m-%Y'), :NOMBRE_IMAGEN, :TIPO_IMAGEN, :TAMANIO_IMAGEN)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':RAZON_SOCIAL', $RazonSocial, PDO::PARAM_STR);
            $stmt->bindParam(':NOMBRE_IMAGEN', $Nombre_imagenPrincipal, PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_IMAGEN', $Tipo_imagenAgenda, PDO::PARAM_STR);
            $stmt->bindParam(':TAMANIO_IMAGEN', $Tamanio_imagenAgenda, PDO::PARAM_STR);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        public function InsertarFuente($Coinsidencias){
            $stmt = $this->dbh->prepare(
                "INSERT INTO fuentes(fuente) 
                VALUES (:FUENTE)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':FUENTE', $Coinsidencias, PDO::PARAM_STR);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        //INSERT de anuncio seleccionado, se usa cuando se actualiza una noticia que no tenia anuncio
        public function insertar_DT_AnuncioSeleccionado($ID_Noticia, $ID_Anuncio){
            $stmt = $this->dbh->prepare(
                "INSERT INTO noticias_anuncios (ID_Anuncio, ID_Noticia) 
                VALUES (:ID_ANUNCIO, :ID_NOTICIA)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->bindParam(':ID_ANUNCIO', $ID_Anuncio, PDO::PARAM_INT);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        
        //INSERT de coleccion
        public function InsertarColeccion($Coleccion, $Serie, $Descripcion){
            $stmt = $this->dbh->prepare(
                "INSERT INTO colecciones (nombreColeccion, serie, descripcionColeccion) 
                VALUES (:NOMBRE_COLEC, :SERIE, :DESCRIPCION_COLEC)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':NOMBRE_COLEC', $Coleccion, PDO::PARAM_STR);
            $stmt->bindParam(':SERIE', $Coleccion, PDO::PARAM_STR);
            $stmt->bindParam(':DESCRIPCION_COLEC', $Descripcion, PDO::PARAM_STR);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return $this->dbh->lastInsertId();
            }
            else{
                return FALSE;
            }
        }

        //INSERT de artista
        public function InsertarArtista($NombreArtista, $ApellidoArtista, $CategoriaArtista, $MunicipioArtista, $Nombre_imagenPerfil, $Tamanio_imagenPerfil, $Tipo_imagenPerfil){
            $stmt = $this->dbh->prepare(
                "INSERT INTO artistas (nombreArtista, apellidoArtista, catgeoriaArtista, municipioArtista, imagenArtista, tamanioArtista, tipoArtista) 
                VALUES (:NOMBRE_ARTISTA, :APELLIDO_ARTISTA, :CATEGORIA_ARTISTA, :MUNICIPIO_ARTISTA, :NOMBRE_IMAGEN_PERFIL, :TAMANIO_IMAGEN_PERFIL, :TIPO_IMAGEN_PERFIL)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':NOMBRE_ARTISTA', $NombreArtista, PDO::PARAM_STR);
            $stmt->bindParam(':APELLIDO_ARTISTA', $ApellidoArtista, PDO::PARAM_STR);
            $stmt->bindParam(':CATEGORIA_ARTISTA', $CategoriaArtista, PDO::PARAM_STR);
            $stmt->bindParam(':MUNICIPIO_ARTISTA', $MunicipioArtista, PDO::PARAM_STR);
            $stmt->bindParam(':NOMBRE_IMAGEN_PERFIL', $Nombre_imagenPerfil, PDO::PARAM_STR);
            $stmt->bindParam(':TAMANIO_IMAGEN_PERFIL', $Tamanio_imagenPerfil, PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_IMAGEN_PERFIL', $Tipo_imagenPerfil, PDO::PARAM_STR);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return $this->dbh->lastInsertId();
            }
            else{
                return FALSE;
            }
        }

        //INSERT de obras
        public function insertarObra($ID_Artista, $Nombre_imageneObra, $Tamanio_imageneObra, $Tipo_imageneObra){
            $stmt = $this->dbh->prepare(
                "INSERT INTO obra (ID_Artista, imagenObra, tamanioObra, tipoObra) 
                VALUES (:ID_ARTISTA, :IMAGEN_OBRA, :TAMANIO_OBRA, :TIPO_OBRA)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_ARTISTA', $ID_Artista, PDO::PARAM_STR);
            $stmt->bindParam(':IMAGEN_OBRA', $Nombre_imageneObra, PDO::PARAM_STR);
            $stmt->bindParam(':TAMANIO_OBRA', $Tamanio_imageneObra, PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_OBRA', $Tipo_imageneObra, PDO::PARAM_STR);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return $this->dbh->lastInsertId();
            }
            else{
                return FALSE;
            }

        }
// // ********************************************************************************************************
// // UPDATE
// // ********************************************************************************************************
        
        // UODATE de datos de noticia 
        public function ActualizarNoticia($ID_Noticia, $Titulo, $SubTitulo, $Contenido, $Fecha, $Fuente){            
            $stmt = $this->dbh->prepare(
                "UPDATE noticias 
                SET titulo = :TITULO, subtitulo = :SUBTITULO, contenido = :CONTENIDO, fecha = STR_TO_DATE('$Fecha', '%d-%m-%Y'), fuente = :FUENTE
                WHERE ID_Noticia = :ID_NOTICIA"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->bindParam(':TITULO', $Titulo, PDO::PARAM_STR);
            $stmt->bindParam(':SUBTITULO', $SubTitulo, PDO::PARAM_STR);
            $stmt->bindParam(':CONTENIDO', $Contenido, PDO::PARAM_STR);
            $stmt->bindParam(':FUENTE', $Fuente, PDO::PARAM_STR);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        
        // INSERT de dependencia transitiva entre noticias y secciones
        public function Actualizar_DT_noticia_seccion($ID_Noticia, $ID_Seccion){
            $stmt = $this->dbh->prepare(
                "UPDATE noticias_secciones
                 SET ID_Seccion =  :ID_SECCION
                 WHERE ID_Noticia = :ID_NOTICIA"
            );
            
            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->bindParam(':ID_SECCION', $ID_Seccion, PDO::PARAM_INT);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        }

        // UODATE de datos de efemeride 
        public function ActualizarEfemeride($ID_Efemeride, $Titulo, $Contenido, $Fecha){            
            $stmt = $this->dbh->prepare(
                "UPDATE efemeride 
                SET titulo = :TITULO, contenido = :CONTENIDO, fecha = STR_TO_DATE('$Fecha', '%d-%m-%Y')
                WHERE ID_Efemeride = :ID_EFEMERIDE"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_EFEMERIDE', $ID_Efemeride, PDO::PARAM_INT);
            $stmt->bindParam(':TITULO', $Titulo, PDO::PARAM_STR);
            $stmt->bindParam(':CONTENIDO', $Contenido, PDO::PARAM_STR);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        
        // UODATE de datos de eventos en agenda 
        public function ActualizarAgenda($ID_Agenda, $Fecha){            
            $stmt = $this->dbh->prepare(
                "UPDATE agenda 
                SET caducidad = STR_TO_DATE('$Fecha', '%d-%m-%Y')
                WHERE ID_Agenda = :ID_AGENDA"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_AGENDA', $ID_Agenda, PDO::PARAM_INT);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        // UODATE de imagen de noticia
        public function ActualizarImagenNoticia($ID_imagen, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal){            
            $stmt = $this->dbh->prepare(
                "UPDATE imagenes 
                SET nombre_imagenNoticia = :NOMBRE_IMGNOTICIA, tamanio_imagenNoticia = :TAMANIO_IMGNOTICIA, tipo_imagenNoticia = :TIPO_IMGNOTICIA 
                WHERE ID_imagen = :ID_IMAGEN"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_IMAGEN', $ID_imagen, PDO::PARAM_INT);
            $stmt->bindParam(':NOMBRE_IMGNOTICIA', $Nombre_imagenPrincipal, PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_IMGNOTICIA', $Tipo_imagenPrincipal, PDO::PARAM_STR);
            $stmt->bindParam(':TAMANIO_IMGNOTICIA', $Tamanio_imagenPrincipal, PDO::PARAM_STR);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        // UODATE de imagen de anuncio publicitario
        public function ActualizarAnuncioPublicitario($ID_Anuncio, $Nombre_imagen, $Tipo_imagen, $Tamanio_imagen){            
            $stmt = $this->dbh->prepare(
                "UPDATE anuncios 
                SET nombre_imagenPublicidad = :NOMBRE_IMG_ANUNCIO, tamanio_imagenPublicidad = :TAMANIO_IMG_ANUNCIO, tipo_imagenPublicidad = :TIPO_IMG_ANUNCIO 
                WHERE ID_Anuncio = :ID_ANUNCIO"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_ANUNCIO', $ID_Anuncio, PDO::PARAM_INT);
            $stmt->bindParam(':NOMBRE_IMG_ANUNCIO', $Nombre_imagenAnuncio, PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_IMG_ANUNCIO', $Tipo_imagenAnuncio, PDO::PARAM_STR);
            $stmt->bindParam(':TAMANIO_IMG_ANUNCIO', $Tamanio_imagenAnuncio, PDO::PARAM_STR);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        // UODATE de datos de anuncio publicitario
        public function ActualizarDatosAnuncio($ID_Anuncio, $Fecha){         
            $stmt = $this->dbh->prepare(
                "UPDATE anuncios 
                SET fechaCulmina = STR_TO_DATE('$Fecha', '%d-%m-%Y')
                WHERE ID_Anuncio = :ID_ANUNCIO"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_ANUNCIO', $ID_Anuncio, PDO::PARAM_INT);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        // UODATE de imagen de anuncio publicitario
        public function ActualizarVideo($ID_Noticia, $Nombre_video, $Tamanio_video, $Tipo_video){            
            $stmt = $this->dbh->prepare(
                "UPDATE videos 
                SET nombreVideo = :NOMBRE_VIDEO, tamanioVideo = :TAMANIO_VIDEO, tipoVideo = :TIPO_VIDEO 
                WHERE ID_Noticia = :ID_NOTICIA"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->bindParam(':NOMBRE_VIDEO', $Nombre_video, PDO::PARAM_STR);
            $stmt->bindParam(':TAMANIO_VIDEO', $Tamanio_video, PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_VIDEO', $Tipo_video, PDO::PARAM_STR);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        // public function actualizarImagenesSecundarias($ID_imagen, $Nombre_imagenSecundaria, $tipo_imagenSecundaria, $tamanio_imagenSecundaria){
        //     $stmt = $this->dbh->prepare(
        //         "UPDATE imagenes 
        //         SET nombre_imagenNoticia = :NOMBRE_IMGNOTICIA, tamanio_imagenNoticia = :TAMANIO_IMGNOTICIA, tipo_imagenNoticia = :TIPO_IMGNOTICIA 
        //         WHERE ID_imagen = :ID_IMAGEN"
        //     );

        //     // Se vinculan los valores de las sentencias preparadas
        //     $stmt->bindParam(':ID_IMAGEN', $ID_imagen, PDO::PARAM_INT);
        //     $stmt->bindParam(':NOMBRE_IMGNOTICIA', $Nombre_imagenPrincipal, PDO::PARAM_STR);
        //     $stmt->bindParam(':TIPO_IMGNOTICIA', $Tipo_imagenPrincipal, PDO::PARAM_STR);
        //     $stmt->bindParam(':TAMANIO_IMGNOTICIA', $Tamanio_imagenPrincipal, PDO::PARAM_STR);
            
        //     //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
        //     if($stmt->execute()){
        //         // se recupera el ID del registro insertado
        //         return TRUE;
        //     }
        //     else{
        //         return FALSE;
        //     }
        // }

        // UODATE de imagen de EFEMERIDE
        public function ActualizarImagenEfemeride($ID_Efemeride, $Nombre_imagen, $Tipo_imagen, $Tamanio_imagen){            
            $stmt = $this->dbh->prepare(
                "UPDATE efemeride 
                SET Nombre_imagen = :NOMBRE_IMG, Tamanio_imagen = :TAMANIO_IMG, Tipo_imagen = :TIPO_IMG 
                WHERE ID_Efemeride = :ID_EFEMERIDE"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_EFEMERIDE', $ID_Efemeride, PDO::PARAM_INT);
            $stmt->bindParam(':NOMBRE_IMG', $Nombre_imagen, PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_IMG', $Tipo_imagen, PDO::PARAM_STR);
            $stmt->bindParam(':TAMANIO_IMG', $Tamanio_imagen, PDO::PARAM_STR);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        // UODATE de imagen de agenda
        public function ActualizarImagenAgenda($ID_Agenda, $Nombre_imagenAgenda, $Tipo_imagenAgenda, $Tamanio_imagenAgenda){            
            $stmt = $this->dbh->prepare(
                "UPDATE agenda 
                SET nombre_imagenAgenda = :NOMBRE_IMG, typo_imagenAgenda = :TIPO_IMG, tamanio_imagenAgenda = :TAMANIO_IMG 
                WHERE ID_Agenda = :ID_AGENDA"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_AGENDA', $ID_Agenda, PDO::PARAM_INT);
            $stmt->bindParam(':NOMBRE_IMG', $Nombre_imagenAgenda, PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_IMG', $Tipo_imagenAgenda, PDO::PARAM_STR);
            $stmt->bindParam(':TAMANIO_IMG', $Tamanio_imagenAgenda, PDO::PARAM_STR);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        
        // UODATE de anuncio publicitario correspondiente a una noticia
        public function actualizar_DT_noticia_anuncio($ID_Noticia, $ID_Anuncio){            
            $stmt = $this->dbh->prepare(
                "UPDATE noticias_anuncios  
                SET ID_Anuncio = :ID_ANUNCIO 
                WHERE ID_Noticia = :ID_NOTICIA"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->bindParam(':ID_ANUNCIO', $ID_Anuncio, PDO::PARAM_INT);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        
        // UODATE de coleccion correspondiente a una noticia
        public function actualizar_DT_noticia_coleccion($ID_Noticia, $ID_Coleccion){            
            $stmt = $this->dbh->prepare(
                "UPDATE noticias_colecciones  
                SET ID_Coleccion = :ID_COLECCION 
                WHERE ID_Noticia = :ID_NOTICIA"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->bindParam(':ID_COLECCION', $ID_Coleccion, PDO::PARAM_INT);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        // UPDATE de coleccion
        public function ActualizarColeccion($ID_Coleccion, $Coleccion, $Serie, $Descripcion){           
            $stmt = $this->dbh->prepare(
                "UPDATE colecciones  
                SET nombreColeccion = :NOMBRE_COLECCION, serie = :SERIE_COLECCION, descripcionColeccion = :DESCRIPCION_COLECCION
                WHERE ID_Coleccion = :ID_COLECCION"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':NOMBRE_COLECCION', $Coleccion, PDO::PARAM_STR);
            $stmt->bindParam(':SERIE_COLECCION', $Serie, PDO::PARAM_STR);
            $stmt->bindParam(':DESCRIPCION_COLECCION', $Descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':ID_COLECCION', $ID_Coleccion, PDO::PARAM_INT);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }

        }
        
        // UODATE de imagen de coleccion
        public function ActualizarImagenColeccion($ID_Coleccion, $Nombre_imagenPrincipalColeccion, $Tipo_imagenPrincipalColeccion, $Tamanio_imagenPrincipalColeccion){            
            $stmt = $this->dbh->prepare(
                "UPDATE imagnescolecciones  
                SET nombre_imColeccion = :NOMBRE_IMG, tipo_imColeccion = :TIPO_IMG, tamanio_imColeccion = :TAMANIO_IMG 
                WHERE ID_Coleccion = :ID_COLECCION AND ImagenPrincipalColec = :IMG_RINCIPAL"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_COLECCION', $ID_Coleccion, PDO::PARAM_INT);
            $stmt->bindParam(':NOMBRE_IMG', $Nombre_imagenPrincipalColeccion, PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_IMG', $Tipo_imagenPrincipalColeccion, PDO::PARAM_STR);
            $stmt->bindParam(':TAMANIO_IMG', $Tamanio_imagenPrincipalColeccion, PDO::PARAM_STR);
            $stmt->bindValue(':IMG_RINCIPAL', 1, PDO::PARAM_INT);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        
        // UPDATE de perfil de artista
        public function ActualizarArtista($ID_Artista, $NombreArtista, $ApellidoArtista, $CategoriaArtista, $MunicipioArtista, $Nombre_imagenPerfil, $Tamanio_imagenPerfil, $Tipo_imagenPerfil){           
            $stmt = $this->dbh->prepare(
                "UPDATE artistas  
                SET nombreArtista = :NOMBRE_ARTISTA, apellidoArtista = :APELLIDO_ARTISTA, catgeoriaArtista = :CATEGORIA_ARTISTA, municipioArtista = :MUNICIPIO_ARTISTA, imagenArtista = :IMAGEN_ARTISTA, tamanioArtista = :TAMAO_ARTISTA, tipoArtista = :TIPO_ARTISTA
                WHERE ID_Artista = :ID_ARTISTA"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':NOMBRE_ARTISTA', $NombreArtista, PDO::PARAM_STR);
            $stmt->bindParam(':APELLIDO_ARTISTA', $ApellidoArtista, PDO::PARAM_STR);
            $stmt->bindParam(':CATEGORIA_ARTISTA', $CategoriaArtista, PDO::PARAM_STR);
            $stmt->bindParam(':MUNICIPIO_ARTISTA', $MunicipioArtista, PDO::PARAM_STR);
            $stmt->bindParam(':IMAGEN_ARTISTA', $Nombre_imagenPerfil, PDO::PARAM_STR);
            $stmt->bindParam(':TAMAO_ARTISTA', $Tamanio_imagenPerfil, PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_ARTISTA', $Tipo_imagenPerfil, PDO::PARAM_STR);
            $stmt->bindParam(':ID_ARTISTA', $ID_Artista, PDO::PARAM_INT);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

// // ********************************************************************************************************
// // DELETE
// // ********************************************************************************************************

        // Elimina noticia
        public function eliminarNoticia($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "DELETE FROM noticias 
                WHERE ID_Noticia = :ID_NOTICIA"
            );
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->execute(); 
        }
        
        // Elimina imagnes de noticia
        public function eliminarImagenesNoticia($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "DELETE FROM imagenes 
                WHERE ID_Noticia = :ID_NOTICIA"
            );
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->execute(); 
        }
        
        // Elimina video de noticia
        public function eliminarVideoNoticia($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "DELETE FROM videos  
                WHERE ID_Noticia = :ID_NOTICIA"
            );
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->execute(); 
        }
        
        // Elimina efemeride
        public function eliminarEfemeride($ID_Efemeride){
            $stmt = $this->dbh->prepare(
                "DELETE FROM efemeride 
                WHERE ID_Efemeride = :ID_EFEMERIDE"
            );
            $stmt->bindParam(':ID_EFEMERIDE', $ID_Efemeride, PDO::PARAM_INT);
            $stmt->execute(); 
        }
        
        // Elimina imagnes de efemerides
        public function eliminarImagenesEfemerides($ID_Efemeride){
            $stmt = $this->dbh->prepare(
                "DELETE FROM imagenesefemerides 
                WHERE ID_Efemeride = :ID_EFEMERIDE"
            );
            $stmt->bindParam(':ID_EFEMERIDE', $ID_Efemeride, PDO::PARAM_INT);
            $stmt->execute(); 
        }
        
        // Elimina efemeride
        public function eliminarAgenda($ID_Agenda){
            $stmt = $this->dbh->prepare(
                "DELETE FROM agenda 
                WHERE ID_Agenda = :ID_AGENDA"
            );
            $stmt->bindParam(':ID_AGENDA', $ID_Agenda, PDO::PARAM_INT);
            $stmt->execute(); 
        }

        // Elimina las dependencias transitivas de una noticia especifica
        public function eliminar_DT_noticia_seccion($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "DELETE FROM noticias_secciones 
                WHERE ID_Noticia = :ID_NOTICIA"
            );
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->execute(); 
        }

        // Elimina un anuncio publicitario
        public function eliminarAnuncio($ID_Anuncio){
            $stmt = $this->dbh->prepare(
                "DELETE FROM anuncios 
                WHERE ID_Anuncio = :ID_ANUNCIO"
            );
        
            $stmt->bindParam(':ID_ANUNCIO', $ID_Anuncio, PDO::PARAM_INT);
            $stmt->execute(); 
        }

        public function eliminarColeccion($ID_Coleccion){
            $stmt = $this->dbh->prepare(
                "DELETE FROM colecciones 
                WHERE ID_Coleccion = :ID_COLECCION"
            );
        
            $stmt->bindParam(':ID_COLECCION', $ID_Coleccion, PDO::PARAM_INT);
            $stmt->execute(); 
        }
        
        public function eliminarObituario($ID_Obituario){
            $stmt = $this->dbh->prepare(
                "DELETE FROM imagenesobiturario  
                WHERE ID_imagObituario  = :ID_OBITUARIO"
            );
        
            $stmt->bindParam(':ID_OBITUARIO', $ID_Obituario, PDO::PARAM_INT);
            $stmt->execute(); 
        }
        
        public function eliminarArtista($ID_Artista){
            $stmt = $this->dbh->prepare(
                "DELETE FROM artistas  
                WHERE ID_Artista = :ID_ARTISTA"
            );
        
            $stmt->bindParam(':ID_ARTISTA', $ID_Artista , PDO::PARAM_INT);
            $stmt->execute(); 
        }

        public function eliminarImagenSecundariaNoticia($ID_Imagen){
            $stmt = $this->dbh->prepare(
                "DELETE FROM imagenes  
                WHERE ID_Imagen = :ID_IMAGEN"
            );
        
            $stmt->bindParam(':ID_IMAGEN', $ID_Imagen , PDO::PARAM_INT);
            $stmt->execute(); 
        }
}