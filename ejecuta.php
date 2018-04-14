
<?php

//include 'back-end/entidades/Cl_Conexion.php';

$dependencia2= $_POST["dep"];  
$profesional= $_POST["prof"];  
$temeta= $_POST["temi"]; 
$horas= $_POST["hora"];  

//$cone = new Cl_Conexion();     

     $servidor = "localhost";
     $usuario = "root";
     $pass = "";
     $base = "agenda";
     $cone;

	$conn=new mysqli($servidor,$usuario,$pass,$base);
	
	
     $sql = "UPDATE agenda SET agenda_estado = 1, tema_cod = 6, pers_cod=16772259 WHERE  agenda_fecha = '2017-11-15' and agenda_hora= '12:30' and usua_rut=15485435"; 
	 
	 if($conn->query($sql)===TRUE){
		 echo "Modificado";
	 }
	 else{
		 echo "No se guardo ";
	 }
	 
	 $conn->close();
	 header ("Location: vuelta.php");
?>