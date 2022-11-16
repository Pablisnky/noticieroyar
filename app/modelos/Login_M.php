<?php
    class Login_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
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

        public function consultarAfiliadosMay($Correo){
            $stmt = $this->dbh->prepare(
                "SELECT * 
                FROM afiliado_may 
                WHERE correo_AfiMay = :CORREO");
            $stmt->bindValue(':CORREO', $Correo, PDO::PARAM_STR);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        public function consultarAfiliadosDes($Correo){
            $stmt = $this->dbh->prepare("SELECT * FROM afiliado_des WHERE correo_AfiDes = :correo");
            $stmt->bindValue(':correo', $Correo, PDO::PARAM_STR);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarAfiliadosVen($Correo){
            $stmt = $this->dbh->prepare(
                "SELECT * 
                FROM afiliado_ven 
                WHERE correo_AfiVen = :CORREO");
            $stmt->bindValue(':CORREO', $Correo, PDO::PARAM_STR);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        public function consultarContrasena($ID_Afiliado){
            $stmt = $this->dbh->prepare(
                "SELECT * 
                FROM suscriptorespasword  
                WHERE ID_Suscriptor = :ID_AFILIADO" );

            $stmt->bindValue(':ID_AFILIADO', $ID_Afiliado, PDO::PARAM_INT);
            
            if($stmt->execute()){
                return $stmt->fetchColumn(PDO::FETCH_ASSOC);
            }
            else{
                return 'Existe un fallo en la consulta consultarContrasena()'; 
            }
        } 
        
        public function consultarID_Tienda($ID_Afiliado){
            $stmt = $this->dbh->prepare("SELECT ID_Tienda, nombre_Tien, ID_AfiliadoCom, publicar_Tien FROM tiendas WHERE ID_AfiliadoCom = :ID_AFILIADO");

            $stmt->bindValue(':ID_AFILIADO', $ID_Afiliado, PDO::PARAM_INT);

            $stmt->execute();
            return $stmt;
        } 

        public function consultarID_Mayorista($ID_Afiliado){
            $stmt = $this->dbh->prepare("SELECT ID_Mayorista, nombreMay, ID_AfiliadoMay FROM mayorista WHERE ID_AfiliadoMay = :ID_AFILIADO_MAY");

            $stmt->bindValue(':ID_AFILIADO_MAY', $ID_Afiliado, PDO::PARAM_INT);

            $stmt->execute();
            return $stmt;
        }

        public function consultarID_AfiliadoVen($ID_Afiliado){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Mayorista, nombre_AfiVen, apellido_AfiVen
                FROM afiliado_ven  
                WHERE ID_AfiliadoVen = :ID_AFILIADO_VEN"
            );

            $stmt->bindValue(':ID_AFILIADO_VEN', $ID_Afiliado, PDO::PARAM_INT);

            $stmt->execute();
            return $stmt;
        }

        public function consultarUsuarioRecordado_Com($Cookie_usuario){
            $stmt = $this->dbh->prepare(
                "SELECT correo_AfiCom 
                FROM afiliado_com 
                WHERE ID_AfiliadoCom = :ID_AFILIADO_COM"
            );

            $stmt->bindValue(':ID_AFILIADO_COM', $Cookie_usuario, PDO::PARAM_INT);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarUsuarioRecordado_May($Cookie_usuario){
            $stmt = $this->dbh->prepare(
                "SELECT correo_AfiMay 
                FROM afiliado_may 
                WHERE ID_AfiliadoMay = :ID_AFILIADO_MAY "
            );

            $stmt->bindValue(':ID_AFILIADO_MAY', $Cookie_usuario, PDO::PARAM_INT);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarUsuarioRecordado_Ven($Cookie_usuario){
            $stmt = $this->dbh->prepare(
                "SELECT correo_AfiVen 
                FROM afiliado_ven 
                WHERE ID_AfiliadoVen = :ID_AFILIADO_VEN "
            );

            $stmt->bindValue(':ID_AFILIADO_VEN', $Cookie_usuario, PDO::PARAM_INT);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarUsuarioRecordado_Des($Cookie_usuario){
            $stmt = $this->dbh->prepare(
                "SELECT correo_AfiDes 
                FROM afiliado_des 
                WHERE ID_AfiliadoDes = :ID_AFILIADO_DES "
            );

            $stmt->bindValue(':ID_AFILIADO_DES', $Cookie_usuario, PDO::PARAM_INT);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarSecciones($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT ID_Seccion FROM secciones WHERE ID_Tienda = :ID_TIENDA");
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);
            if($stmt->execute()){
                //Se envia información de cuantos registros se vieron afectados por la consulta
                return $stmt->rowCount();
            }
            else{
                return false;
            }
        }

        public function consultarCodigoAleatorio( $Correo, $Aleatorio){
            $stmt = $this->dbh->prepare("SELECT * FROM codigo_recuperacion WHERE codigoAleatorio = :ALEATORIO AND correo = :CORREO");

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ALEATORIO', $Aleatorio);
            $stmt->bindParam(':CORREO', $Correo);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){                
                //Se envia información de cuantos registros se vieron afectados por la consulta
                return $stmt->rowCount(); 
            }
            else{
                return false;
            }           
        }

        public function insertarCodigoAleatorio($Correo, $Aleatorio){
            $stmt = $this->dbh->prepare("INSERT INTO codigo_recuperacion(correo, codigoAleatorio, fechaSolicitud) VALUES(:CORREO, :ALEATORIO, NOW())");

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ALEATORIO', $Aleatorio);
            $stmt->bindParam(':CORREO', $Correo);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }            
        }

        public function actualizarcodigoVerificado($CodigoUsuario){
            $stmt = $this->dbh->prepare("UPDATE codigo_recuperacion SET codigoVerificado = 1 WHERE codigoAleatorio = :ALEATORIO");
            
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

        public function actualizarClaveCom($ID_Afiliado, $ClaveCifrada){
            $stmt = $this->dbh->prepare("UPDATE afiliado_comingreso SET claveCifrada = :CLAVE_CIFRADA WHERE ID_Afiliado = :ID_AFILIADO");
           
            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_AFILIADO', $ID_Afiliado[0]['ID_AfiliadoCom']);
            $stmt->bindValue(':CLAVE_CIFRADA', $ClaveCifrada);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function actualizarClaveMay($ID_AfiliadoMay, $ClaveCifrada){
            $stmt = $this->dbh->prepare("UPDATE afiliado_mayingreso SET claveCifradaMay = :CLAVE_CIFRADA WHERE ID_AfiliadoMay = :ID_AFILIADOMAY");
           
            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_AFILIADOMAY', $ID_AfiliadoMay[0]['ID_AfiliadoMay']);
            $stmt->bindValue(':CLAVE_CIFRADA', $ClaveCifrada);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function actualizarClaveVen($ID_AfiliadoVen, $ClaveCifrada){
            $stmt = $this->dbh->prepare("UPDATE afiliado_veningreso SET claveCifradaVen = :CLAVE_CIFRADA WHERE ID_AfiliadoVen = :ID_AFILIADOVEN");
           
            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_AFILIADOVEN', $ID_AfiliadoVen[0]['ID_AfiliadoVen']);
            $stmt->bindValue(':CLAVE_CIFRADA', $ClaveCifrada);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function actualizarClaveDes($ID_AfiliadoDes, $ClaveCifrada){
            $stmt = $this->dbh->prepare("UPDATE afiliado_desingreso SET claveCifradaDes = :CLAVE_CIFRADA WHERE ID_AfiliadoDes = :ID_AFILIADODES");
           
            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_AFILIADODES', $ID_AfiliadoDes[0]['ID_AfiliadoDes']);
            $stmt->bindValue(':CLAVE_CIFRADA', $ClaveCifrada);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
        public function actualizarCodigoVenta($ID_AfiliadoVen, $CodigoVenta){
            $stmt = $this->dbh->prepare(
                "UPDATE afiliado_ven  
                SET codigoVenta_AfiVen = :CODIGO_VENTA 
                WHERE ID_AfiliadoVen = :ID_AFILIADOVEN"
            );
           
            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_AFILIADOVEN', $ID_AfiliadoVen[0]['ID_AfiliadoVen']);
            $stmt->bindValue(':CODIGO_VENTA', $CodigoVenta);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
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
    }           