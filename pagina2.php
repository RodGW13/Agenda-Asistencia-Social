<?php
     include 'back-end/entidades/Cl_Conexion.php';
     include 'back-end/entidades/Cl_Tema.php';
$dependencia= $_GET["depe"];  
$profesional= $_GET["prof"];  
$temeta= $_GET["tema"];

$cone = new Cl_Conexion();
$res = 0;     
$sql = "select * from tema";
$reg = $cone->sqlSeleccion($sql);

$sql_ag = "select * from agenda where usua_rut = '".$profesional."'  ";
$reg_ag = $cone->sqlSeleccion($sql_ag);


?>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <title>Capredena: Ministerio de Defensa Nacional</title>
            <link href="Content/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" />
            <link href="Content/bootstrap-3.3.7-dist/zabuto_calendar.min.css" rel="stylesheet" />
			        
        <link href="Content/Capredena.CSS/style.css" rel="stylesheet" />
       
         
         <!--   <link href="Content/Capredena.CSS/screen.css" rel="stylesheet" media="screen" />
            <link href="Content/Capredena.CSS/print.css" rel="stylesheet" media="print" />
            <link href="Content/Capredena.CSS/Custom.css" rel="stylesheet" />  
              -->
        
                <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                <!--[if lt IE 9]>
                    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
           <![endif]-->
          
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

      


<div class="step step-2">
    <div class="col-lg-12">
        <ul class="hora-probable">
            <li>Hora Probable </li>
        </ul>
        <hr/>
    </div>
    <div class="col-md-12 pasos"  >
        <div class="col-md-4 paso-sinborder " >
            <span>Paso 1</span><br>
            <span>Elegir Dependencia y Profesional</span>
        </div>
        <div class="col-md-4 paso-border" >
            <span>Paso 2</span><br>
            <span>Agendar Fecha y Hora</span>
        </div>
        <div class="col-md-4 paso-sinborder" >
            <span>Paso 3</span><br>
            <span>Confirmar y Reservar Hora</span>
        </div>
    </div>

    <div class="col-lg-8  resultados no-padding-right">
        <div class="col-lg-12 busqueda" >
            <p>Resultados de la Búsqueda</p>
        </div>
        <div class="col-lg-4 item-categorias" >
            <div class="col-lg-12 categorias"><p>Dependencias: <?php echo $dependencia ?></p></div>
            <div class="col-lg-12 categorias"><p>Profesional: <?php echo $profesional ?></p></div>
            <div class="col-lg-12 categorias"><p>Tema a abordar: <?php echo $temeta ?></p></div>
        </div>
        <div class="col-lg-8 horas-disponibles table-responsive">
		
        <form action ="pagina3.php" method="get">
		<input type=hidden name ="depa" value=<?php $dependencia?>/>
		<table class="table table-condensed table-bordered">
            <thead class="bg-warning">
                <tr>
                    <th>Horas</th>
					<th>Estado</th>
                    <th>Día</th>
                </tr>                    
            </thead>
            <tbody>
			
			<?php
                            
                            while ($r = mysqli_fetch_array($reg_ag)) {
								
								if ($r[5]==0){
								?>	
								<tr>
								<td> <input type ="text" name ="hora" id="" value=<?php echo utf8_encode($r[2]);?> disabled ></td>
								<?php $var=($r[2]);?>
								<td> <button type="button" name="ha" id="ha" class="btn btn-primary agendar" value=<?php $var=($r[2]);?> ><i class="glyphicon glyphicon-ok"></i></button></th>
								<td>14/11/2017</td>
								</tr> 
								<input type="hidden" name="ho" id="ho"  value=<?php echo $var;?> />
								<?php
								}else{
                                ?>
								 
								<tr>
								<td><?php echo utf8_encode($r[2]); ?></td>
								<td> <button type="button" class="btn btn-warning" disabled><i class="glyphicon glyphicon-remove"></i></button></td>
								<td>14/11/2017</td>
								</tr>
                               
                            <?php }} ?>

            </tbody>
			
        </table>
		
    </div>
	<input type="hidden" name="de" value="<?php echo $dependencia;?>" id="de" />
	<input type="hidden" name="pro" value="<?php echo $profesional;?>" id="pro" />
	<input type="hidden" name="tem" value="<?php echo $temeta;?>" id="tem" />
    </div>
	
    <div class="col-lg-4 calendario no-padding-left">
        <div class="col-lg-12 busqueda" >
            <p>Buscar más horas disponibles</p>
        </div>
        <div class="col-lg-12 no-padding-right no-padding-left" id="calendario-jquery"></div>
     </div>
     <div class="col-md-12 botones-footer">
        <div class="col-md-6">
            <a href="#" class="pull-left btn-contenido  atras"> <i class="glyphicon glyphicon-menu-left" aria-hidden="true"></i> Volver</a>
        </div>
        <div class="col-md-6">
			<!--<a href="pagina3.php" class="btn-contenido pull-right siguiente"> Continuar al Paso 3 <i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i></a>
        
		-->
		<input type="submit" class="btn-contenido pull-right siguiente" value="Continuar al Paso 3>">  <i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i> 
		
		</div>
		
    </div>
	</form>
</div>
<script src="Scripts/jquery-3.2.1.js"></script>
        <script src="Content/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <script src="Scripts/zabuto_calendar.min.js"></script>
        <script src="Scripts/Capredena.Scripts/main.js"></script>
        <script src="Scripts/script-de-estilos.js"></script>
    </body>
</html>