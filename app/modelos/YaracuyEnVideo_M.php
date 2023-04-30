<?php
    class YaracuyEnVideo_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        // SELECT 
        public function consultarVideosYaracuy(){
            $stmt = $this->dbh->query(
                "SELECT ID_YaracuyEnVideo, nombreVideo, decripcionVideo
                FROM yaracuyenvideos 
                ORDER BY ID_YaracuyEnVideo 
                DESC"
            );
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        // SELECT de video especifico en la seccion YaracuyEnVideo
        public function consultaVideoYaracuy($ID_Video){
            $stmt = $this->dbh->prepare(
                "SELECT ID_YaracuyEnVideo, nombreVideo, decripcionVideo
                FROM yaracuyenvideos 
                WHERE ID_YaracuyEnVideo = :ID_VIDEO"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_VIDEO', $ID_Video, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        public function consultarVideoAnterior($ID_Video){
            $stmt = $this->dbh->prepare(
                "SELECT ID_YaracuyEnVideo, nombreVideo, decripcionVideo
                FROM yaracuyenvideos 
                WHERE ID_YaracuyEnVideo < :ID_VIDEO
                ORDER BY ID_YaracuyEnVideo 
                DESC 
                LIMIT 1"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_VIDEO', $ID_Video, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        public function consultarVideoPosterior($ID_Video){
            $stmt = $this->dbh->prepare(
                "SELECT ID_YaracuyEnVideo, nombreVideo, decripcionVideo
                FROM yaracuyenvideos 
                WHERE ID_YaracuyEnVideo > :ID_VIDEO
                ORDER BY ID_YaracuyEnVideo  
                LIMIT 1"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_VIDEO', $ID_Video, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        public function consultarUltimoID_Video(){
            $stmt = $this->dbh->prepare(
                "SELECT ID_YaracuyEnVideo, nombreVideo, decripcionVideo
                FROM yaracuyenvideos
                ORDER BY ID_YaracuyEnVideo 
                DESC 
                LIMIT 1"
            );            

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            // $stmt->bindParam(':ID_VIDEO', $ID_Video, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarprimerID_Video(){
            $stmt = $this->dbh->prepare(
                "SELECT ID_YaracuyEnVideo, nombreVideo, decripcionVideo
                FROM yaracuyenvideos 
                ORDER BY ID_YaracuyEnVideo 
                LIMIT 1"
            );      

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            // $stmt->bindParam(':ID_VIDEO', $ID_Video, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
    }