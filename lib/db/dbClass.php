<?php
/**
* Conectar base de datos
* 
*/

class dbClass{

   public $mysqli;

   public function __construct(){
      require_once '/var/www/html/jr2015/lib/db/config.php';
	  $this->conectar();
   }

   // Conectar
   public function conectar(){
	  
    $this->mysqli = mysqli_connect(DB_HOST,
                                   DB_USER, 
                                   DB_PASS, 
                                   DB_NAME);
   }

   // Ejecutar query INSERT, UPDATE, DELETE
   public function query($sql){
        $rst = mysqli_query($this->mysqli, $sql);
		return $rst;
   }
   
   // Ejecutar query y devolver como arreglo
   public function ReturnQueryAsArray($sql){      
		 $arreglo = array();
         $rst = $this->query($sql);
         while ($row = mysqli_fetch_array($rst,MYSQL_ASSOC)){
                $arreglo[]=$row;
         }
	     return $arreglo;
   }

   // Cerrar base de datos
   public function close(){
	  mysqli_close($this->mysqli);

   }
}
?>
