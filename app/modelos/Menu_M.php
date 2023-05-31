<?php
    class Menu_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        //Consulta el correo del administrador del sitio web
        public function ConsultaEquipoADN(){
            $stmt = $this->dbh->prepare(
                "SELECT correoAdmin, nombreAdmin, apellidoAdmin, cargoAdmin, telefonoAdmin, imagenPerfilAdmin
                FROM administrador 
                WHERE ID_Administrador IN(3, 2, 1)
                ORDER BY ID_Administrador
                DESC"
            );      

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return 'Existe un fallo en la consulta consultarDenunciaDiaria()'; 
            }
        }        
    }