<?php
    class Publicidad_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        public function consultarPublicidad(){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Anuncio, nombre_imagenPublicidad
                 FROM anuncios 
                 WHERE fechaCulmina >= CURDATE()
                 ORDER BY ID_Anuncio
                 DESC"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }

        }
        
    }