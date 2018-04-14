<?php
include 'menu.php'
?>

<?php
     include 'back-end/entidades/Cl_Conexion.php';
     include 'back-end/entidades/Cl_Tema.php';
     include 'back-end/entidades/Cl_Agencias.php';
$cone = new Cl_Conexion();
$res = 0;     
$sql = "select * from tema";
$reg = $cone->sqlSeleccion($sql);


?>


<?php
//$vardepe = re;
//echo $vardepe;
?>
<div class="step step-1">
    <div class="col-lg-12">
        <ul class="reservar-hora">
            <li>Reservar Hora por: </li>
        </ul>
        <hr/>
    </div>
    <div class="col-lg-12 pasos" >
        <div class="col-lg-4 paso-border " >
            <span>Paso 1</span><br>
            <span>Elegir Dependencia y Profesional</span>
        </div>
        <div class="col-lg-4 paso-sinborder" >
            <span>Paso 2</span><br>
            <span>Agendar Fecha y Hora</span>
        </div>
        <div class="col-lg-4 paso-sinborder">
            <span>Paso 3</span><br>
            <span>Confirmar y Reservar Hora</span>
        </div>
    </div>

    <div class="col-lg-6 formulario" >
        <form role="form" action="pagina2.php" method="get">
            <div class="col-lg-12 form-group ">
                <label for="sel1">Dependencias</label>
                <select  id="sel1d" class="form-control" name="depe">
                    <option>Seleccione</option>
                    <?php
                            $sql_ag = "select * from v_agencia";
                            $reg_ag = $cone->sqlSeleccion($sql_ag);
                            while ($r = mysqli_fetch_array($reg_ag)) {
                                ?>
                                <option value="<?php echo utf8_encode($r[0]); ?>">  <?php echo utf8_encode($r[1]); ?></option>
                            <?php }
							?>
                </select>
            </div>
            <div class=" col-lg-12 form-group  ">
                <label for="sel2" >Profesional</label>
                <select  id="sel2" class="form-control" name="prof">
                    <option>Seleccione</option>
                        <?php
                        $aux = ($sel1==$row[1])?"selected":"";
                        $sql_pr = "select * from usuarios where agen_cod=1";
                        $reg_pr = $cone->sqlSeleccion($sql_pr);                            
                        while ($r = mysqli_fetch_array($reg_pr)) {
                                ?>
                                <option value="<?php echo utf8_encode($r[1]); ?>"><?php echo utf8_encode($r[3]); ?></option>
                            <?php } ?>
                </select>
            </div>
            <div class="col-lg-12  form-group " >
                <label for="sel3">Tema a abordar</label>
                <select class="form-control" id="sel3" name="tema" >
                    <option>Seleccione</option>
					  <?php
                            
                            while ($r = mysqli_fetch_array($reg)) {
                                ?>
                                <option value="<?php echo utf8_encode($r[0]); ?>"><?php echo utf8_encode($r[1]); ?></option>
                            <?php } ?>
                        </select>
            </div>

    </div>
    <div class="col-md-12 botones-foo ter">
        <div class="col-md-6">
            <a href="#" class="pull-left btn-contenido"> <i class="glyphicon glyphicon-menu-left" aria-hidden="true"></i> Volver</a>
        </div>
        <div class="col-md-6">
		<input type="submit" class="btn-contenido pull-right siguiente"value="Continuar al Paso 2>">  <i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i> 
		<a href="#" class="btn-contenido pull-right" > <i class="glyphicon glyphicon-erase"></i> Limpiar</a>
        </div>
    </div>
	</form>
</div>