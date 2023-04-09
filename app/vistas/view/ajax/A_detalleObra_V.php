<!-- Archivo llamado via AJAX por medio de la función Llamar_detalleObra() ubicada en detalleObra_V.php reemplaza el contenido del div id="Imagen_Detalle"-->
<?php
	if(!empty($Datos['ultimoID_Obra']['ID_Obra'])){//cuando llega a la primera obra y muestra nuevamente la ultima	
		$ID_MostrarObra = $Datos['ultimoID_Obra']['ID_Obra'];	
		$NombreImgObra = $Datos['ultimoID_Obra']['imagenObra'];
		if($Datos['ultimoID_Obra']['disponible']){	?>
			<label class="disponible disponible--true" onclick="Llamar_carrito()">disponible</label>
			<?php
		}
		else{	?>
			<label class="disponible">vendido</label>
			<?php
		}	
	}
	else if(!empty($Datos['primerID_Obra']['ID_Obra'])){//cuando llega a la ultima cuobraadro y muestra nuevamente el primero		
		$ID_MostrarObra = $Datos['primerID_Obra']['ID_Obra'];	
		$NombreImgObra = $Datos['primerID_Obra']['imagenObra'];
		if($Datos['primerID_Obra']['disponible']){	?>
			<label class="disponible disponible--true" onclick="Llamar_carrito()">disponible</label>
			<?php
		}
		else{	?>
			<label class="disponible">vendido</label>
			<?php
		}	
	}
	else{//Cuando se encuantra entre los cuadros intermedios (Entre el primero y el ultimo)
		$ID_MostrarObra = $Datos['diapositivaObra']['ID_Obra'];
		$NombreImgObra= $Datos['diapositivaObra']['imagenObra'];
		if($Datos['diapositivaObra']['disponible'] == 1){	
			$NombreImgObra = $Datos['diapositivaObra']['imagenObra'];
			$Nombre_Obra = $Datos['diapositivaObra']['nombreObra'];
			$Tecnica_Obra = $Datos['diapositivaObra']['tecnicaObra'];
			$Medida_Obra = $Datos['diapositivaObra']['medidaObra'];	?>
			<label class="disponible disponible--true" onclick="Llamar_carrito('<?php echo $Datos['artista']['ID_Artista'];?>','<?php echo $Datos['artista']['nombreArtista'];?>','<?php echo $Datos['artista']['apellidoArtista'];?>','<?php echo $NombreImgObra?>','<?php echo $Nombre_Obra?>','<?php echo $Tecnica_Obra?>','<?php echo $Medida_Obra?>')">disponible</label>
			<?php
		}
		else{	?>
			<label class="disponible">vendido</label>
			<?php
		}	
	}
?>

<!-- FLECHAS DE AVANCE Y RETROCESO -->
<img class="Default_pointer cont_ObraDetalle--iconoLeft" onclick="Llamar_detalleObra('<?php echo $ID_MostrarObra;?>','<?php echo $Datos['artista']['ID_Artista'];?>','Retroceder')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_back_ios_white_24dp.png'?>"/>

<img class="Default_pointer cont_ObraDetalle--iconoRight" onclick="Llamar_detalleObra('<?php echo $ID_MostrarObra;?>','<?php echo $Datos['artista']['ID_Artista'];?>','Avanzar')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_forward_ios_white_24dp.png'?>"/>

<div class="cont_ObraDetalle--img">	
	<?php				?>
	<!-- IMAGEN OBRA -->
	<div style="height: 98%;" id="Imagen_Detalle">
		<img class="imagen_3" src="<?php echo RUTA_URL. "/public/images/galeria/" . $Datos['artista']['ID_Artista'];?>_<?php echo $Datos['artista']['nombreArtista'];?>_<?php echo $Datos['artista']['apellidoArtista'] . "/" . $Datos['diapositivaObra']['imagenObra'];?>"/>
	</div>
</div>

<!-- LEYENDA -->
<div class="cont_ObraDetalle--leyenda">
	<h1 class="cont_ObraDetalle--h1"><?php echo $Datos['diapositivaObra']['nombreObra'];?></h1>
	<p class="cont_ObraDetalle--p1"><?php echo $Datos['diapositivaObra']['medidaObra'];?></p> 
	<p class="cont_ObraDetalle--p1"><?php echo $Datos['diapositivaObra']['tecnicaObra'];?></p> 
	<p class="cont_ObraDetalle--p1"><?php echo $Datos['diapositivaObra']['precioObra'];?></p> 
	<label class="Default_pointer" onclick="Llamar_carrito('<?php echo $Datos['artista']['ID_Artista']?>','<?php echo $Datos['artista']['nombreArtista'];?>','<?php echo $Datos['artista']['apellidoArtista'];?>','<?php echo $NombreImgObra?>','<?php echo $Nombre_Obra?>','<?php echo $Tecnica_Obra?>','<?php echo $Medida_Obra?>')"><img style="background-color: black;" src="<?php echo RUTA_URL?>/public/iconos/carritoCompras/outline_shopping_cart_white_24dp.png"/></label>
</div>

<script src="<?php echo RUTA_URL;?>/public/javascript/A_DetallesObra.js?v=<?php echo rand();?>"></script> 
