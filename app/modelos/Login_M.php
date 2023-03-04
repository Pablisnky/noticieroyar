<?php
    class Login_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
// ********************************************************************************************************
// SELECT 
// ********************************************************************************************************

        //Consulta el correo del administrador del sitio web
        public function ConsultaCorreoAdministrador(){
            $stmt = $this->dbh->prepare(
                "SELECT correoAdmin
                FROM administrador 
                WHERE ID_Administrador = 1"
            );      

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return 'Existe un fallo en la consulta consultarDenunciaDiaria()'; 
            }
        }

        public function consultarSuscriptores($Correo){
            $stmt = $this->dbh->prepare(
                "SELECT * 
                FROM suscriptores 
                WHERE correoSuscriptor = :CORREO");
            $stmt->bindValue(':CORREO', $Correo, PDO::PARAM_STR);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }     
        
        public function consultarContrasena($ID_Suscriptor){
            $stmt = $this->dbh->prepare(
                "SELECT * 
                FROM suscriptorespasword  
                WHERE ID_Suscriptor = :ID_SUSCRIPTOR" );

            $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return 'Existe un fallo en la consulta consultarContrasena()'; 
            }
        } 
        
        public function consultarCodigoAleatorio($Correo, $CodigoUsuario){
            $stmt = $this->dbh->prepare(
                "SELECT codigoAleatorio
                FROM codigorecuperacion    
                WHERE correo = :CORREO" );

            $stmt->bindParam(':CORREO', $Correo, PDO::PARAM_INT);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return 'Existe un fallo en la consulta consultarContrasena()'; 
            }
        } 
        
        public function DatosSuscriptor($ID_Suscriptor){
            $stmt = $this->dbh->prepare(
                "SELECT nombreSuscriptor, apellidoSuscriptor
                FROM suscriptores 
                WHERE ID_Suscriptor = :ID_SUSCRIPTOR");
            $stmt->bindValue(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_STR);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        public function consultarSuscriptor($Correo){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Suscriptor 
                FROM suscriptores  
                WHERE correoSuscriptor = :CORREO");
            $stmt->bindValue(':CORREO', $Correo, PDO::PARAM_STR);
            
            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

// ********************************************************************************************************
// INSERT 
// ********************************************************************************************************
        // iNSERTA datos del suscriptor
        public function InsertarSuscriptor($RecibeDatos){
            $stmt = $this->dbh->prepare(
                "INSERT INTO suscriptores(NombreSuscriptor, ApellidoSuscriptor, correoSuscriptor, municipioSuscriptor) 
                VALUES (:NOMBRE, :APELLIDO, :CORREO, :MUNICIPIO)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':NOMBRE', $RecibeDatos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':APELLIDO', $RecibeDatos['apellido'], PDO::PARAM_STR);
            $stmt->bindParam(':CORREO', $RecibeDatos['correo'], PDO::PARAM_STR);
            $stmt->bindParam(':MUNICIPIO', $RecibeDatos['municipio'], PDO::PARAM_STR);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                //se recupera el ID del registro insertado
                return $this->dbh->lastInsertId();
            }
            else{
                return 'Existe un fallo en la consulta InsertarSuscripcion()';
            }
        }
        
        // INSERTA clave del suscriptor
        public function InsertarClave($ID_Suscriptor, $ClaveCifrada){
            $stmt = $this->dbh->prepare(
                "INSERT INTO suscriptorespasword(claveCifrada, ID_Suscriptor) 
                VALUES (:CLAVE, :ID_SUSCRIPTOR)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':CLAVE', $ClaveCifrada, PDO::PARAM_STR);
            $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return TRUE;
            }
            else{
                return 'Existe un fallo en la consulta InsertarSuscripcion()';
            }
        }
        
        // INSERTA codigo de verificacion para recuperar contraseña
        public function insertarCodigoAleatorio($Correo, $Aleatorio){
            $stmt = $this->dbh->prepare(
                "INSERT INTO codigorecuperacion(correo, codigoAleatorio, fechaSolicitud, horaSolicitud) 
                VALUES (:CORREO, :ALEATORIO, CURDATE(), CURTIME())"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':CORREO', $Correo, PDO::PARAM_STR);
            $stmt->bindParam(':ALEATORIO', $Aleatorio, PDO::PARAM_INT);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return TRUE;
            }
            else{
                return 'Existe un fallo en la consulta InsertarSuscripcion()';
            }
        }

// ********************************************************************************************************
// UPDATE 
// ********************************************************************************************************

        public function actualizarcodigoVerificado($CodigoUsuario){
            $stmt = $this->dbh->prepare(
                "UPDATE codigorecuperacion 
                SET codigoVerificado = 1 
                WHERE codigoAleatorio = :ALEATORIO"
            );
            
            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ALEATORIO', $CodigoUsuario);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
        public function actualizarClaveSuscriptor($ID_Suscriptor, $ClaveCifrada){
            $stmt = $this->dbh->prepare(
                "UPDATE suscriptorespasword 
                SET claveCifrada = :CLAVE_CIFRADA 
                WHERE ID_Suscriptor = :ID_SUSCRIPTOR")
            ;
           
            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor['ID_Suscriptor']);
            $stmt->bindParam(':CLAVE_CIFRADA', $ClaveCifrada);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }           