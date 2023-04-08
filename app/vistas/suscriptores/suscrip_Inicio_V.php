<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/suscriptores/panel_suscrip_V.php');?>
    

<div class="cont_suscriptor"> 
    <a class="cont_suscriptor--item borde_1" href="#" rel="noopener noreferrer">
        <div class="contenedor_27">
            <h1 class="cont_suscriptor--h1">Problemas reportados</h1>
            <label class="label_5">0</label>
        </div>       
    </a>

    <a class="cont_suscriptor--item borde_1" href="#" rel="noopener noreferrer">
        <div class="contenedor_27">
            <h1 class="cont_suscriptor--h1">Comentarios realizados</h1>
            <label class="label_5">0</label>
        </div>       
    </a>

    <a class="cont_suscriptor--item borde_1" href="#">
        <div class="contenedor_27">
            <h1 class="cont_suscriptor--h1">Noticias guardadas</h1>
            <label class="label_5">0</label>
        </div>
    </a>

    <a class="cont_suscriptor--item borde_1" href="<?php echo RUTA_URL . '/CuentaComerciante_C/Productos'?>" rel="noopener noreferrer">
        <div class="contenedor_27">
            <h1 class="cont_suscriptor--h1">Clasificados publicados</h1>
            <label class="label_5"><?php echo $Datos['clasificados']['cantidadAnncios'];?></label>
        </div>
    </a>
</div>

<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v=' . rand();?>"></script>      