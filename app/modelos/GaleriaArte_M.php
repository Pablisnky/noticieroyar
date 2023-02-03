<?php
    class GaleriaArte_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }
        
		//Muestra el select con las secciones
		public function ConsultarArtistas(){
            $stmt = $this->dbh->query(
                "SELECT ID_Artista, nombreArtista, apellidoArtista, catgeoriaArtista, municipioArtista, imagenArtista
                FROM artistas"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);			
		}
        
		//Muestra el select con las secciones
		public function ConsultarArtista($ID_Artista){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Artista, nombreArtista, apellidoArtista, catgeoriaArtista, municipioArtista, imagenArtista
                FROM artistas
                WHERE artistas.ID_Artista = :ID_ARTISTA"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_ARTISTA', $ID_Artista, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }			
		}

        public function ConsultarObraArtista($ID_Artista){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Obra, obra.ID_Artista, nombreObra, imagenObra
                 FROM obra
                 INNER JOIN artistas ON obra.ID_Artista=artistas.ID_Artista
                 WHERE artistas.ID_Artista = :ID_ARTISTA"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_ARTISTA', $ID_Artista, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarObra($ID_Obra){
            $stmt = $this->dbh->prepare(
                "SELECT artistas.ID_Artista, ID_Obra, nombreObra, disponible, imagenObra, tecnicaObra, medidaObra, precioObra, nombreArtista, apellidoArtista, precioObra
                 FROM obra
                 INNER JOIN artistas ON obra.ID_Artista=artistas.ID_Artista 
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
        
        public function consultarObraAnterior($ID_Obra, $ID_Artista){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Obra, nombreObra, medidaObra, tecnicaObra, imagenObra, disponible, precioObra
                FROM obra 
                WHERE ID_Obra < :ID_OBRA AND ID_Artista = :ID_ARTISTA
                ORDER BY ID_Obra 
                DESC 
                LIMIT 1"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_OBRA', $ID_Obra, PDO::PARAM_INT);
            $stmt->bindParam(':ID_ARTISTA', $ID_Artista, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarObraPosterior($ID_Obra, $ID_Artista){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Obra, nombreObra, medidaObra, tecnicaObra, imagenObra, disponible, precioObra 
                FROM obra 
                WHERE ID_Obra > :ID_OBRA AND ID_Artista = :ID_ARTISTA
                ORDER BY ID_Obra 
                LIMIT 1"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_OBRA', $ID_Obra, PDO::PARAM_INT);
            $stmt->bindParam(':ID_ARTISTA', $ID_Artista, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarUltimoID_Obra($ID_Artista){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Obra, imagenObra, disponible 
                FROM obra
                INNER JOIN artistas ON obra.ID_Artista=artistas.ID_Artista
                WHERE artistas.ID_Artista = :ID_ARTISTA
                ORDER BY ID_Obra 
                DESC 
                LIMIT 1"
            );            

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_ARTISTA', $ID_Artista, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarprimerID_Obra($ID_Artista){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Obra, imagenObra, disponible
                FROM obra 
                INNER JOIN artistas ON obra.ID_Artista=artistas.ID_Artista
                WHERE artistas.ID_Artista = :ID_ARTISTA
                ORDER BY ID_Obra 
                LIMIT 1"
            );      

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_ARTISTA', $ID_Artista, PDO::PARAM_INT);

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