<?php

$correo = $_REQUEST['correo'];

$sql = 'delete from suscriptores where correo ="'.$correo.'"';;

require '../lib/db/dbClass.php';
$db = new dbClass();
$rs = $db->query($sql);
$db->close();

echo '<p>Ha sido retirado de la lista.<br>';
echo 'Puede suscribirse nuevamente en cualquier momento.<br>';
echo 'Muchas gracias</p>';

?>
