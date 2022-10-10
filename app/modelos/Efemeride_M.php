<?php
    class Efemeride_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        public function consultarEfemeride(){
            $stmt = $this->dbh->prepare(
                "SELECT titulo, contenido, fecha, Nombre_imagen
                 FROM efemeride 
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