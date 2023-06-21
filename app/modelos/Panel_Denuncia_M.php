<?php
    class Panel_Denuncia_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        //CONSULTA la cantidad de denuncias de un suscriptor
        public function consultarCantidadDenuncias($ID_Suscriptor){
           $stmt = $this->dbh->prepare(
               "SELECT COUNT(ID_Denuncia) AS cantidadDenuncias
               FROM denuncias  
               WHERE ID_Suscriptor = :ID_SUSCRIPTOR"
           );

           $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);
           
           if($stmt->execute()){
               return $stmt->fetch(PDO::FETCH_ASSOC);
           }
           else{
               return false;
           }
       }

        // SELECT de todas las denuncias realizadas por un suscriptor
        public function consultarDenuncias(){
            $stmt = $this->dbh->query(
                "SELECT ID_Denuncia, ID_Suscriptor, descripcionDenuncia, ubicacionDenuncia, municipioDenuncia, solucionado, DATE_FORMAT(fechaDenuncia, '%d-%m-%Y') AS fecha_denuncia
                FROM denuncias 
                ORDER BY ID_Denuncia
                DESC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function consultarDescripcionDen($ID_Denuncia){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Denuncia, ID_Suscriptor, descripcionDenuncia, ubicacionDenuncia, municipioDenuncia, solucionado, DATE_FORMAT(fechaDenuncia, '%d-%m-%Y') AS fecha_denuncia
                FROM denuncias 
                WHERE ID_Denuncia = :ID_DENUNCIA"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_DENUNCIA', $ID_Denuncia, PDO::PARAM_INT);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarImagenePrincipalDenuncias($ID_Suscriptor){
            $stmt = $this->dbh->prepare(
                "SELECT denuncias.ID_Denuncia, ID_imagDenuncia, nombre_imgDenuncia
                FROM denuncias
                INNER JOIN imagenesdenuncias ON denuncias.ID_Denuncia=imagenesdenuncias.ID_Denuncia  
                WHERE ID_Suscriptor = :ID_SUSCRIPTOR AND ImagenPrincipalDenuncia = :IMAGENPRINCIPAL"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);
            $stmt->bindValue(':IMAGENPRINCIPAL', 1, PDO::PARAM_INT);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }  

        // public function consultarImagenPrincipalDen($ID_Denuncia){
        //     $stmt = $this->dbh->prepare(
        //         "SELECT denuncias.ID_Denuncia, ID_imagDenuncia, nombre_imgDenuncia
        //         FROM denuncias
        //         INNER JOIN imagenesdenuncias ON denuncias.ID_Denuncia=imagenesdenuncias.ID_Denuncia  
        //         WHERE denuncias.ID_Denuncia = :ID_DENUNCIA AND ImagenPrincipalDenuncia = :IMAGENPRINCIPAL"
        //     );
            
        //     //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
        //     $stmt->bindParam(':ID_DENUNCIA', $ID_Denuncia, PDO::PARAM_INT);
        //     $stmt->bindValue(':IMAGENPRINCIPAL', 1, PDO::PARAM_INT);
            
        //     if($stmt->execute()){
        //         return $stmt->fetch(PDO::FETCH_ASSOC);
        //     }
        //     else{
        //         return false;
        //     }
        // }
        
        public function consultarDenunciaCantidadImagenes(){
            $stmt = $this->dbh->query(
                "SELECT ID_Denuncia, COUNT(ID_Denuncia) AS cantidad
                FROM imagenesdenuncias 
                GROUP BY ID_Denuncia"
            );
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // CONSULTA el suscriptor que realizo una denuncia
        public function denunciaSuscriptor(){
            $stmt = $this->dbh->query(
                "SELECT ID_Suscriptor, nombreSuscriptor, apellidoSuscriptor
                FROM suscriptores"
            );
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);            
        }

        // INSERT de la denuncia
        public function InsertarDenuncia($ID_Suscriptor, $Descripcion, $Ubicacion, $Municipio){
            $stmt = $this->dbh->prepare(
                "INSERT INTO denuncias (ID_Suscriptor, descripcionDenuncia, ubicacionDenuncia, municipioDenuncia, fechaDenuncia, horaDenuncia) 
                VALUES (:ID_SUSCRIPTOR, :DESCRIPCION, :UBICACION, :MUNICIPIO, CURDATE(), CURTIME())"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_SUSCRIPTOR', $ID_Suscriptor, PDO::PARAM_INT);
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
        
        // SELECT de detalles de una denuncia especifica
        public function consultarDetalleDenuncia($ID_Denuncia){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Denuncia, descripcionDenuncia, ubicacionDenuncia, municipioDenuncia, solucionado, DATE_FORMAT(fechaDenuncia, '%d-%m-%Y') AS fecha_denuncia
                FROM denuncias 
                WHERE ID_Denuncia = :ID_DENUNCIA"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_DENUNCIA', $ID_Denuncia, PDO::PARAM_INT);
            
            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //Se CONSULTA la imagen principal de una denuncia especifica
        public function consultarDenunciaImagenPrincipal($ID_Denuncia){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Denuncia, nombre_imgDenuncia
                FROM imagenesdenuncias  
                WHERE ID_Denuncia = :ID_DENUNCIA AND ImagenPrincipalDenuncia = :IMAGPRINCIPAL"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_DENUNCIA', $ID_Denuncia, PDO::PARAM_INT);
            $stmt->bindValue(':IMAGPRINCIPAL', 1, PDO::PARAM_INT);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //Se CONSULTA laS imagenes secundarias de una denuncia especifica
        public function consultarDenunciaImagenesSecundarias($ID_Denuncia){
            $stmt = $this->dbh->prepare(
                "SELECT ID_imagDenuncia , nombre_imgDenuncia
                FROM imagenesdenuncias  
                WHERE ID_Denuncia = :ID_DENUNCIA AND ImagenPrincipalDenuncia = :IMAGPRINCIPAL"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_DENUNCIA', $ID_Denuncia, PDO::PARAM_INT);
            $stmt->bindValue(':IMAGPRINCIPAL', 0, PDO::PARAM_INT);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        // CONSULTA cuantos dias lleva una denuncia especifica
        public function diasDenunciaActivaEspecifica($ID_Denuncia){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Denuncia, DATEDIFF(CURDATE(), fechaDenuncia) AS dias
                FROM denuncias
                WHERE ID_Denuncia = :ID_DENUNCIA"
            );
            
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_DENUNCIA', $ID_Denuncia, PDO::PARAM_INT);
            
            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //Se CONSULTA la imagen que se solicito en detalles
        public function consultarDetalleImagen($ID_ImagenMiniatura){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_imgDenuncia 
                 FROM imagenesdenuncias  
                 WHERE ID_imagDenuncia  = :ID_IMAGEN"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_IMAGEN', $ID_ImagenMiniatura, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        // CONSULTA el suscriptor que realizo una denuncia especifica
        public function denunciaSuscriptorEspecifica($ID_Denuncia){
            $stmt = $this->dbh->prepare(
                "SELECT suscriptores.ID_Suscriptor, nombreSuscriptor, apellidoSuscriptor
                FROM suscriptores
                INNER JOIN denuncias ON suscriptores.ID_Suscriptor=denuncias.ID_Suscriptor
                WHERE denuncias.ID_Denuncia = :ID_DENUNCIA"
            );
            

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_DENUNCIA', $ID_Denuncia, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }           
        }
    }