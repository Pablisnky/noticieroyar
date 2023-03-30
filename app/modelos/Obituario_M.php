<?php
    class Obituario_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        // SELECT obituario
        public function consultarObituario(){
            $stmt = $this->dbh->query(
                "SELECT nombreImagObituario
                FROM imagenesobiturario 
                ORDER BY ID_imagObituario 
                DESC"
            );
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    }