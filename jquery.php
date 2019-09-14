<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script src="jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="mijs.js">
</script>
</head>

<body>
 <div id="capa" style="padding: 10px; background-color: #ff8800">Haz clic en un botón</div>
<input id="boton1" type="button" value="Botón A">
<input id="boton2" type="button" value="Botón B" onclick="$('#capa').html('Recibido un clic en el botón <b>B</b>')">
</body>
</html>