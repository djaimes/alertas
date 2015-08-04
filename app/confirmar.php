<?php

$activacion = $_REQUEST['activacion'];

$sql = 'update suscriptores set activo = 1 where codigo="'. $activacion .'"';

require '../lib/db/dbClass.php';
$db = new dbClass();
$rs = $db->query($sql);

if ($rs){

$html = '
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<p>Bienvenido, pronto te estaremos enviando resultados.</p>

</body>
</html>
';
echo $html;
}else{
	echo "Lo sentimos, no es posible activar su cuenta";
}

$db->close();

?>
