<?php
    class Efemeride_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        public function consultarEfemeride(){
            $stmt = $this->dbh->prepare(
                "SELECT titulo, contenido, fecha, nombre_ImagenEfemeride
                 FROM efemeride 
                 INNER JOIN imagenesefemerides ON efemeride.ID_Efemeride=imagenesefemerides.ID_Efemeride
                 WHERE fecha = CURDATE()"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }

        }
        
    }