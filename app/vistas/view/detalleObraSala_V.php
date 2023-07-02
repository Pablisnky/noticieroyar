<style>
	.cara {
		position: absolute;
		backface-visibility: hidden;
	}
	.cara.detras {
		background-color: black;
		transform: rotateY(180deg);  
		backface-visibility: hidden;
	}
</style>

<div style="color: white; background-color: black; height: 100vh">

	<div class="cont_ObraDetalle--label">
		
		<!-- ICONO FULLSCREEM -->
		<img class="cont_ObraDetalle--fullscreem" id="Abrir" src="<?php echo RUTA_URL . '/public/iconos/fullScreem/outline_open_in_full_white_24dp.png'?>"/>
		
		<!-- ICONO CERARR -->
		<a href="<?php echo RUTA_URL . '/Museo_C/salaExposicion/' . $Datos['detalleObra']['ID_Sala'];?>"><img class="cont_ObraDetalle--cerrar Default_pointer" id="CerrarVentana" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_close_white_24dp.png'?>"/></a>
	</div>
	
	<!-- TARJETA QUE GIRA black-->
	<div id="Miimagen">	
		<div class="carta-box">
			<div class="carta" id="Carta">
				
				<!-- LADO FRONTAL DE TARJETA -->
				<div class="cont_ObraDetalle cara" id="Cont_PinturaDetalle">
					<?php	
                        // $imagenObra = $Datos['detalleObra']['imagenObra'];
                        $nombreObra = $Datos['detalleObra']['nombreImagenSala'];
                        // $TecnicaObra = $Datos['detalleObra']['tecnicaObra'];
                        // $MedidaObra = $Datos['detalleObra']['medidaObra'];		
					?>
					<!-- IMAGEN OBRA -->
					<div class="cont_ObraDetalle--img" id="Imagen_Detalle">	
						<img class="imagen_3" src="<?php echo RUTA_URL . '/public/images/museo/' . $Datos['detalleObra']['ID_Sala'] . '/' . $Datos['detalleObra']['nombreImagenSala'];?>"/>
					</div>

					<!-- BOTONES INFERIORES -->
					<div class="cont_ObraDetalle--iconos">
						<!-- FLECHA DE RETROCESO -->
						<img class="Default_pointer cont_ObraDetalle--iconoLeft" onclick="Llamar_detalleObraSala('<?php echo $Datos['detalleObra']['ID_ImagenSala'];?>','<?php echo $Datos['detalleObra']['ID_Exposicion'];?>','Retroceder')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_back_ios_white_24dp.png'?>"/>

						<!-- BOTON DE GIRO-->
						<img class="cont_ObraDetalle--giro Default_pointer Default_quitarEscritorio" src="<?php echo RUTA_URL . '/public/iconos/giro/outline_switch_right_black_24dp.png'?>" onclick="AtrasTarjeta('Cont_PinturaDetalle')" />
						
						<!-- FLECHA DE AVANCE -->
						<img class="Default_pointer cont_ObraDetalle--iconoRight" onclick="Llamar_detalleObraSala('<?php echo $Datos['detalleObra']['ID_ImagenSala'];?>','<?php echo $Datos['detalleObra']['ID_Exposicion'];?>','Avanzar')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_forward_ios_white_24dp.png'?>"/>
					</div>
				</div>

				<!-- LADO POSTERIOR DE TARJETA -->
				<div class="cont_ObraDetalle--atras cara detras">
					<div class="cont_ObraDetalle--atras-1">
						<h1 class="cont_ObraDetalle--h1"><?php echo $Datos['detalleObra']['nombreObra'];?></h1>
						<!-- <p class="cont_ObraDetalle--p1"><b>Autor: &nbsp;</b> <?php echo $Datos['detalleObra']['nombreSuscriptor'];?> <?php echo $Datos['detalleObra']['apellidoSuscriptor'];?></p>
						<p class="cont_ObraDetalle--p1"><b>Año: &nbsp;</b> <?php echo $Datos['detalleObra']['anioObra'];?></p>
						<p class="cont_ObraDetalle--p1"><b>Dimensiones: &nbsp;</b><?php echo $Datos['detalleObra']['medidaObra'];?></p> 
						<p class="cont_ObraDetalle--p1"><b>Tecnica: &nbsp;</b> <?php echo $Datos['detalleObra']['tecnicaObra'];?></p> 
						<p class="cont_ObraDetalle--p1"><b>Colección: &nbsp;</b><?php echo $Datos['detalleObra']['coleccionObra'];?></p> 
						<p class="cont_ObraDetalle--p1"><b>Descripción: &nbsp;</b><?php echo $Datos['detalleObra']['descripcionObra'];?></p> 
						<p class="cont_ObraDetalle--p1"><b>Precio: &nbsp;</b><?php echo $Datos['detalleObra']['precioDolarObra'];?></p>  -->
					</div>

					<!-- BOTON DE GIRO-->
					<div>
						<img class="cont_ObraDetalle--giro Default_pointer Default_quitarEscritorio" onclick="FrenteTarjeta('Cont_PinturaDetalle')" src="<?php echo RUTA_URL . '/public/iconos/giro/outline_switch_right_black_24dp.png'?>"/>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<script src="<?php echo RUTA_URL;?>/public/javascript/E_DetalleObraSala.js?v=<?php echo rand();?>"></script> 
<script src="<?php echo RUTA_URL;?>/public/javascript/A_DetallesObraSala.js?v=<?php echo rand();?>"></script> 
<script src="<?php echo RUTA_URL;?>/public/javascript/FullScreem.js?v=<?php echo rand();?>"></script> 

</body>
</html>