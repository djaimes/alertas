<!DOCTYPE HTML>
<html>

<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Suscribir</title>
</head>

<body>

    <header class="login">
	    <img src="web/images/logo128.png">
    </header>

    <section class="login">

  	<p id = "nomsis" >Resultados en línea</p>

    <?php
        if ( isset($_REQUEST['error'] ) ){
            switch ($_REQUEST['error']){
                case 1:
                    echo '<p id="error" class="error">Debe proporcionar nombre y correo</p>';
                    break;
                case 2:
                    echo '<p id="error" class="error">proporcione un nombre y correo v&aacute;lidos</p>';
                    break;
                case 3:
                    echo '<p id="error" class="error">Proporcione un correo personal</p>';
                    break;
            }
        }
    ?>
    </section>
    <section class="login">
	    <form id="suscribir" method="POST" action="suscribir.php">
            <label>Nombre</label>
            <input name="nombre" placeholder="primer nombre" autofocus>
            
            <label>Correo</label>
            <input name="correo" type="email" placeholder="correo personal">
            <input id="submit" name="submit" type="submit" value="Suscribir">
        
        </form>
    </section>

    <footer class="login">
    </footer>

</body>

</html>
