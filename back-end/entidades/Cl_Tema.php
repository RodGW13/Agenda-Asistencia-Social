<?php
//include 'Cl_Conexion.php';

class Cl_Tema{

   public $cone;

       public function Cl_Tema($conexion){
            try {
                    //$this->cone = new Cl_Conexion();
                    $this->cone = $conexion;
                } catch (Exception $exc) {
                    echo $exc->getMessage();
                }
            }

   
   

            public function Listar() {
                    try {
                        $sql = "select * from tema";
                        //evitamor usar * sql injection
                        return $this->cone->sqlSeleccion($sql);
                    } catch (Exception $exc) {
                        echo $exc->getMessage();
                    }
                }


              function ListarRegistros($condicion) {
                  try {
                       $sql="select * from tema ".$condicion;
                       return $this->cone->sqlSeleccion($sql);
                      }catch (Exception $exc) {
                      echo $exc->getMessage();
                  }
               }   

         

}