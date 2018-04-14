<?php

class Cl_Conexion {

    public $servidor = "localhost";
    public $usuario = "root";
    public $pass = "";
    public $base = "Agenda";
    public $cone;

    public function Cl_Conexion() {
        if ($this->cone == NULL) {
            $this->cone = mysqli_connect($this->servidor, $this->usuario, $this->pass, $this->base); //-- version servidor
            //$this->cone = mysqlii_connect($this->servidor, $this->usuario, $this->pass);
            // mysqlii_select_db($this->base); -- esto no corre en servidor
        }
    }

    function getConexion() {
            return $this->cone;
    }

    function sqlOperacion($sql) {
        try {
            $resp = mysqli_query($this->cone, $sql); // version servidor
            //$resp = mysqlii_query( $sql,$this->cone) ; 
            return mysqli_affected_rows($this->cone);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    function sqlSeleccion($sql) {
        try {
            $registros = mysqli_query($this->cone, $sql); //-- version servidor
            //$registros = mysqli_query( $sql,$this->cone);
            return $registros;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    function sqlCuantos($sql) {
        try {
            $registros = mysqli_query($this->cone, $sql); //-- version servidor
            //$registros = mysqlii_query($sql, $this->cone);
            return mysqli_num_rows($registros);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

}

?>