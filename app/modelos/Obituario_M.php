<?php
    class Obituario_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        // SELECT obituario
        public function consultarObituario(){
            $stmt = $this->dbh->query(
                "SELECT ID_Obituario, nombre_difunto, capilla_velacion, cementerio, ciudad, hora_velacion, funeraria, fecha_entierro
                FROM obituario
                WHERE fecha_defuncion = CURDATE()
                ORDER BY fecha_defuncion
                DESC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    }