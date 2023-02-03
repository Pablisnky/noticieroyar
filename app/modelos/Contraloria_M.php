<?php
    class Contraloria_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }

        //Consulta la cantidad de denuncias en el día
        public function consultarDenunciaDiaria(){
            $stmt = $this->dbh->prepare(
                "SELECT COUNT(fechaDenuncia) AS Total 
                FROM denuncias 
                WHERE fechaDenuncia = CURDATE()"
            );      

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return 'Existe un fallo en la consulta consultarDenunciaDiaria()'; 
            }
        }

        public function consultarDenuncia(){
            $stmt = $this->dbh->query(
                "SELECT ID_Denuncia, descripcionDenuncia, ubicacionDenuncia, municipioDenuncia, solucionado, DATE_FORMAT(fechaDenuncia, '%d-%m-%Y') AS fecha_denuncia
                FROM denuncias 
                ORDER BY ID_Denuncia
                DESC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function diasDenunciaActiva(){
            $stmt = $this->dbh->query(
                "SELECT ID_Denuncia, DATEDIFF(CURDATE(), fechaDenuncia) AS dias
                FROM denuncias"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function consultarDenunciaImagenes($ImagenPrincipal = 1){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Denuncia, ID_imagDenuncia, nombre_imgDenuncia, ImagenPrincipalDenuncia
                FROM imagenesdenuncias  
                WHERE ImagenPrincipalDenuncia = :IMAGENPRICIPAL"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':IMAGENPRICIPAL', $ImagenPrincipal, PDO::PARAM_INT);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        // INSERT de la denuncia
        public function InsertarDenuncia($Descripcion, $Ubicacion, $Municipio){
            $stmt = $this->dbh->prepare(
                "INSERT INTO denuncias (descripcionDenuncia, ubicacionDenuncia, municipioDenuncia, fechaDenuncia, horaDenuncia) 
                VALUES (:DESCRIPCION, :UBICACION, :MUNICIPIO, CURDATE(), CURTIME())"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':DESCRIPCION', $Descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':UBICACION', $Ubicacion, PDO::PARAM_STR);
            $stmt->bindParam(':MUNICIPIO', $Municipio, PDO::PARAM_STR);

            if($stmt->execute()){
                //se recupera el ID del registro insertado
                return $this->dbh->lastInsertId();
            }
            else{
                return FALSE;
            }
        }

        //INSERT de las imagenes de una denuncia
        public function InsertarImagenlDenuncia($ID_Denuncia, $Nombre_imagenDenunciaPrincipal, $Tipo_imagenDenunciaPrincipal, $Tamanio_imagenDenunciaPrincipal, $ImagenPrincipal){
            $stmt = $this->dbh->prepare(
                "INSERT INTO imagenesdenuncias (ID_Denuncia, nombre_imgDenuncia, tamanio_imgDenuncia, tipo_imgDenuncia, ImagenPrincipalDenuncia) 
                VALUES (:ID_DENUNCIA, :NOMBRE_IMAGEN, :TAMANIO_IMAGEN, :TIPO_IMAGEN, :IMG_PRINCIPAL)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_DENUNCIA', $ID_Denuncia, PDO::PARAM_INT);
            $stmt->bindParam(':NOMBRE_IMAGEN', $Nombre_imagenDenunciaPrincipal, PDO::PARAM_STR);
            $stmt->bindParam(':TAMANIO_IMAGEN', $Tipo_imagenDenunciaPrincipal, PDO::PARAM_STR);
            $stmt->bindParam(':TIPO_IMAGEN', $Tamanio_imagenDenunciaPrincipal, PDO::PARAM_STR);
            $stmt->bindParam(':IMG_PRINCIPAL', $ImagenPrincipal, PDO::PARAM_STR);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
    }