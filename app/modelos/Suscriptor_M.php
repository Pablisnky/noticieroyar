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
                 SET pseudonimoSuscripto = :PSEUDONIMO, telefonoSuscriptor = :TELEFONO, transferencia = :TRANSFERENCIA, pago_movil = :PAGO_MOVIL, paypal = :PAYPAL, zelle = :ZELLE, efectivo_Bs = :EFECTIVO_BS, efectivo_Dol = :EFECTIVO_DOL, acordado = :ACORDADO, municipioSuscriptor = :MUNICIPIO, parroquiaSuscriptor = :PARROQUIA
                 WHERE ID_Suscriptor = :ID_SUSCRIPTOR"
            );

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_SUSCRIPTOR', $RecibNombreComercial['ID_Suscriptor']);
            $stmt->bindParam(':PSEUDONIMO', $RecibNombreComercial['nombreComercial']);
            $stmt->bindParam(':TELEFONO', $RecibNombreComercial['telefono']);
            $stmt->bindParam(':TRANSFERENCIA', $RecibNombreComercial['tranferencia']);
            $stmt->bindParam(':PAGO_MOVIL', $RecibNombreComercial['pago_movil']);
            $stmt->bindParam(':PAYPAL', $RecibNombreComercial['paypal']);
            $stmt->bindParam(':ZELLE', $RecibNombreComercial['zelle']);
            $stmt->bindParam(':EFECTIVO_BS', $RecibNombreComercial['efectivo_Bs']);
            $stmt->bindParam(':EFECTIVO_DOL', $RecibNombreComercial['efectivo_dol']);
            $stmt->bindParam(':ACORDADO', $RecibNombreComercial['acordado']);
            $stmt->bindParam(':MUNICIPIO', $RecibNombreComercial['municipio']);
            $stmt->bindParam(':PARROQUIA', $RecibNombreComercial['parroquia']);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        }
    }