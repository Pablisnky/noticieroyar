<?php
    class GaleriaArte_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }
        
		//SELECT de todos los artistas de la galeria 
		public function ConsultarArtistas(){
            $stmt = $this->dbh->query(
                "SELECT ID_SUscriptor, nombreSuscriptor, apellidoSuscriptor, municipioSuscriptor, nombre_imagenPortafolio
                FROM suscriptores
                WHERE nombre_imagenPortafolio != ' ' "
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);			
		}
        
		//Muestra el select 
		public function ConsultarArtista($ID_Suscriptor){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Suscriptor, nombreSuscriptor, apellidoSuscriptor, municipioSuscriptor, nombre_imagenPortafolio
                FROM suscriptores
                WHERE ID_Suscriptor = :ID_SUSCRIPTOR"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }			
		}

        public function ConsultarObraArtista($ID_Suscriptor){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Obra, ID_Suscriptor, nombreObra, imagenObra
                 FROM obra
                 WHERE ID_Suscriptor = :ID_SUSCRIPTOR"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarObra($ID_Obra){
            $stmt = $this->dbh->prepare(
                "SELECT suscriptores.ID_Suscriptor, ID_Obra, nombreObra, disponible, imagenObra, tecnicaObra, medidaObra, nombreSuscriptor, apellidoSuscriptor, precioDolarObra
                 FROM obra
                 INNER JOIN suscriptores ON obra.ID_Suscriptor=suscriptores.ID_Suscriptor
                 WHERE ID_Obra = :ID_OBRA"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_OBRA', $ID_Obra, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }   
        
        public function consultarObraAnterior($ID_Obra, $ID_Suscriptor){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Obra, nombreObra, medidaObra, tecnicaObra, imagenObra, disponible, precioDolarObra
                FROM obra 
                WHERE ID_Obra < :ID_OBRA AND ID_Suscriptor = :ID_SUSCRIPTOR
                ORDER BY ID_Obra 
                DESC 
                LIMIT 1"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_OBRA', $ID_Obra, PDO::PARAM_INT);
            $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarObraPosterior($ID_Obra, $ID_Suscriptor){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Obra, nombreObra, medidaObra, tecnicaObra, imagenObra, disponible, precioObra 
                FROM obra 
                WHERE ID_Obra > :ID_OBRA AND ID_Suscriptor = :ID_SUSCRIPTOR
                ORDER BY ID_Obra 
                LIMIT 1"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_OBRA', $ID_Obra, PDO::PARAM_INT);
            $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarUltimoID_Obra($ID_Suscriptor){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Obra, imagenObra, disponible 
                FROM obra
                WHERE ID_Suscriptor = :ID_SUSCRIPTOR
                ORDER BY ID_Obra 
                DESC 
                LIMIT 1"
            );            

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarprimerID_Obra($ID_Suscriptor){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Obra, imagenObra, disponible
                FROM obra 
                WHERE ID_Suscriptor = :ID_SUSCRIPTOR
                ORDER BY ID_Obra 
                LIMIT 1"
            );      

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarMiniaturaObra($ID_Obra){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Obra, ID_ImagenMiniatura, nombre_ImagenMiniatura 
                FROM imagenesminiaturas
                WHERE ID_Obra = :ID_OBRA"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_OBRA', $ID_Obra, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
    }