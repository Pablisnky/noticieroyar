<?php
    class Inicio_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }
        
        //SELECT de las noticias principales del dia en curso
        public function consultarNoticiasPortada(){
            $stmt = $this->dbh->prepare(
                "SELECT noticias.ID_Noticia, titulo, subtitulo, portada, nombre_imagenNoticia
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

        //SELECT de la noticia seleccionada en radio butom
        public function consultarNot_Princ_Seleccionada($ID_Noticias){
            $stmt = $this->dbh->prepare(
                "SELECT noticias.ID_Noticia, titulo, subtitulo, portada, nombre_imagenNoticia
                FROM noticias 
                INNER JOIN imagenes ON noticias.ID_Noticia=imagenes.ID_Noticia
                WHERE noticias.ID_Noticia = :ID_NOTICIA"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_NOTICIA', $ID_Noticias);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

    
    }