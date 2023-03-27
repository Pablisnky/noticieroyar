<?php
    class Borrar_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        public function ConsultarAgenda(){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_imagenAgenda
                 FROM agenda 
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

        public function actualizarProductos(){
            $stmt = $this->dbh->prepare(
                "UPDATE productos
                 SET ID_Suscriptor =  7
                 WHERE ID_Suscriptor = 0"
            );
                        
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        }        

        public function ConsultarImagenes(){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_ImagenEfemeride 
                 FROM imagenesefemerides 
                 ORDER BY ID_ImagenEfemeride 
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