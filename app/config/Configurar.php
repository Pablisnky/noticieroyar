<?php
//Muestra la ruta raiz donde se encuentra el archivo incluyendo al archivo
// echo __FILE__ . "<br>";

//Muestra la ruta raiz donde se encuentra el archivo
// echo dirname(__FILE__) . "<br>";

//Muestra la ruta raiz donde se encuentra el archivo excluyendo una carpeta
// echo dirname(dirname(__FILE__)) . "<br>";

// ************************************************************************************************
// RUTAS EN LOCAL 
define("RUTA_APP", dirname(dirname(__FILE__)));
define("RUTA_URL", "http://localhost/proyectos/noticieroyaracuy");
define("NOMBRESITIO","noticieroYaracuy");

//CONEXION EN LOCAL NOTICIEROYARACUY
define("DB_HOST","localhost");
define("DB_USUARIO","root");
define("DB_PASSWORD","");
define("DB_NOMBRE","noticieroYaracuy");

// ************************************************************************************************
// ************************************************************************************************
// RUTAS EN REMOTO
// define("RUTA_APP", dirname(dirname(__FILE__)));
// define("RUTA_URL", "https://www.noticieroyaracuy.com");
// define("NOMBRESITIO","NoticieroYaracuy");

// // CONEXION EN REMOTO NOTICIEROYARACUY
// define("DB_HOST","noticieroyaracuy.com");
// define("DB_USUARIO","noticie2_Pa_Cabeza");
// define("DB_PASSWORD","007PHPcake");
// define("DB_NOMBRE","noticie2_not_Yar");