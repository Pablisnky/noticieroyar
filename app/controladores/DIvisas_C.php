<?php
    class Divisas_C extends Controlador{

        // public $Dolar;

        public function __construct(){
            // $this->ConsultaMenu_M = $this->modelo("Divisas_M");

            
            //Se conecta a la API de DolarToday para actualizar el valor del dolar
            // $DolarHoy = json_decode(file_get_contents('https://s3.amazonaws.com/dolartoday/data.json'),true);
            // echo '<pre>';
            // print_r($DolarHoy);
            // echo '</pre>';
            // exit;

            // $this->Dolar = $DolarHoy['USD']['promedio_real']; 
            // $this->Dolar = number_format($this->Dolar, 0, '', '');
            // echo $this->Dolar;
            // exit;

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }

        public function index(){
            
            return $Dolar = 25;
        }
    }