<!-- CARGA SDK FONTAWESONE PARA ICONOS DE REDES SOCIALES se uso esta libreria porque los iconos no tienen fondo-->
<script src="https://kit.fontawesome.com/2d6db4c67d.js" crossorigin="anonymous"></script>

<div style="color: white; background-color: black">

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
			<a href="whatsapp://send?text=<?php echo $Datos['detalleObra']['nombreArtista']?>&nbsp;<?php echo $Datos['detalleObra']['apellidoArtista']?>&nbsp;<?php echo $Datos['detalleObra']['nombreObra']?>&nbsp;<?php echo RUTA_URL?>/GaleriaArte_C/detalleObra/<?php echo $Datos['detalleObra']['ID_Obra']?>" data-action="share/whatsapp/share"><i class="fa-brands fa-whatsapp catalogo-RS WHhatsApp-catalogo" style="color: rgba(255, 255, 255, 0.5)"></i></a>
		</div>    
		<div>
			<p style="text-align: center; font-size: 0.7em; color: rgba(255, 255, 255, 0.5)">Compartir</p>
		</div>
	</div> 

	<div class="cont_ObraDetalle--label">
		
		<!-- ICONO FULLSCREEM -->
		<img class="cont_ObraDetalle--fullscreem" id="Abrir" src="<?php echo RUTA_URL . '/public/iconos/fullScreem/outline_open_in_full_white_24dp.png'?>"/>
		
		<!-- ICONO CERARR -->
		<a href="<?php echo RUTA_URL . '/GaleriaArte_C/artistas/' . $Datos['detalleObra']['ID_Artista'];?>"><img class="cont_ObraDetalle--cerrar Default_pointer" id="CerrarVentana" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_close_white_24dp.png'?>"/></a>
	</div>
	

	<div style="background-color: black" id="Miimagen">
	
		<!-- LADO FRONTAL DE TARJETA -->
		<div class="cont_ObraDetalle adelante" id="Cont_PinturaDetalle">
			<?php
				if($Datos['detalleObra']['disponible']){	
					$imagenObra = $Datos['detalleObra']['imagenObra'];
					$nombreObra = $Datos['detalleObra']['nombreObra'];
					$TecnicaObra = $Datos['detalleObra']['tecnicaObra'];
					$MedidaObra = $Datos['detalleObra']['medidaObra'];	
					
					// echo $imagenObra . '<br>';
					// echo $nombreObra . '<br>';
					// echo $TecnicaObra . '<br>';
					// echo $MedidaObra . '<br>';
					// exit;
				}
				else{	?>
					<!-- <label class="disponible">vendido</label> -->
					<?php
				}	
			?>

			<!-- FLECHAS DE AVANCE Y RETROCESO -->
			<img class="Default_pointer cont_ObraDetalle--iconoLeft" onclick="Llamar_detalleObra('<?php echo $Datos['detalleObra']['ID_Obra'];?>','<?php echo $Datos['detalleObra']['ID_Artista'];?>','Retroceder')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_back_ios_white_24dp.png'?>"/>
			
			<img class="Default_pointer cont_ObraDetalle--iconoRight" onclick="Llamar_detalleObra('<?php echo $Datos['detalleObra']['ID_Obra'];?>','<?php echo $Datos['detalleObra']['ID_Artista'];?>','Avanzar')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_forward_ios_white_24dp.png'?>"/>

			<div class="cont_ObraDetalle--img" id="Imagen_Detalle">	
				<!-- IMAGEN OBRA -->
				<img class="imagen_3" src="<?php echo RUTA_URL . "/public/images/galeria/" . $Datos['detalleObra']['ID_Artista'];?>_<?php echo $Datos['detalleObra']['nombreArtista'];?>_<?php echo $Datos['detalleObra']['apellidoArtista'] . "/" . $Datos['detalleObra']['imagenObra'];?>"/>
			
				<!-- BOTON DE GIRO-->
				<img class="Default_pointer" style="background-color: rgba(255, 255, 255, 0.5); text-align: center; display: block; margin-left: 45%; width: 10%; border-radius: 50%" onclick="AtrasTarjeta('Cont_PinturaDetalle')" src="<?php echo RUTA_URL . '/public/iconos/giro/outline_switch_right_black_24dp.png'?>"/>
			</div>
		</div>

		<!-- LADO POSTERIOR DE TARJETA -->
		<div class="atras">
			<!-- LEYENDA -->
			<div class="cont_ObraDetalle--leyenda">
				<h1 class="cont_ObraDetalle--h1"><?php echo $Datos['detalleObra']['nombreObra'];?></h1>
				<p class="cont_ObraDetalle--p1"><?php echo $Datos['detalleObra']['medidaObra'];?></p> 
				<p class="cont_ObraDetalle--p1"><?php echo $Datos['detalleObra']['tecnicaObra'];?></p> 
				<p class="cont_ObraDetalle--p1"><?php echo $Datos['detalleObra']['precioObra'];?></p> 
				<!-- <label class="Default_pointer" onclick="Llamar_carrito('<?php echo $Datos['detalleObra']['ID_Artista']?>','<?php //echo $Datos['detalleObra']['nombreArtista'];?>','<?php //echo $Datos['detalleObra']['apellidoArtista'];?>','<?php //echo $imagenObra?>','<?php //echo $nombreObra?>','<?php //echo $TecnicaObra?>','<?php //echo $MedidaObra?>')"><img style="background-color: black;; padding-left: 3%;" src="<?php //echo RUTA_URL?>/public/iconos/carritoCompras/outline_shopping_cart_white_24dp.png"/></label> -->

				<!-- BOTON DISPONIBLE - VENDIDO -->
				<label class="cont_ObraDetalle--p1 disponible--true">disponible</label>
				 
				<!-- BOTON DE GIRO-->
				<img class="Default_pointer" style="background-color: rgba(255, 255, 255, 0.5); text-align: center; display: block; margin-left: 45%; width: 10%; border-radius: 50%" onclick="FrenteTarjeta('Cont_PinturaDetalle')" src="<?php echo RUTA_URL . '/public/iconos/giro/outline_switch_right_black_24dp.png'?>"/>
			</div>
		</div>
	</div>
</div>

<!-- CARRITO DE COMPRA ALIMENTADO POR A_carrito_V.php-->
<div class="cont_carrito" id="Modal_carrito"></div>
	
<script src="<?php echo RUTA_URL;?>/public/javascript/E_DetalleObra.js?v=<?php echo rand();?>"></script> 
<script src="<?php echo RUTA_URL;?>/public/javascript/A_DetallesObra.js?v=<?php echo rand();?>"></script> 
<script src="<?php echo RUTA_URL;?>/public/javascript/FullScreem.js?v=<?php echo rand();?>"></script> 

</body>
</html>