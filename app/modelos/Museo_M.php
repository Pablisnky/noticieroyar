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
                "SELECT museoexposiciones.ID_Exposicion, ID_Sala, DATE_FORMAT(fechaInicio, '%d-%m-%Y') AS fecha_Inicio, DATE_FORMAT(fechaCulmina, '%d-%m-%Y') AS fecha_Culmina, nombreExposicion, autorExposicion, TextoEspacio, nombreImagenSala
                FROM museoexposiciones 
                INNER JOIN obrasmuseo ON museoexposiciones.ID_Exposicion=obrasmuseo.ID_Exposicion 
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
                "SELECT ID_Sala, ID_ImagenSala, autorExposicion, nombreImagenSala
                FROM museoexposiciones 
                INNER JOIN obrasmuseo ON museoexposiciones.ID_Exposicion=obrasmuseo.ID_Exposicion 
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
                FROM obrasmuseo 
                GROUP BY ID_Exposicion"
            );
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // CONSULTA los dias que restan para culminar cada una de las exposiciones
        public function consultarDiasExposicion(){
            $stmt = $this->dbh->query(
                "SELECT ID_Sala, TIMESTAMPDIFF(DAY, CURDATE(), fechaCulmina) AS dias_restantes
                FROM museoexposiciones 
                GROUP BY ID_Sala"
            );
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function consultarObra($ID_ImagenSala){
            $stmt = $this->dbh->prepare(
                "SELECT ID_ImagenSala, ID_Sala, obrasmuseo.ID_Exposicion, nombreImagenSala
                 FROM obrasmuseo
                 INNER JOIN museoexposiciones ON museoexposiciones.ID_Exposicion=obrasmuseo.ID_Exposicion
                 WHERE ID_ImagenSala = :ID_IMAGENSALA"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_IMAGENSALA', $ID_ImagenSala, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        } 
        
        public function consultarObraAnterior($ID_ImagenSala, $ID_Exposicion){
            $stmt = $this->dbh->prepare(
                "SELECT ID_ImagenSala, ID_Sala, obrasmuseo.ID_Exposicion, nombreImagenSala, autorExposicion
                FROM obrasmuseo 
                INNER JOIN museoexposiciones ON museoexposiciones.ID_Exposicion=obrasmuseo.ID_Exposicion
                WHERE ID_ImagenSala < :ID_IMAGENSALA AND obrasmuseo.ID_Exposicion = :ID_EXPOSICION 
                ORDER BY ID_ImagenSala 
                DESC 
                LIMIT 1"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_IMAGENSALA', $ID_ImagenSala, PDO::PARAM_INT);
            $stmt->bindParam(':ID_EXPOSICION', $ID_Exposicion, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarObraPosterior($ID_ImagenSala, $ID_Exposicion){
            $stmt = $this->dbh->prepare(
                "SELECT ID_ImagenSala, ID_Sala, obrasmuseo.ID_Exposicion, nombreImagenSala, autorExposicion 
                FROM obrasmuseo
                INNER JOIN museoexposiciones ON museoexposiciones.ID_Exposicion=obrasmuseo.ID_Exposicion
                WHERE ID_ImagenSala > :ID_IMAGENSALA AND obrasmuseo.ID_Exposicion = :ID_EXPOSICION 
                ORDER BY ID_Exposicion 
                LIMIT 1"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_IMAGENSALA', $ID_ImagenSala, PDO::PARAM_INT);
            $stmt->bindParam(':ID_EXPOSICION', $ID_Exposicion, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarUltimoID_Obra($ID_Exposicion){
            $stmt = $this->dbh->prepare(
                "SELECT ID_ImagenSala, ID_Sala, obrasmuseo.ID_Exposicion, nombreImagenSala
                FROM obrasmuseo
                INNER JOIN museoexposiciones ON museoexposiciones.ID_Exposicion=obrasmuseo.ID_Exposicion
                WHERE obrasmuseo.ID_Exposicion = :ID_EXPOSICION
                ORDER BY ID_ImagenSala 
                DESC 
                LIMIT 1"
            );            

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_EXPOSICION', $ID_Exposicion, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarprimerID_Obra($ID_Exposicion){
            $stmt = $this->dbh->prepare(
                "SELECT ID_ImagenSala, ID_Sala, obrasmuseo.ID_Exposicion, nombreImagenSala
                FROM obrasmuseo
                INNER JOIN museoexposiciones ON museoexposiciones.ID_Exposicion=obrasmuseo.ID_Exposicion
                WHERE obrasmuseo.ID_Exposicion = :ID_EXPOSICION
                ORDER BY ID_ImagenSala 
                LIMIT 1"
            );      

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_EXPOSICION', $ID_Exposicion, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
    }