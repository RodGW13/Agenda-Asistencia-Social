<?php
include 'menu.php'
?>
<?php
     include 'back-end/entidades/Cl_Conexion.php';
     include 'back-end/entidades/Cl_Tema.php';
$cone = new Cl_Conexion();
$res = 0;     
$sql = "select * from tema";
$reg = $cone->sqlSeleccion($sql);

$sql_ag = "select * from agenda";
$reg_ag = $cone->sqlSeleccion($sql_ag);

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <title>Capredena: Ministerio de Defensa Nacional</title>
            <link href="Content/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" />
            <link href="Content/bootstrap-3.3.7-dist/zabuto_calendar.min.css" rel="stylesheet" />
			        
        <link href="Content/Capredena.CSS/style.css" rel="stylesheet" />
    </head>
    <body class="estiloBody">
        <header >
            <div class="fontsize pull-right">
                <ul>
                    <li class="small"><a data-size="0.8">a</a></li>
                    <li class="medium current"><a data-size="1">a</a></li>
                    <li class="large"><a data-size="1.3">a</a></li>
                </ul>
            </div>
            <h1 class="titulo-header">Área Certificados</h1>
      
        </header>

        <section id="contenidos" class="certificados">
            <div class="breadcrumb">
                <ul class="pull-left">
                   <li>Home <span>/</span></li> 
                   <li>Área Certificados <span>/</span></li>
                </ul>
                <p class="pull-right">
                    Información:
                </p>
                <div class="clearfix"></div>
            </div>

            <div class="row padding-contenidos">

                <div class="row-btns">
                    <a href="#" onclick="window.print();" class="pull-right btn-contenido"> <i class="glyphicon glyphicon glyphicon-print" aria-hidden="true"></i> Imprimir</a>
                    <a href="#" onclick="history.go(-1);" class="pull-right btn-contenido"> <i class="glyphicon glyphicon glyphicon-menu-left" aria-hidden="true"></i> Volver</a>
                </div>
                          
           
            </div>
        </section>

        <!--end contenidos-->

        <div class="modalx" style="visibility: hidden">
            <div class="centerx">
                <img alt="" class="imgx" src="Images/loader.gif" />
            </div>
        </div>
		
		<div class="col-lg-6 formulario" >
		
		<div class="step step-2">
    <div class="col-lg-12">
        <ul class="hora-probable">
            <li>Ingreso de Fechas para asistente social</li>
        </ul>
        <hr/>
    </div>
	<div class="col-lg-6 formulario" >
            <form action="guarda.php" method="get">
            <div class=" col-lg-12 form-group  ">
                <label for="sel2" >Profesional</label>
                <select  id="prof_gua" class="form-control" name="prof_gua">
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
			<div class=" col-lg-12 form-group  ">
			 <label for="sel2" >Ingrese fecha</label>
			<input type="text" name="fecha_agrega">
			<input type="submit" class="btn-contenido pull-right siguiente" value="Guardar fecha">  <i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i> 
</div>

		</form>
		</div>
		</div>
		</div>