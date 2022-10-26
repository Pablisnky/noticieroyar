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
                "SELECT noticias.ID_Noticia, titulo, subtitulo, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha 
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
                "SELECT noticias.ID_Noticia, titulo, subtitulo, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha 
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
        
        // SELECT de efemerides
        public function consultarEfemerides(){
            $stmt = $this->dbh->query(
                "SELECT efemeride.ID_Efemeride, titulo, contenido, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha, nombre_ImagenEfemeride
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
                "SELECT ID_Agenda, nombre_imagenAgenda, DATE_FORMAT(caducidad, '%d-%m-%Y') AS fecha 
                FROM agenda
                WHERE disponibilidad = 'activado'
                ORDER BY caducidad
                DESC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // SELECT de anuncios publicitarios
        public function consultarAnuncio(){
            $stmt = $this->dbh->query(
                "SELECT ID_Anuncio, ID_Noticia, nombre_imagenPublicidad, razonSocial, DATE_FORMAT(fechaInicio, '%d-%m-%Y') AS fechaInicio, DATE_FORMAT(fechaCulmina, '%d-%m-%Y') AS fechaCulmina
                FROM publicidad
                WHERE fechaCulmina > CURDATE()
                GROUP BY razonSocial
                ORDER BY fechaCulmina
                DESC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // SELECT obituario
        public function consultarObituario(){
            $stmt = $this->dbh->query(
                "SELECT ID_Obituario, nombre_difunto, capilla_velacion, cementerio, ciudad, hora_velacion, funeraria, fecha_entierro
                FROM obituario
                WHERE fecha_defuncion = CURDATE()
                ORDER BY fecha_defuncion
                DESC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //SELECT de la noticia general
        public function consultarNoticiaGeneral($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT noticias.ID_Noticia, titulo, subtitulo, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha, nombre_imagenNoticia
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
                "SELECT noticias.ID_Noticia, secciones.ID_Seccion, titulo, subtitulo, contenido, seccion, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha, nombre_imagenNoticia, ID_Imagen, fuente 
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
                "SELECT efemeride.ID_Efemeride, ID_ImagenEfemeride, titulo, contenido, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha, nombre_ImagenEfemeride, imagenPrincipalEfemeride
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
                "SELECT ID_Agenda, nombre_imagenAgenda, DATE_FORMAT(caducidad, '%d-%m-%Y') AS fecha
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

        //SELECT de las secciones del periodico
        public function consultarSecciones(){
            $stmt = $this->dbh->query(
                "SELECT ID_Seccion, seccion
                FROM secciones"
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

        //INSERT de solo el ID_Noticia en la tabla imagenes, cuando no se tiene una imagen para la noticia
        public function InsertarID_ImagenPrincipal($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "INSERT INTO imagenes(ID_Noticia, ImagenPrincipal) 
                VALUES (:ID_NOTICIA, :IMG_PRINCIPAL)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->bindValue(':IMG_PRINCIPAL', 1);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return TRUE;
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

        //Se insertan la imagnees de la efemerides
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
        
        //INSERT de anuncio publicitario
        public function InsertarPublicidad($RazonSocial, $FechaCaducidad, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal){
            $stmt = $this->dbh->prepare(
                "INSERT INTO publicidad(razonSocial, fechaCulmina, nombre_imagenPublicidad, tipo_imagenPublicidad, tamanio_imagenPublicidad) 
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
            $stmt->bindValue(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
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
            $stmt->bindValue(':ID_NOTICIA', $ID_Noticia, PDO::PARAM_INT);
            $stmt->execute(); 
        }
}