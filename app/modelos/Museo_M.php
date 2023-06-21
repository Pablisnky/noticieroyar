<?php
    class Museo_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }
                
// ***********************************************************************************************
// SELECT
// ***********************************************************************************************
        //Se CONSULTA la imagen que se solicito a pantalla completa
        public function consultaImagenFullScreem($ID_ImagenMiniatura){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_imagenNoticia
                    FROM imagenes 
                    WHERE ID_Imagen = :ID_IMAGEN"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_IMAGEN', $ID_ImagenMiniatura, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        // CONSULTA exposiciones en curso
        public function consultarExposiciones(){
            $stmt = $this->dbh->prepare(
                "SELECT museoexposiciones.ID_Exposicion, ID_Sala, fechaInicio, fechaCulmina, nombreExposicion, autorExposicion, TextoEspacio, nombreImagenSala
                FROM museoexposiciones 
                INNER JOIN imagenesmuseo ON museoexposiciones.ID_Exposicion=imagenesmuseo.ID_Exposicion 
                WHERE imagenPrincipal = :IMAGEN_PRINCIPAL"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindValue(':IMAGEN_PRINCIPAL', 1, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return 'Existe un fallo en la consulta consultarDenunciaDiaria()'; 
            }
        }
        
        // CONSULTA 
        public function consultarObrasSalas($ID_Sala){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Sala, fechaInicio, fechaCulmina, nombreExposicion, autorExposicion, TextoEspacio, nombreImagenSala
                FROM museoexposiciones 
                INNER JOIN imagenesmuseo ON museoexposiciones.ID_Exposicion=imagenesmuseo.ID_Exposicion 
                WHERE ID_Sala = :ID_SALA"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_SALA', $ID_Sala, PDO::PARAM_STR);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return 'Existe un fallo en la consulta consultarDenunciaDiaria()'; 
            }
        }

        public function consultarNroObras(){
            $stmt = $this->dbh->query(
                "SELECT ID_Exposicion, COUNT(ID_ImagenSala) AS Nro_Obras
                FROM imagenesmuseo 
                GROUP BY ID_Exposicion"
            );
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // CONSULTA los dias que restan para culminar cada una de las exposiciones
        public function consultarDiasExposicion(){
            $stmt = $this->dbh->query(
                "SELECT ID_Sala, TIMESTAMPDIFF(DAY, fechaInicio, fechaCulmina) AS dias_restantes
                FROM museoexposiciones 
                GROUP BY ID_Sala"
            );
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }