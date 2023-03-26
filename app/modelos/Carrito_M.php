<?php
    class Carrito_M extends ConexionClasificados_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        //SELECT con los datos de cuentas bancarias
        public function consultarCtaBanco($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT bancoNombre, bancoCuenta, bancoTitular, bancoRif FROM bancos WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
    
        //SELECT de los datos para realizar PagoMovil
        public function consultarPagoMovil($ID_Tienda){
            $stmt = $this->dbh->prepare(
                "SELECT cedula_pagomovil, banco_pagomovil, telefono_pagomovil 
                 FROM pagomovil 
                 WHERE ID_Tienda = :ID_TIENDA"
            );

            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        } 
    
        //SELECT de los datos para realizar pago via Reserve
        public function consultarReserve($ID_Tienda){
            $stmt = $this->dbh->prepare(
                "SELECT usuarioReserve
                 FROM pago_reserve 
                 WHERE ID_Tienda = :ID_TIENDA"
            );

            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        } 
    
        //SELECT de los datos para realizar pago via Paypal
        public function consultarPaypal($ID_Tienda){
            $stmt = $this->dbh->prepare(
                "SELECT correo_paypal
                 FROM pago_paypal 
                 WHERE ID_Tienda = :ID_TIENDA"
            );

            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        } 
    
        //SELECT de los datos para realizar pago via Zelle
        public function consultarZelle($ID_Tienda){
            $stmt = $this->dbh->prepare(
                "SELECT correo_zelle
                 FROM pago_zelle 
                 WHERE ID_Tienda = :ID_TIENDA"
            );

            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        } 

        //SELECT de los datos para realizar pagos con otros metodos
        public function consultarOtrosPagos($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT efectivoBolivar, efectivoDolar, acordado FROM otrospagos WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        } 
       
        //SELECT de los datos para contactar con la tienda
        public function consultarVendedor($ID_Suscriptor){
            $stmt = $this->dbh->prepare(
                "SELECT telefono_AfiCom 
                 FROM afiliado_com  
                 INNER JOIN tiendas ON afiliado_com.ID_AfiliadoCom=tiendas.ID_AfiliadoCom
                 WHERE afiliado_com.ID_AfiliadoCom = :ID_SUSCRIPTOR"
            );

            $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

       
        //SELECT de los datos de un usuario registrado
        public function consultarUsuario($Cedula){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_usu, apellido_usu, cedula_usu, telefono_usu, correo_usu, estado_usu, ciudad_usu, direccion_usu, ID_Usuario
                 FROM usuarios 
                 WHERE cedula_usu  = :CEDULA AND suscrito = 1"
            );

            $stmt->bindParam(':CEDULA', $Cedula, PDO::PARAM_STR);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
    }