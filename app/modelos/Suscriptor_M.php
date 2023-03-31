<?php
    class Suscriptor_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        public function consultarTodosSuscriptor(){
            $stmt = $this->dbh->prepare(
                "SELECT * 
                FROM suscriptores "
            );
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }  

        public function consultarSuscriptor($ID_Suscriptor){
            $stmt = $this->dbh->prepare(
                "SELECT * 
                FROM suscriptores 
                WHERE ID_Suscriptor = :ID_SUSCRIPTOR");
            $stmt->bindValue(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_STR);
            
            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }  
        
        //UPDATE de nombre comercial
        public function InsertarNombreComercial($RecibNombreComercial){
            $stmt = $this->dbh->prepare(
                "UPDATE suscriptores 
                 SET pseudonimoSuscripto = :PSEUDONIMO, telefonoSuscriptor = :TELEFONO
                 WHERE ID_Suscriptor = :ID_SUSCRIPTOR"
            );

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_SUSCRIPTOR', $RecibNombreComercial['ID_Suscriptor']);
            $stmt->bindParam(':PSEUDONIMO', $RecibNombreComercial['nombreComercial']);
            $stmt->bindParam(':TELEFONO', $RecibNombreComercial['telefono']);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        }
    }