<!-- Alimenta div en detallePintura_V.php mediante AJAX -->
<div class="cont_carrito--principal" >

	<!-- ICONO CERRAR -->
	<a class="cont_ObraDetalle--cerrar" href="<?php echo RUTA_URL . '/GaleriaArte_C/artistas/' . $Datos['id_artista'];?>"><i class="fas fa-times"></i></a>
	
	<h1 class="cont_carrito--h1">Añadiste una obra al carrito de compras</h1>

	<!-- IMAGEN Y LEYENDA -->
	<div class="cont_carrito--flex">
		<div class="cont_carrito--div-1">
			<img class="cont_carrito--img" src="<?php echo RUTA_URL . "/public/images/galeria/" . $Datos['id_artista'];?>_<?php echo $Datos['nombreArtista'];?>_<?php echo $Datos['apellidoArtista'] . "/" . $Datos['nombreImgObra'];?>"/>
		</div>
		<div class="cont_carrito--leyenda">
			<p style="color:white;" class=""><?php echo $Datos['nombre_Pintura'];?></p>
			<p style="color:white;" class=""><?php echo $Datos['tecnica_Pintura'];?></p> 
			<p style="color:white;" class=""><?php echo $Datos['medida_Pintura'];?></p> 
		</div>
	</div>

	<!-- METODO DE PAGO -->
		<P class="" style="color:white; font-size:2em; font-family: Gruppo">Metodos de pago</P>
	<div class="cont_carrito--MetodoPago">
		<div>
			<div class="cont_carrito--MetodoPago--items">
				<input type="radio" name="pago" id="Paypal">
				<label class="cont_carrito--label" for="Paypal">Paypal</label>
			</div>
			<div class="cont_carrito--MetodoPago--items">
				<input type="radio" name="pago" id="Transferencia">
				<label class="cont_carrito--label" for="Transferencia">Transferencia</label>
			</div>
		</div>
		<div>
			<div class="cont_carrito--MetodoPago--items">
				<input type="radio" name="pago" id="PagoMovil">
				<label class="cont_carrito--label" for="PagoMovil">Pago Movil</label>
			</div>
			<div class="cont_carrito--MetodoPago--items">
				<input type="radio" name="pago" id="Criptomoneda">
				<label class="cont_carrito--label" for="Criptomoneda">Criptomoneda (BTC)</label>
			</div>
		</div>
	</div>
	<br>

	<label class="cont_carrito--boton">Comprar ahora</label>
	<label class="cont_carrito--boton" onclick="AlmacenarObra('<?php echo $nombre_ImgPintura;?>', '<?php echo $nombre_Pintura;?>', '<?php echo $tecnica_Pintura;?>', '<?php echo $medida_Pintura;?>')">Añadir otra obra</label>
</div>