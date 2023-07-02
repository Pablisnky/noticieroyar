<?php
    class Museo_C extends Controlador{
        public $ConsultaMuseo_M;

        public function __construct(){
            $this->ConsultaMuseo_M = $this->modelo("Museo_M");

            ocultarErrores();
        }
        
        // Muestra la presentacion de exposicion de cada sala 
        public function index($Bandera = 1){ 

            // CONSULTA detalles generales de cada exposicion
            $Exposiciones = $this->ConsultaMuseo_M->consultarExposiciones();
            
            // CONSULTA numero de obras por cada exposicion
            $NroObras = $this->ConsultaMuseo_M->consultarNroObras();
            
            // CONSULTA los dias que faltan para culminar la exposicion
            $DiasExposicion = $this->ConsultaMuseo_M->consultarDiasExposicion();

            $Datos = [
                'exposiciones' => $Exposiciones,
                'nroObras' => $NroObras,
                'diasExposicion' => $DiasExposicion,
                'bandera' => $Bandera 
            ];

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();

            $this->vista('header/header_museo', $Datos);
            $this->vista('view/museo_V', $Datos);    
        }
        
        // muestra la imagen seleccionada en la miniatura de fotografias del museo
        public function muestraImagenSeleccionada($ID_ImagenMiniatura){
            //Se CONSULTA la imagen que se solicito ver a pantalla completa
            //  $DetalleImagen = $this->ConsultaMuseo_M->consultaImagenFullScreem($ID_ImagenMiniatura);
           
            $Datos = [
                'id_imagenMiniatura' => $ID_ImagenMiniatura,
            ];

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();
            
            $this->vista("view/ajax/A_ImagenMuseoSeleccionada_V", $Datos ); 
        }

        // Muestra las obras de una sala especiica
        public function salaExposicion($ID_Sala){
                   
            $ObrasSala = $this->ConsultaMuseo_M->consultarObrasSalas($ID_Sala);
            
            $Datos = [
                'obrasSala' => $ObrasSala,
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();

            $this->vista('header/header_SinMembrete', $Datos);
            $this->vista('view/salaExposicion_V', $Datos);
        }
        
        public function detalleObra($ID_ImagenSala){
            
            //CONSULTA los detalles de la obra seleccionada
            $Detalle_Obra = $this->ConsultaMuseo_M->consultarObra($ID_ImagenSala);
            
            $Datos = [
                'detalleObra' => $Detalle_Obra
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista("header/header_SinMembrete", $Datos);
            $this->vista("view/detalleObraSala_V", $Datos);
        }
        
        //recorre obra a obra en un slider segun la sala seleccionado
        public function diapositivaObra($ID_ImagenSala, $ID_Exposicion, $Recorrido){
            if($Recorrido == 'Retroceder'){
                // Se consulta el nombre de la imagen anterior que se va amostrar en detalle
                $DiapositivaObra = $this->ConsultaMuseo_M->consultarObraAnterior($ID_ImagenSala, $ID_Exposicion);
            }
            else if($Recorrido == 'Avanzar'){
                // Se consulta el nombre de la imagen posterior que se va amostrar en detalle
                $DiapositivaObra = $this->ConsultaMuseo_M->consultarObraPosterior($ID_ImagenSala, $ID_Exposicion);
            }
            
            //Se CONSULTA un artista especifico
            // $Artistas = $this->ConsultaMuseo_M->ConsultarsArtista($ID_Exposicion);

            $Datos = [
                'diapositivaObra' => $DiapositivaObra,
                // 'artista' => $Artistas
            ];				
                
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            //Si la imagen llegua al extremo izquierdo o derecho, en este caso arrojará un array vacio
            if($DiapositivaObra != Array()){
                // El metodo vista() se encuentra en el archivo app/clases/Controlador.php
                $this->vista('view/ajax/A_detalleObraMuseo_V', $Datos);		
            }
            else{ //Cuando el slider llega a un extremo
     
                //Se consulta cual es el ultimo ID_ImagenSala de la tabla "obra" de un artista especifico
                $UltimoID_Obra = $this->ConsultaMuseo_M->consultarUltimoID_Obra($ID_Exposicion);

                //Se consulta cual es el primer ID_ImagenSala de la tabla "obra" de un artista especifico
                $PrimerID_Obra = $this->ConsultaMuseo_M->consultarprimerID_Obra($ID_Exposicion);

                // Se consulta el nombre de la imagen que se va amostrar en detalle
                $DiapositivaObra = $this->ConsultaMuseo_M->consultarObra($ID_ImagenSala);
                            
                $Datos = [
                    'diapositivaObra' => $DiapositivaObra, 
                    // 'primerID_Obra' =>  $PrimerID_Obra, 
                    // 'ultimoID_Obra' => $UltimoID_Obra
                ];

                // echo '<pre style="color:white">';
                // print_r($Datos);
                // echo '<pre>';
                // exit;

                //Si llega al extremo de lado derecho
                if($UltimoID_Obra['ID_ImagenSala'] == $Datos['diapositivaObra']['ID_ImagenSala']){
                    //Se reconstruye el array $Datos para cambiar el ID_ImagenSala que se debe enviar
                    $DiapositivaObra['ID_ImagenSala'] = $PrimerID_Obra['ID_ImagenSala'];

                    $Datos = [
                        'diapositivaObra' => $PrimerID_Obra,
                        'primerID_Obra' => $PrimerID_Obra, 	
                        // 'artista' => $Artistas,
                    ];
        
                
                    // echo '<pre style="color:white">';
                    // print_r($Datos);
                    // echo '<pre>';
                    // exit;
                    
                    // El metodo vista() se encuentra en el archivo app/clases/Controlador.php
                    $this->vista('view/ajax/A_detalleObraMuseo_V', $Datos);
                }
                //Si llega al extremo de lado izquierdo
                else if($PrimerID_Obra['ID_ImagenSala'] == $Datos['diapositivaObra']['ID_ImagenSala']){
                    
                    $Datos = [
                        'diapositivaObra' => $UltimoID_Obra,
                        'ultimoID_Obra' => $UltimoID_Obra, 		
                        // 'artista' => $Artistas		
                    ];
                            
                    // echo '<pre style="color:yellow">';
                    // print_r($Datos);
                    // echo '<pre>';
                    // exit;
                    
                    // El metodo vista() se encuentra en el archivo app/clases/Controlador.php
                    $this->vista('view/ajax/A_detalleObraMuseo_V', $Datos);
                }
            }
        } 
    }
?>