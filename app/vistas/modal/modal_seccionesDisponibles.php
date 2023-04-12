<!-- Archivo cargado desde Ajax por medio de Llamar_seccionesDisponible en A_AgregarNoticias.js-->
<section class="sectionModal section_10" id="MostrarSeccion">
    <div class="contenedor_24"> 
      	<div class="contenedor_102">
			<h1 class="h1--secciones">Seleccione una seccióneeee</h1>   
        
        	<!-- ICONO CERRAR -->
        	<img class=" cont_modal--cerrar  Default_pointer" style="width: 1em;" id="Cerrar--modal" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>"onclick="CerrarModal()"/>
      	</div>
		<form>
			<div class="contenedor_89">
				<?php      
				$ContadorSeccion = 1;
				//$Datos['seccion'] trae información desde Panel_C/Secciones
				foreach($Datos['secciones'] as $row)  :
						// $ID_Seccion = $row['ID_Seccion']; ?>
						<div class="contInputRadio">
							<input type="checkbox" name="seccion" id="<?php echo 'ContadorSeccion_' . $ContadorSeccion;?>" value="<?php echo $row['seccion']?>" onclick="transferirSeccion(this.form, 'SeccionPublicar')"/>

							<label class="contInputRadio__label" for="<?php echo 'ContadorSeccion_' . $ContadorSeccion;?>"><?php echo $row['seccion'] ?></label>
						</div>
						<?php
					$ContadorSeccion++;
				endforeach;  
				?>  
			</div> 
		</form> 
      <label class="boton" onclick="ConfirmarTrasferir()">Confirmar</label>    
    </div>
</section>    