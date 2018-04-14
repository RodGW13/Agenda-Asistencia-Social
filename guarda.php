<?php

$fecha= $_POST["fecha_agrega"];  
$profesional= $_POST["prof_gua"];  
 
     $servidor = "localhost";
     $usuario = "root";
     $pass = "";
     $base = "agenda";
     $cone;

	$conn=new mysqli($servidor,$usuario,$pass,$base);
	

$sql ="insert into agenda (agenda_fecha, agenda_hora, usua_rut, usua_dv, agenda_estado, pers_cod, tema_cod) values ('".$fecha."', '08:00', '".$profesional."', '0', 0, '0', '0'),('".$fecha."', '08:30', '".$profesional."', '0', 0, '0', '0'),('".$fecha."', '09:00', '".$profesional."', '0', 0, '0', '0'), ('".$fecha."', '09:30', '".$profesional."', '0', 0, '0', '0'),('".$fecha."', '10:00', '".$profesional."', '0', 0, '0', '0'),('".$fecha."', '10:30', '".$profesional."', '0', 0, '0', '0'),('".$fecha."', '11:00', '".$profesional."', '0', 0, '0', '0'), ('".$fecha."', '11:30', '".$profesional."', '0', 0, '0', '0'), ('".$fecha."', '12:00', '".$profesional."', '0', 0, '0', '0'), ('".$fecha."', '12:30', '".$profesional."', '0', 0, '0', '0')";	 
	 
	 if($conn->query($sql)===TRUE){
		 echo "Guardado";
	 }
	 else{
		 echo "No se guardo ";
	 }
	 
	 $conn->close();
header ("Location: pagina1.php");
?>