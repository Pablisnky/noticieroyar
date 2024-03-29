<!-- CARGA SDK FONTAWESONE PARA ICONOS DE REDES SOCIALES se uso esta libreria porque los iconos no tienen fondo-->
<script src="https://kit.fontawesome.com/2d6db4c67d.js" crossorigin="anonymous"></script>

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

<div style="color: white; background-color: ;">

	<!-- COMPARTIR REDES SOCIALES -->
	<div class="cont_obra--redesSociales">
		<!-- FACEBOOK -->
		<div class="cont_catalogos--iconos">
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo RUTA_URL;?>/GaleriaArte_C/detalleObra/<?php echo $Datos['detalleObra']['ID_Obra']?>" target="_blank"><i class="fa-brands fa-facebook-f fa-sm catalogo-RS" style="color: rgba(255, 255, 255, 0.5)"></i></a>
		</div>        
		
		<!-- TWITTER -->
		<div class="cont_catalogos--iconos">
			<a href="https://twitter.com/intent/tweet?url=<?php echo RUTA_URL;?>/GaleriaArte_C/detalleObra/<?php echo $Datos['detalleObra']['ID_Obra']?>" target="_blank"><i class="fa-brands fa-twitter catalogo-RS" style="color: rgba(255, 255, 255, 0.5)"></i></a>
		</div>     
		
		<!-- E-MAIL -->
		<div class="cont_catalogos--iconos">
			<a href="#" target="_blank"><i class="fa-regular fa-envelope catalogo-RS" style="color: rgba(255, 255, 255, 0.5)"></i></a>
		</div>      
		
		<!-- WHATSAPP -->
		<div class="whatsapp cont_catalogos--iconos">
			<a href="whatsapp://send?text=<?php echo $Datos['detalleObra']['nombreSuscriptor']?>&nbsp;<?php echo $Datos['detalleObra']['apellidoSuscriptor']?>&nbsp;<?php echo $Datos['detalleObra']['nombreObra']?>&nbsp;<?php echo RUTA_URL?>/GaleriaArte_C/detalleObra/<?php echo $Datos['detalleObra']['ID_Obra']?>" data-action="share/whatsapp/share"><i class="fa-brands fa-whatsapp catalogo-RS WHhatsApp-catalogo" style="color: rgba(255, 255, 255, 0.5)"></i></a>
		</div>    
		<div>
			<p style="text-align: center; font-size: 0.7em; color: rgba(255, 255, 255, 0.5)">Compartir</p>
		</div>
	</div> 

	<div class="cont_ObraDetalle--label">
		
		<!-- ICONO FULLSCREEM -->
		<img class="cont_ObraDetalle--fullscreem" id="Abrir" src="<?php echo RUTA_URL . '/public/iconos/fullScreem/outline_open_in_full_white_24dp.png'?>"/>
		
		<!-- ICONO CERARR -->
		<a href="<?php echo RUTA_URL . '/GaleriaArte_C/artistas/' . $Datos['detalleObra']['ID_Suscriptor'];?>"><img class="cont_ObraDetalle--cerrar Default_pointer" id="CerrarVentana" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_close_white_24dp.png'?>"/></a>
	</div>
	
	<!-- TARJETA QUE GIRA -->
	<div style="background-color: black;" id="Miimagen">	
		<div class="carta-box">
			<div class="carta" id="Carta">
				<!-- LADO FRONTAL DE TARJETA -->
				<div class="cont_ObraDetalle cara" id="Cont_PinturaDetalle">
					<?php
						if($Datos['detalleObra']['disponible']){	
							$imagenObra = $Datos['detalleObra']['imagenObra'];
							$nombreObra = $Datos['detalleObra']['nombreObra'];
							$TecnicaObra = $Datos['detalleObra']['tecnicaObra'];
							$MedidaObra = $Datos['detalleObra']['medidaObra'];	
						}
						else{	?>
							<!-- <label class="disponible">vendido</label> -->
							<?php
						}	
					?>

					<!-- IMAGEN OBRA -->
					<div class="cont_ObraDetalle--img" id="Imagen_Detalle">	
						<img class="imagen_3" src="<?php echo RUTA_URL . "/public/images/galeria/" . $Datos['detalleObra']['ID_Suscriptor'];?>_<?php echo $Datos['detalleObra']['nombreSuscriptor'];?>_<?php echo $Datos['detalleObra']['apellidoSuscriptor'] . "/" . $Datos['detalleObra']['imagenObra'];?>"/>
					</div>
					<div class="cont_ObraDetalle--iconos">
						<!-- FLECHA DE RETROCESO -->
						<img class="Default_pointer cont_ObraDetalle--iconoLeft" onclick="Llamar_detalleObra('<?php echo $Datos['detalleObra']['ID_Obra'];?>','<?php echo $Datos['detalleObra']['ID_Suscriptor'];?>','Retroceder')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_back_ios_white_24dp.png'?>"/>

						<!-- BOTON DE GIRO-->
						<img class="cont_ObraDetalle--giro Default_pointer Default_quitarEscritorio" src="<?php echo RUTA_URL . '/public/iconos/giro/outline_switch_right_black_24dp.png'?>" onclick="AtrasTarjeta('Cont_PinturaDetalle')" />
						
						<!-- FLECHA DE AVANCE -->
						<img class="Default_pointer cont_ObraDetalle--iconoRight" onclick="Llamar_detalleObra('<?php echo $Datos['detalleObra']['ID_Obra'];?>','<?php echo $Datos['detalleObra']['ID_Suscriptor'];?>','Avanzar')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_forward_ios_white_24dp.png'?>"/>
					</div>
				</div>

				<!-- LADO POSTERIOR DE TARJETA -->
				<div class="cont_ObraDetalle--atras cara detras">
					<div>
					<!-- <label class="cont_ObraDetalle--p1 disponible--true">disponible</label> -->
					<h1 class="cont_ObraDetalle--h1"><?php echo $Datos['detalleObra']['nombreObra'];?></h1>
					<p class="cont_ObraDetalle--p1"><b>Autor: </b> Patricia Proaño</p>
					<p class="cont_ObraDetalle--p1"><b>Año: </b> 2022</p>
					<p class="cont_ObraDetalle--p1"><b>Dimensiones: </b><?php echo $Datos['detalleObra']['medidaObra'];?></p> 
					<p class="cont_ObraDetalle--p1"><b>Tecnica: </b> <?php echo $Datos['detalleObra']['tecnicaObra'];?></p> 
					<p class="cont_ObraDetalle--p1"><b>Colección: </b><?php echo $Datos['detalleObra']['precioObra'];?></p> 
					<p class="cont_ObraDetalle--p1"><b>Descripción: </b><?php echo $Datos['detalleObra']['precioObra'];?></p> 
					<p class="cont_ObraDetalle--p1"><b>Precio: </b><?php echo $Datos['detalleObra']['precioObra'];?></p> 
					<label class="boton boton--marg">Comprar</label> 
</div>
<div>
					<!-- BOTON DE GIRO-->
					<img class="cont_ObraDetalle--giro Default_pointer Default_quitarEscritorio" onclick="FrenteTarjeta('Cont_PinturaDetalle')" src="<?php echo RUTA_URL . '/public/iconos/giro/outline_switch_right_black_24dp.png'?>"/></div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<script src="<?php echo RUTA_URL;?>/public/javascript/E_DetalleObra.js?v=<?php echo rand();?>"></script> 
<script src="<?php echo RUTA_URL;?>/public/javascript/A_DetallesObra.js?v=<?php echo rand();?>"></script> 
<script src="<?php echo RUTA_URL;?>/public/javascript/FullScreem.js?v=<?php echo rand();?>"></script> 






</body>
</html>