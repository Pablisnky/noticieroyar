<?php
    class Carrito_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }
        
// ********************************************************************************************************
// ********************************************************************************************************
        //SELECT de las pinturas
        public function consultar_pintura_carrito(){
            $stmt = $this->dbh->query(
                "SELECT ID_Pintura, nombre_pintura, nombre_ImgPintura, precio
                FROM pinturas 
                ORDER BY ID_Pintura"
            );
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }