<?php
    class Inicio_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }
        
        //SELECT de las noticias del dia en curso
        public function consultarNoticiasPortada(){
            $stmt = $this->dbh->prepare(
                "SELECT noticias.ID_Noticia, titulo, subtitulo, portada, nombre_imagenNoticia,  DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha 
                 FROM noticias 
                 INNER JOIN imagenes ON noticias.ID_Noticia=imagenes.ID_Noticia
                 WHERE fecha = CURDATE() AND ImagenPrincipal = 1
                 ORDER BY ID_Noticia
                 DESC"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT de los anuncios asociados a las noticias portadas
        public function consultarAnuncioNoticiaPortada(){
            $stmt = $this->dbh->query(
                "SELECT ID_Anuncio, ID_Noticia
                FROM publicidad"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT de las imagnes asociados a las noticias portadas
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

        //SELECT de la noticia seleccionada en radio butom
        public function consultarNot_Princ_Seleccionada($ID_Noticia){
            $stmt = $this->dbh->prepare(
                "SELECT noticias.ID_Noticia, titulo, subtitulo, portada, nombre_imagenNoticia
                FROM noticias 
                INNER JOIN imagenes ON noticias.ID_Noticia=imagenes.ID_Noticia
                WHERE noticias.ID_Noticia = :ID_NOTICIA
                ORDER BY ID_Noticia
                "
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticia);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }    
    }