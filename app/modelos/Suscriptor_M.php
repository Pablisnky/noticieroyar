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
        
        //SELECT de todas las imagenes de un producto
        public function consultarMetodoPago($ID_Suscriptor){
            $stmt = $this->dbh->prepare(
                "SELECT transferencia, pago_movil, paypal, zelle, criptomoneda, efectivo_Bs, efectivo_Dol, acordado 
                FROM suscriptores 
                WHERE ID_Suscriptor = :ID_SUSCRIPTOR");

            $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //UPDATE datos del suscriptor
        public function actualizarDatosSuscriptor($RecibeDatosSuscriptor){
            $stmt = $this->dbh->prepare(
                "UPDATE suscriptores 
                 SET nombreSuscriptor = :NOMBRE, apellidoSuscriptor = :APELLIDO, correoSuscriptor = :CORREO, pseudonimoSuscripto = :PSEUDONIMO, municipioSuscriptor = :MUNICIPIO, parroquiaSuscriptor = :PARROQUIA, telefonoSuscriptor = :TELEFONO, transferencia = :TRANSFERENCIA, pago_movil = :PAGO_MOVIL, paypal = :PAYPAL, zelle = :ZELLE, criptomoneda = :CRIPTOMONEDA, efectivo_Bs = :EFECTIVO_BS, efectivo_Dol = :EFECTIVO_DOL, acordado = :ACORDADO, categoria = :CATEGORIA
                 WHERE ID_Suscriptor = :ID_SUSCRIPTOR"
            );

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_SUSCRIPTOR', $RecibeDatosSuscriptor['ID_Suscriptor']);
            $stmt->bindParam(':NOMBRE', $RecibeDatosSuscriptor['nombreSuscriptor']);
            $stmt->bindParam(':APELLIDO', $RecibeDatosSuscriptor['apellidoSuscriptor']);
            $stmt->bindParam(':CORREO', $RecibeDatosSuscriptor['correoSuscriptor']);
            $stmt->bindParam(':PSEUDONIMO', $RecibeDatosSuscriptor['pseudonimo']);
            $stmt->bindParam(':MUNICIPIO', $RecibeDatosSuscriptor['municipio']);
            $stmt->bindParam(':PARROQUIA', $RecibeDatosSuscriptor['parroquia']);
            $stmt->bindParam(':TELEFONO', $RecibeDatosSuscriptor['telefono']);
            $stmt->bindParam(':TRANSFERENCIA', $RecibeDatosSuscriptor['transferencia']);
            $stmt->bindParam(':PAGO_MOVIL', $RecibeDatosSuscriptor['pago_movil']);
            $stmt->bindParam(':PAYPAL', $RecibeDatosSuscriptor['paypal']);
            $stmt->bindParam(':ZELLE', $RecibeDatosSuscriptor['zelle']);
            $stmt->bindParam(':CRIPTOMONEDA', $RecibeDatosSuscriptor['criptomoneda']);
            $stmt->bindParam(':EFECTIVO_BS', $RecibeDatosSuscriptor['efectivo_Bs']);
            $stmt->bindParam(':EFECTIVO_DOL', $RecibeDatosSuscriptor['efectivo_dol']);
            $stmt->bindParam(':ACORDADO', $RecibeDatosSuscriptor['acordado']);
            $stmt->bindParam(':CATEGORIA', $RecibeDatosSuscriptor['categoria']);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        }
        
        //UPDATE de imagen de catalogo
        public function actualizarImagenCatalogo($RecibeDatosSuscriptor, $nombre_imgCatalogo, $tipo_imgCatalogo, $tamanio_imgCatalogo){
            $stmt = $this->dbh->prepare(
                "UPDATE suscriptores 
                 SET nombreImgCatalogo = :NOMBRE_IMG, tipoImgCatalogo =:TIPO_IMG, tamanioImgCatalogo = :TAMANIO_IMG
                 WHERE ID_Suscriptor = :ID_SUSCRIPTOR"
            );

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_SUSCRIPTOR', $RecibeDatosSuscriptor['ID_Suscriptor']);
            $stmt->bindParam(':NOMBRE_IMG', $nombre_imgCatalogo);
            $stmt->bindParam(':TIPO_IMG', $tipo_imgCatalogo);
            $stmt->bindParam(':TAMANIO_IMG', $tamanio_imgCatalogo);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        }
        
        //SELECT tiendas en una misma categria
        public function consultarTiendasCategorias($NombreCategoria){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Suscriptor, pseudonimoSuscripto, categoria, nombreImgCatalogo 
                FROM suscriptores 
                WHERE categoria = :CAEGORIA"
            );

            $stmt->bindParam(':CAEGORIA', $NombreCategoria, PDO::PARAM_STR);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }
    }