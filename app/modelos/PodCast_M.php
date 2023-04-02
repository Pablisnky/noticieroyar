<?php
    class PodCast_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        public function consultarArchivoPodCast(){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Podcast, titulo_podcast, locutor, nombre_audioPod, imagen_redesSociales
                 FROM podcast 
                 ORDER BY ID_Podcast
                 DESC"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        public function consultarArchivoPodCastEspecifico($ID_Podcast){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Podcast, nombre_audioPod, imagen_redesSociales, titulo_podcast, locutor
                 FROM podcast 
                 WHERE ID_Podcast = $ID_Podcast
                 ORDER BY fecha_archivoPod
                 DESC"
            );

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }        
    }