<?php
//include 'Cl_Conexion.php';

class Cl_Agencias{

   public $cone;

       public function Cl_Agencias($conexion){
            try {
                    //$this->cone = new Cl_Conexion();
                    $this->cone = $conexion;
                } catch (Exception $exc) {
                    echo $exc->getMessage();
                }
            }

   
   

            public function Listar() {
                    try {
                        $sql = "select * v_agencias";
                        //evitamor usar * sql injection
                        return $this->cone->sqlSeleccion($sql);
                    } catch (Exception $exc) {
                        echo $exc->getMessage();
                    }
                }


              function ListarRegistros($condicion) {
                  try {
                       $sql="select * from v_agencias ".$condicion;
                       return $this->cone->sqlSeleccion($sql);
                      }catch (Exception $exc) {
                      echo $exc->getMessage();
                  }
               }   

         

}