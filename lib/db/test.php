<?php
	include_once('dbClass.php');
	$db = new dbClass();

	$sql = 'select nombre, correo from suscriptores';
	$arreglo = $db->ReturnQueryAsArray($sql);
	
	foreach($arreglo as $registro){
		foreach($registro as $key=>$value){
				echo $key ."=>" . $value ."\n";
		}
	}

	$db->close();
?>
