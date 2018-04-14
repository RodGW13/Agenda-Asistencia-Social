<?php
     include 'back-end/entidades/Cl_Conexion.php';
     include 'back-end/entidades/Cl_Tema.php';

$cone = new Cl_Conexion();
$res = 0;     

$sql_vuelta = "select * from agenda where agenda_estado=1 and pers_cod=16772259  ";
$reg_vuelta = $cone->sqlSeleccion($sql_vuelta);


?>
<!DOCTYPE html>

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

      


<div class="step step-3">
    <div class="col-lg-12">
       
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
        
        <div class="col-lg-8 horas-disponibles table-responsive">
		
        <form action ="modifica.php" method="get">
		<table class="table table-condensed table-bordered" style="height=200">
            <thead class="bg-warning">
                <tr>
                    <th>Horas</th>
					<th>Estado</th>
                    <th>Día</th>
					<th>Accion</th>
                </tr>                    
            </thead>
			</div>
			<?php
                            
                            while ($r = mysqli_fetch_array($reg_vuelta)) {
								?>	
								<tr>
								<td> <input type ="text" name ="hora" id="" value=<?php echo utf8_encode($r[2]);?> disabled ></td>
								<?php $var=($r[2]);?>
								<td> <input type ="text" name="ha" id="ha" value="Reservada" disabled></th>
								<td>14/11/2017</td>
								<td><a href="modificacita.php">Modificar cita</a></td>
								</tr> 
								<?php
								}
                                ?>

			
        </table>
		
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
    </body>
</html>