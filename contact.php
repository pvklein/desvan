<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
       
	   <link rel="stylesheet" type="text/css" href="estilo.css">
	   <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
      
      <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
		<script src="http://www.w3schools.com/lib/w3data.js"></script>

        <!--Materializecss Slider-->
        <script>
            $(document).ready(function () {
                $('.slider').slider({full_width: true});
            });
        </script> 
		
		

</head>
<body>

<?php
			// Guardar los datos recibidos en variables
			
			if (isset($_POST["nombre"]))
			{
			
			$nombre = $_POST['nombre'];
			}
			
			if (isset($_POST["email"]))
			{
			
			$email = $_POST['email'];
			}
			
			if (isset($_POST["telefono"]))
			{
			
			$telefono = $_POST['telefono'];
			}
			
			if (isset($_POST["mensaje"]))
			{
			
			$mensaje = $_POST['mensaje'];
			}
			
			$dest = "desvancarol@gmail.com"; 
			$asunto = "Contacto";
			$cuerpo = "Nombre: ".$nombre."<br>";
			$cuerpo .= "Email: ".$email."<br>";
			$cuerpo .= "Telefono: ".$telefono."<br>";
			$cuerpo .= "Mensaje: ".$mensaje;
			
			// Esta es una pequena validación, que solo envie el correo si todas las variables tiene algo de contenido:
		if($nombre != '' && $email != '' && $mensaje != ''){
		    mail($dest,$asunto,$cuerpo,''); //ENVIAR!
		}
		
			
?>


<!--Incluimos la cabecera-->
<div w3-include-html="cabecera.html"></div>
<script>
w3IncludeHTML();
</script> 
	 
	    
    <div class="row">
        <div class="col s2 m2">
        </div>
        <div id="notificacion" class="col s8 m8" align="center">
			El mensaje se ha enviado correctamente!. En breve nos pondremos en contacto con usted!.
        </div>
        <div class="col s2 m2">
        </div>
      </div>

  <div id="cont-cab1" align="center">
		<div id="cont-40p">
	Siguenos en Instagram!!
		</div>
	</div>
  <div class="row">
        <div class="col s10 m10 offset-m1">
  <iframe src="//users.instush.com/h-slider/?cols=7&round=true&circle=false&pin=true&user_id=1280035232&username=eldesvandecarol&sid=-1&susername=-1&tag=-1&stype=mine&t=999999VY3vRnYQIBzPn8eYLZt3E9cENVwd7uW1qPhXvWFl8iDTsI5Rblv6v-Fjg2El9qZbB_CrwGZcHSA" allowtransparency="true" frameborder="0" scrolling="no"  style="display:block;width:1190px;height:190px;border:none;overflow:visible;" ></iframe>
  </div>
  </div>
  
  <div w3-include-html="footer.html"></div>
<script>
w3IncludeHTML();
</script> 

</body>
</html>
