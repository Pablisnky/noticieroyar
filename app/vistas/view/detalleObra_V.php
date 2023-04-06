<div style="color: white; background-color: black">

	<!-- ICONO FULLSCREEM -->
	<img class="cont_ObraDetalle--label" style="text-align: center; display:inline; margin: auto; width: 1.8em;" id="Abrir" src="<?php echo RUTA_URL . '/public/iconos/fullScreem/outline_open_in_full_white_24dp.png'?>"/>

	<div style="background-color: black" id="Miimagen">
		
        <a href="<?php echo RUTA_URL . '/GaleriaArte_C/artistas/' . $Datos['detalleObra']['ID_Artista'];?>"><img class="Default_pointer" style=" position: fixed; right: 2%; top: 3.3%; width: 40px; height: 40px;" id="CerrarVentana" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_close_white_24dp.png'?>"/></a>

		<div class="cont_ObraDetalle" id="Cont_PinturaDetalle">
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
					?>

					<!-- BOTON DISPONIBLE - VENDIDO -->
					<label class="disponible disponible--true" onclick="Llamar_carrito('<?php echo $Datos['detalleObra']['ID_Artista']?>','<?php echo $Datos['detalleObra']['nombreArtista'];?>','<?php echo $Datos['detalleObra']['apellidoArtista'];?>','<?php echo $imagenObra?>','<?php echo $nombreObra?>','<?php echo $TecnicaObra?>','<?php echo $MedidaObra?>')">disponible</label>
					<?php
				}
				else{	?>
					<label class="disponible">vendido</label>
					<?php
				}	
			?>

			<!-- FLECHAS DE AVANCE Y RETROCESO -->
			<img class="Default_pointer cont_ObraDetalle--iconoLeft" onclick="Llamar_detalleObra('<?php echo $Datos['detalleObra']['ID_Obra'];?>','<?php echo $Datos['detalleObra']['ID_Artista'];?>','Retroceder')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_back_ios_white_24dp.png'?>"/>
			
			<img class="Default_pointer cont_ObraDetalle--iconoRight" onclick="Llamar_detalleObra('<?php echo $Datos['detalleObra']['ID_Obra'];?>','<?php echo $Datos['detalleObra']['ID_Artista'];?>','Avanzar')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_forward_ios_white_24dp.png'?>"/>

			<div class="cont_ObraDetalle--img">		

				<!-- IMAGENES OBRA -->
				<div  style="height: 98%;" id="Imagen_Detalle">
					<img class="imagen_3" src="<?php echo RUTA_URL . "/public/images/galeria/" . $Datos['detalleObra']['ID_Artista'];?>_<?php echo $Datos['detalleObra']['nombreArtista'];?>_<?php echo $Datos['detalleObra']['apellidoArtista'] . "/" . $Datos['detalleObra']['imagenObra'];?>"/>
				</div>
			</div>

			<!-- LEYENDA -->
			<div class="cont_ObraDetalle--leyenda">
				<h1 class="cont_ObraDetalle--h1"><?php echo $Datos['detalleObra']['nombreObra'];?></h1>
				<p class="cont_ObraDetalle--p1"><?php echo $Datos['detalleObra']['medidaObra'];?></p> 
				<p class="cont_ObraDetalle--p1"><?php echo $Datos['detalleObra']['tecnicaObra'];?></p> 
				<p class="cont_ObraDetalle--p1"><?php echo $Datos['detalleObra']['precioObra'];?></p> 
				<label class="Default_pointer" onclick="Llamar_carrito('<?php echo $Datos['detalleObra']['ID_Artista']?>','<?php echo $Datos['detalleObra']['nombreArtista'];?>','<?php echo $Datos['detalleObra']['apellidoArtista'];?>','<?php echo $imagenObra?>','<?php echo $nombreObra?>','<?php echo $TecnicaObra?>','<?php echo $MedidaObra?>')"><img style="background-color: black;" src="<?php echo RUTA_URL?>/public/iconos/carritoCompras/outline_shopping_cart_white_24dp.png"/></label>
				 
			</div>
		</div>		
	</div>
</div>

<!-- CARRITO DE COMPRA ALIMENTADO POR A_carrito_V.php-->
<div class="cont_carrito" id="Modal_carrito"></div>
	
<script src="<?php echo RUTA_URL;?>/public/javascript/A_DetallesObra.js?v=<?php echo rand();?>"></script> 
<!--<script src="<?php echo RUTA_URL;?>/public/javascript/E_Carrito.js?v=<?php echo rand();?>"></script> --> 
<script src="<?php echo RUTA_URL;?>/public/javascript/FullScreem.js?v=<?php echo rand();?>"></script> 

</body>
</html>