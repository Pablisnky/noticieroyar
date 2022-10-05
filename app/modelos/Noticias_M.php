<?php
    class Noticias_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }
        
        //SELECT de las noticias principales del dia en curso
        public function consultarNoticiasPrincipales(){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Noticia, titulo, subtitulo, imagenNoticia, noticiaPrincipal, portada
                FROM noticias 
                WHERE fecha = CURDATE()"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        } 
        
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
                "SELECT noticias.ID_Noticia, titulo, subtitulo, seccion, portada, nombre_imagenNoticia
                 FROM noticias 
                 INNER JOIN imagenes ON noticias.ID_Noticia=imagenes.ID_Noticia
                 INNER JOIN secciones ON noticias.ID_Seccion=secciones.ID_Seccion
                 WHERE fecha < CURDATE()"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
    
    }