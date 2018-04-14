
<?php

//include 'back-end/entidades/Cl_Conexion.php';

$fecha= $_POST["fecha"]; 
$temeta= $_POST["tema"]; 
$horas= $_POST["hora"];  

//$cone = new Cl_Conexion();     

     $servidor = "localhost";
     $usuario = "root";
     $pass = "";
     $base = "agenda";
     $cone;

	$conn=new mysqli($servidor,$usuario,$pass,$base);
	
	
     $sql = "UPDATE agenda SET agenda_fecha = '".$fecha."', agenda_hora='".$horas."' tema_cod = '".$temeta."' WHERE  usua_rut=15485435 and agenda_cod=1"; 
	 
	 if($conn->query($sql)===TRUE){
		 echo "Modificado";
	 }
	 else{
		 echo "No se guardo ";
	 }
	 
	 $conn->close();
	 header ("Location: vuelta.php");
?>