<?php
    class Divisas_C extends Controlador{
        public $ConsultaDivisas_M;
        public $Dolar = 24.81; //se actualiza manualmente el precio del dolar segun tasa del BCV

        public function __construct(){
            $this->ConsultaDivisas_M = $this->modelo("Divisas_M");
            
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

        // Actualiza el precio en Bs de los productos en BD segun el precio del dolar a tasa de BCV
        public function index(){
            //Se consultan los precios en dolares.
            $Precios = $this->ConsultaDivisas_M->ConsultaPrecios();
         
            //Se declara un array donde se almacenaran los precios actualizados de cada producto
            $NuevoPrecioBolivar = [];
            $Intermedio = [];

            foreach($Precios as $Key):
                $ID_Opcion = $Key['ID_Opcion'];
                $PrecioActualBs = ($Key['precioDolar'] * $this->Dolar);

                $Intermedio = ['ID_Opcion' => $ID_Opcion, 'precioActualizadoBs' => $PrecioActualBs];
                array_push($NuevoPrecioBolivar, $Intermedio);
            endforeach;
            
            // echo '<pre>';
            // print_r($NuevoPrecioBolivar);
            // echo '</pre>';
            // exit;

            //Se actualizan los precios de los productos existente en BD
            $this->ConsultaDivisas_M->ActualizarPrecio($NuevoPrecioBolivar);

            echo 'Precio dolar actualizado' . '<br>';            
            echo "<a href='javascript: history.go(-1)'>Regresar</a>";
        }
    }