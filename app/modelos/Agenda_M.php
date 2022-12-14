<?php
    class Agenda_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        public function consultarAgenda(){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Agenda, nombre_imagenAgenda, DATE_FORMAT(caducidad, '%d-%m-%Y') AS fechaPublicacion
                 FROM agenda 
                 WHERE caducidad >= CURDATE()
                 ORDER BY ID_Agenda
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