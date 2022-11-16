<?php
    require(RUTA_APP . "/clases/Conexion_BD_contraloria.php");

    class Contraloria_M extends Conexion_BD_contraloria{

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
    }