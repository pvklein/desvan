 <?php // Ejemplo aprenderaprogramar.com

// Iremos leyendo línea a línea del fichero.txt hasta llegar al fin (feof($fp))

// fichero.txt tienen que estar en la misma carpeta que el fichero php

// fichero.txt es un archivo de texto normal creado con notepad, por ejemplo.

$fp = fopen("1.html", "r");
$i=0;
while(!feof($fp)) {
	$findme="Nº";
	$linea = fgets($fp);
	$pos=0;
	$pos = strpos($linea, $findme);
	if($pos>0 && $pos<10)
	{
		//echo "linea:".$i." posicion: ".$pos . " ";
		$numero=substr($linea,$pos+3,1);
		$noficina[$i]=$numero;
		//echo($numero);
		//echo($pos);
		//echo("----");
	}
	$i=$i+1;
	//echo $linea . "<br />";
}

//echo("<br>");
//echo("<br>");
//echo("<br>");

$fp = fopen("1.html", "r");
$i=0;
	$avance=0;
	
while(!feof($fp)) {
	$findme="Localizar oficina en plano de situación. Enlace en una nueva ventana";
	$linea = fgets($fp);
	$pos=0;
	$pos = strpos($linea, $findme);
	if($avance>0)
		{
			$avance=$avance+1;
			if($avance==5)
			{
				echo($linea);
				$avance=0;
			}
				
		}
	if($pos>0)
	{
		//echo "linea:".$i." posicion: ".$pos . " ";
		$pos2=strpos($linea,"<br>");
		$dif=$pos2-($pos+82);
		$numero=substr($linea,$pos+82,$dif);
		$ndireccion[$i]=$numero;
		
		echo($numero);
		//echo("-".$dif."-");
		//echo("<br>");
		echo("<br>");
		$avance=$avance+1;
		

	}
	$i=$i+1;
	//echo $linea . "<br />";
}


fclose($fp);

?>

 
