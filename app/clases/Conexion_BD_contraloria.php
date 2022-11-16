<?php
    class Conexion_BD_contraloria{
        private $Host_2= DB_HOST_COTRALORIA;
        private $Usuario_2= DB_USUARIO_COTRALORIA;
        private $Password_2= DB_PASSWORD_COTRALORIA;
        private $Nombre_base_2= DB_NOMBRE_COTRALORIA;

        public $dbh_2; //database handler
        private $error;

        print_r($this->Host_2)  . '<br>';
        // print_r($Usuario_2) . '<br>';
        // print_r($Password_2) . '<br>';
        // print_r($Nombre_base_2) . '<br>';

        exit;
        public function __construct(){
            $dsn_2= "mysql:host=" . $this->Host_2 . ";dbname=" . $this->Nombre_base_2;
            $Opciones_2= array(
                PDO::ATTR_PERSISTENT => true,
                // PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING 
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION   //Muestra excepciones en (try catch)
            );
            try{
                $this->dbh_2 = new PDO($dsn_2, $this->Usuario_2, $this->Password_2, $Opciones_2);
                $this->dbh_2->exec("set names utf8");

                print_r($this->dbh_2);
                exit;
            }
            catch(PDOException $exepcion){
                $this->error = $exepcion->getMessage();
                echo 'Error al conectarse con la base de datos: ' . $this->error;
            }
        }
    }    