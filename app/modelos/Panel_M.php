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
                "SELECT ID_Noticia, titulo, subtitulo, seccion, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha 
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
        
        // SELECT de noticias generales
        public function consultarNoticiasGenerales(){
            $stmt = $this->dbh->query(
                "SELECT ID_Noticia, titulo, subtitulo, seccion, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha 
                FROM noticias
                INNER JOIN secciones ON noticias.ID_Seccion=secciones.ID_Seccion
                WHERE fecha < CURDATE()
                ORDER BY fecha
                DESC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // SELECT de efemerides
        public function consultarEfemerides(){
            $stmt = $this->dbh->query(
                "SELECT ID_Efemeride, titulo, contenido, Nombre_imagen, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha 
                FROM efemeride
                ORDER BY fecha
                DESC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // SELECT agenda
        public function consultarAgenda(){
            $stmt = $this->dbh->query(
                "SELECT ID_Agenda, nombre_imagenAgenda
                FROM agenda
                WHERE disponibilidad = 'activado'
                ORDER BY ID_Agenda
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
                "SELECT noticias.ID_Noticia, secciones.ID_Seccion, titulo, subtitulo, contenido, seccion, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha, nombre_imagenNoticia
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

        //SELECT de la efemeride a actualizar
        public function consultarEfemerideActualizar($ID_Efemeride){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Efemeride, titulo, contenido, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha, Nombre_imagen
                 FROM efemeride 
                 WHERE ID_Efemeride = :ID_EFEMERIDE"
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

        //SELECT de las secciones del periodico
        public function consultarSecciones(){
            $stmt = $this->dbh->query(
                "SELECT ID_Seccion, seccion
                FROM secciones"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


// // ********************************************************************************************************
// // INSERT 
// // ********************************************************************************************************

        // INSERT de noticia portada
        public function InsertarNoticia($Titulo, $SubTitulo, $Contenido, $ID_Seccion, $Fecha, $ID_Periodista){
            $stmt = $this->dbh->prepare(
                "INSERT INTO noticias(titulo, subtitulo, contenido, ID_Seccion, fecha, ID_Periodista, portada) 
                VALUES (:TITULO, :SUBTITULO, :CONTENIDO, :ID_SECCION, STR_TO_DATE( '$Fecha', '%d-%m-%Y' ), :ID_PERIODISTA, :PORTADA)"
            ); 

            // STR_TO_DATE( '$Fecha', '%d-%m-%Y' ) se recibe la fecha en formato USA y se cambia a formato EUR

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':TITULO', $Titulo);
            $stmt->bindParam(':SUBTITULO', $SubTitulo);
            $stmt->bindParam(':CONTENIDO', $Contenido);
            $stmt->bindParam(':ID_SECCION', $ID_Seccion);
            // $stmt->bindParam(':FECHA', $FechaFormateada); 
            $stmt->bindParam(':ID_PERIODISTA', $ID_Periodista);
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
        
        // INSERT de imagenes de noticia 
        public function InsertarImagenesNoticia($ID_Noticia, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal){
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
        
        //INSERT de efemeride
        public function InsertarEfemeride($Titulo, $Contenido, $Fecha, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal){
            $stmt = $this->dbh->prepare(
                "INSERT INTO efemeride(titulo, contenido, fecha, Nombre_imagen, Tipo_imagen, Tamanio_imagen) 
                VALUES (:TITULO, :CONTENIDO, STR_TO_DATE( '$Fecha', '%d-%m-%Y' ), :NOMBRE_IMAGEN, :TIPO_IMAGEN, :TAMANIO_IMAGEN)"
            );

            // STR_TO_DATE( '$Fecha', '%d-%m-%Y' ) se recibe la fecha en formato USA y se cambia a formato EUR
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':TITULO', $Titulo);
            $stmt->bindParam(':CONTENIDO', $Contenido);
            // $stmt->bindParam(':FECHA', $Fecha);
            $stmt->bindParam(':NOMBRE_IMAGEN', $Nombre_imagenPrincipal);
            $stmt->bindParam(':TIPO_IMAGEN', $Tipo_imagenPrincipal);
            $stmt->bindParam(':TAMANIO_IMAGEN', $Tamanio_imagenPrincipal);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        
        //INSERT de evento en agenda
        public function InsertarAgenda($Nombre_imagenAgenda, $Tipo_imagenAgenda, $Tamanio_imagenAgenda){
            $stmt = $this->dbh->prepare(
                "INSERT INTO agenda(nombre_imagenAgenda, typo_imagenAgenda, tamanio_imagenAgenda,  disponibilidad) 
                VALUES (:NOMBRE_IMAGEN, :TIPO_IMAGEN, :TAMANIO_IMAGEN, :DISPONIBILIDAD)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':NOMBRE_IMAGEN', $Nombre_imagenAgenda);
            $stmt->bindParam(':TIPO_IMAGEN', $Tipo_imagenAgenda);
            $stmt->bindParam(':TAMANIO_IMAGEN', $Tamanio_imagenAgenda);
            $stmt->bindValue(':DISPONIBILIDAD', 'activado');

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
        public function ActualizarNoticia($ID_Noticia, $ID_Seccion, $Titulo, $SubTitulo, $Contenido, $Fecha){            
            $stmt = $this->dbh->prepare(
                "UPDATE noticias 
                SET ID_Seccion = :ID_SECCION, titulo = :TITULO, subtitulo = :SUBTITULO, contenido = :CONTENIDO, fecha = STR_TO_DATE('$Fecha', '%d-%m-%Y')
                WHERE ID_Noticia = :ID_NOTICIA"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia);
            $stmt->bindParam(':ID_SECCION', $ID_Seccion);
            $stmt->bindParam(':TITULO', $Titulo);
            $stmt->bindParam(':SUBTITULO', $SubTitulo);
            $stmt->bindParam(':CONTENIDO', $Contenido);
            // $stmt->bindParam(':FECHA', $Fecha);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        
        // UODATE de datos de efemeride 
        public function ActualizarEfemeride($ID_Efemeride, $Titulo, $Contenido, $Fecha){            
            $stmt = $this->dbh->prepare(
                "UPDATE efemeride 
                SET titulo = :TITULO, contenido = :CONTENIDO, fecha = :FECHA
                WHERE ID_Efemeride = :ID_EFEMERIDE"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_EFEMERIDE', $ID_Efemeride);
            $stmt->bindParam(':TITULO', $Titulo);
            $stmt->bindParam(':CONTENIDO', $Contenido);
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

        // UODATE de imagen de noticia
        public function ActualizarImagenNoticia($ID_Noticia, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal){            
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

        // UODATE de imagen de EFEMERIDE
        public function ActualizarImagenEfemeride($ID_Efemeride, $Nombre_imagen, $Tipo_imagen, $Tamanio_imagen){            
            $stmt = $this->dbh->prepare(
                "UPDATE efemeride 
                SET Nombre_imagen = :NOMBRE_IMG, Tamanio_imagen = :TAMANIO_IMG, Tipo_imagen = :TIPO_IMG 
                WHERE ID_Efemeride  = :ID_EFEMERIDE"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_EFEMERIDE', $ID_Efemeride);
            $stmt->bindParam(':NOMBRE_IMG', $Nombre_imagen);
            $stmt->bindParam(':TIPO_IMG', $Tipo_imagen);
            $stmt->bindParam(':TAMANIO_IMG', $Tamanio_imagen);
            
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
}