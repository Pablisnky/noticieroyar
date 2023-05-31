<?php
    class Borrar_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }
        
        public function seleccionarArtistas(){
            $stmt = $this->dbh->prepare(
                "SELECT *
                 FROM artistas"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function ConsultarAgenda(){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_imagenAgenda
                 FROM agenda 
                 ORDER BY ID_Agenda
                 DESC"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function actualizarProductos(){
            $stmt = $this->dbh->prepare(
                "UPDATE productos
                 SET ID_Suscriptor =  7
                 WHERE ID_Suscriptor = 0"
            );
                        
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        }        

        public function ConsultarImagenes(){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_ImagenEfemeride 
                 FROM imagenesefemerides 
                 ORDER BY ID_ImagenEfemeride 
                 DESC"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        public function ConsultarID_Producto(){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Producto, producto
                 FROM productos 
                 ORDER BY ID_Producto
                 DESC"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function eliminar_DT($ID_Producto){
             //Debido a que $ID_ProductoID_Producto es un array con todos los ID_Producto, deben introducirse una a una mediante un ciclo    
            foreach($ID_Producto as $key)   :
                $stmt = $this->dbh->prepare(
                    "DELETE FROM secciones_productos  
                    WHERE ID_Producto != :ID_PRODUCTO"
                );

                $stmt->bindParam(':ID_PRODUCTO', $key['ID_Producto'], PDO::PARAM_INT);
                $stmt->execute();
            endforeach;
        }        

        public function InsertaDT($ID_Productos){
            foreach($ID_Productos as $Row)   :
                $stmt = $this->dbh->prepare(
                    "INSERT INTO secciones_productos (ID_Producto) 
                    VALUES (:ID_PRODUCTO)"
                );
                $stmt->bindParam(':ID_PRODUCTO', $Row['ID_Producto']);
                
                //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
                $stmt->execute();
            endforeach;
            echo 'EXITO';
        }
        
        //INSERT de artistas
        public function InsertaArtista($Artistas){
            foreach($Artistas as $Row)   :
                $stmt = $this->dbh->prepare(
                    "INSERT INTO suscriptores (nombreSuscriptor, apellidoSuscriptor, municipioSuscriptor, nombre_imagenPortafolio) 
                    VALUES (:NOMBRE_ARTISTA, :APELLIDO_ARTISTA, :MUNICIPIO_ARTISTA, :IMAGEN_ARTISTA)"
                );

                $stmt->bindParam(':NOMBRE_ARTISTA', $Row['nombreArtista']);
                $stmt->bindParam(':APELLIDO_ARTISTA', $Row['apellidoArtista']);
                $stmt->bindParam(':MUNICIPIO_ARTISTA', $Row['municipioArtista']);
                $stmt->bindParam(':IMAGEN_ARTISTA', $Row['imagenArtista']);
                
                //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
                $stmt->execute();
            endforeach;
            echo 'EXITO';
        }

        public function ActualizarPeriodista(){
            $stmt = $this->dbh->prepare(
                "UPDATE agenda
                 SET ID_Periodista = 1"
            );
                        
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        }

        public function Actualizarnoticia(){
            $stmt = $this->dbh->prepare(
                "UPDATE noticias
                 SET ID_Periodista = 1"
            );
                        
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();

        }
    }