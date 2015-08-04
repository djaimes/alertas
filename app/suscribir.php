<?php

// Ingresa el correo a la base de datos jr2015

$nombre = $_REQUEST['nombre'];
$correo = $_REQUEST['correo'];

$error = '';

if ( empty($nombre) || empty($correo) ){
    $error = 1; 
} elseif ( !filter_var($correo, FILTER_VALIDATE_EMAIL)){
    $error = 2;
} elseif ( substr($correo, -12) === 'inegi.org.mx' ||
     substr($correo, -12) === 'inegi.gob.mx' ){
    $error = 3;
}

if (!empty($error)){
    header('location: http://palmartec.com/jr2015/index.php?error=' .  $error);
    exit;
}

$activacion = generarCodigo();

$hoy = date("Y-m-d H:i:s");
$sql = 'insert into suscriptores(nombre, correo, alta, codigo)
		 values ("'.$nombre.'","'.$correo.'","' . $hoy . '","'.$activacion.'")';

require '../lib/db/dbClass.php';
$db = new dbClass();
$db->query('set names "utf8"');
$rs = $db->query($sql);
$db->close();


// Enviar correo de bienvenida

$mensaje = '
<!DOCTYPE html>
<body>
<p>
<strong>Estimado(a) '.$nombre.',</strong>
<br><br>
Bienvenido al sistema automatizado de resultados del XXIV Encuentro Cultural, Recreativo y Deportivo 2015. Fase Regional, Campeche.
<br><br>
<a href="http://palmartec.com/jr2015/app/confirmar.php?activacion='.$activacion.'">Confirmar mi registro</a>
</p
</body>
</html>
';

$asunto = "Juegos Regionales 2015";
$cabeceras = "From: juegos.regionales@palmartec.com\n";
$cabeceras .= "MIME-Version: 1.0\n";
$cabeceras .= "Content-Type: text/html; charet=iso-8859-1\n";

mail($correo,  $asunto, $mensaje, $cabeceras);

// Avisar al usuario

$html = '
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<p>En breve te llegar&aacute; un correo para que confirmes tu suscripci&oacute;n.<br>
Si no lo recibes en unos minutos, revisa tu carpeta de SPAM.<br>
Muchas gracias por integrarte a esta comunidad.</p>

</body>
</html>
';

echo $html;

function generarCodigo(){
	$codigo = '';
	$letras = 'abcdefghijklmnopqrstuvwxyz0123456789';

	for ( $i=0; $i<10; ++$i ){
		$codigo .= $letras[rand(0,strlen($letras)-1)];		
	}
return $codigo;
}
?>
