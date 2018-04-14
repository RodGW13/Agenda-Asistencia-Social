<?php
include 'menu.php'
?>
<?php 
$dependencia2= $_GET["de"];  
$profesional= $_GET["pro"];  
$temeta= $_GET["tem"];  
$horas= $_GET["ho"];  
?>
<div class="step step-3">
    <div class="col-md-12 pasos"  >
        <div class="col-md-4 paso-sinborder " >
            <span>Paso 1</span><br>
            <span>Elegir Dependencia y Profesional</span>
        </div>
        <div class="col-md-4 paso-sinborder" >
            <span>Paso 2</span><br>
            <span>Agendar Fecha y Hora</span>
        </div>
        <div class="col-md-4 paso-border" >
            <span>Paso 3</span><br>
            <span>Confirmar y Reservar Hora</span>
        </div>
</div>

    <div class="col-lg-12">
        <h2 class="titulo-cita">DATOS DE LA CITA</h2>
        <div class="col-lg-8 col-lg-offset-2 datos-cita " >
            <p>Dependencia:<?php echo $dependencia2 ?></p>
            <p>Profesional:<?php echo $profesional ?></p>
            <p>Tema:<?php echo $temeta ?></p>
            <p>Fecha:'14/11/2017'</p>
            <p>Hora:<?php echo $horas ?></p>
        </div>
        <form action ="ejecuta.php" method="post">
	<input type="hidden" name="dep" value="<?php echo $dependencia2;?>" id="dep" />
	<input type="hidden" name="prof" value="<?php echo $profesional;?>" id="prof" />
	<input type="hidden" name="temi" value="<?php echo $temeta;?>" id="temi" />
	<input type="hidden" name="fec" value="'14/11/2017'" id="fec" />
	<input type="hidden" name="hora" value="<?php echo $horas;?>" id="hora" />
		
    </div>
    <!--ESTE ES EL DIV DEL CAPTCHA -->
    <div class="col-lg-12">
         <!--<div class="g-recaptcha pull-right " data-sitekey="aquí va la clave que entrega la api"></div>-->
		 <div class="g-recaptcha pull-right" data-sitekey="6LfcXjgUAAAAAPgBCexRgfoz7ql_4T3YWemo23FK"></div>
    </div>
     <!--FIN  DIV DEL CAPTCHA -->
    <div class="col-md-12 botones-footer">
        <div class="col-md-6">
            <a href="#" class="pull-left btn-contenido atras"> <i class="glyphicon glyphicon-menu-left" aria-hidden="true"></i> Volver</a>
        </div>
        <div class="col-md-6">
            <!--<a href="ejecuta.php" class="btn-contenido pull-right "> Confirmar la Reserva de Hora <i class="glyphicon glyphicon-ok" aria-hidden="true"></i></a>
			-->
			<input type="submit" class="btn-contenido pull-right siguiente" value="Confirmar la Reserva de Hora">  <i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i> 
		</form>
		</div>
    </div>
</div>