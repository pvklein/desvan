<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap-social.css" rel="stylesheet">
</head>
<style>
body{
font-size:20px;
}

.cabecera{
}

.diassemana{
color:black;
vertical-align:middle;
text-align:center;
}

.dias{
color:#999999;
vertical-align:middle;
text-align:center;
}

.diasuni:hover{
border-radius: 10px;
background: #F48FB1;
}

.event{
border-radius: 10px;
background: #BADA55;
}

.prev-month
{
color:#CCCCCC
}

.next-month
{
color:#CCCCCC
}

</style>
<body>
<?php


$diah=date("d");
$mesh=date("m");
$anoh=date("Y");

$meshnombre=date("F");

if ($mesh=="01")
{
$diasmesanterior=31;
}
else
{
$diasmesanterior = cal_days_in_month(CAL_GREGORIAN, $mesh-1, $anoh);
}

$diasmesactual = cal_days_in_month(CAL_GREGORIAN, $mesh, $anoh);

//$dw = date( "w", $timestamp);
$tempDate = ''.$anoh.'-'.$mesh.'-01';
$diadelasemana=date( "w",strtotime($tempDate));
//$diadelasemana=1;
if ($diadelasemana==0)
{
$diasdelante=6;
}
else
{
$diasdelante = $diadelasemana-1;
}

$diainiciomes=$diasmesanterior-$diasdelante+1;

for($i=0; $i<$diasdelante;$i++)
{
	$prevmonth[$i]="prev-month";
	$calendario[$i]=$diainiciomes+$i;
} 
for($j=0; $j<$diasmesactual;$j++)
{
	$prevmonth[$j+$diasdelante]="diasuni";
	$calendario[$j+$diasdelante]=$j+1;
}
for($k=0; $k<42-$diasdelante-$diasmesactual;$k++)
{
	$prevmonth[$k+$diasdelante+$diasmesactual]="prev-month";
	$calendario[$k+$diasdelante+$diasmesactual]=$k+1;
}

//echo "Today is " . $meshnombre;
//echo "Today is " . $calendario[0]." ".$calendario[1]." "." ".$calendario[2];

$dbhost="localhost";  // host del MySQL (generalmente localhost)
$dbusuario="xncompra_pvkf"; // aqui debes ingresar el nombre de usuario
                      // para acceder a la base
$dbpassword="Heroes21"; // password de acceso para el usuario de la
                      // linea anterior
$db="xncompra_fact";        // Seleccionamos la base con la cual trabajar
$conexion = mysql_connect($dbhost, $dbusuario, $dbpassword);
mysql_select_db($db, $conexion);

$cont=1;
$result=mysql_query("SELECT descripcion, dia FROM `calendario` where mes='".$mesh."' and ano='".$anoh."';", $conexion);
				while($row=mysql_fetch_row($result)){
				$dia= $row[1];
				$descripciones[$dia]= $row[0];
				$event[$dia]="event";
				$evento[$dia]="evento";
				$descripcion=$row[0];
				}
?>
<div class="container">

		<div class="calendar" >

							

				<h2 class="mes"><?php echo($meshnombre); ?></h2>

				<a rel="nofollow" class="btn-prev fontawesome-angle-left" href="#"></a>
				<a rel="nofollow" class="btn-next fontawesome-angle-right" href="#"></a>

			
			
			<table width="400">
			
				<thead>
					
					<tr class="diassemana">
						
						<td>Mo</td>
						<td>Tu</td>
						<td>We</td>
						<td>Th</td>
						<td>Fr</td>
						<td>Sa</td>
						<td>Su</td>

					</tr>

				</thead>

				<tbody>
					
					<tr class="dias">
						<td class="<?php echo($prevmonth[0]); ?>  <?php if($prevmonth[0]=="prev-month"){echo("");}else{echo($event[$calendario[0]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[0]]);	 ?>" data-clase="<?php if($prevmonth[0]=="prev-month"){echo("");}else{echo($evento[$calendario[0]]);} ?>"><?php echo($calendario[0]);?></td>
						<td class="<?php echo($prevmonth[1]); ?>  <?php if($prevmonth[1]=="prev-month"){echo("");}else{echo($event[$calendario[1]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[1]]);	 ?>" data-clase="<?php if($prevmonth[1]=="prev-month"){echo("");}else{echo($evento[$calendario[1]]);} ?>"><?php echo($calendario[1]);?></td>
						<td class="<?php echo($prevmonth[2]); ?>  <?php if($prevmonth[2]=="prev-month"){echo("");}else{echo($event[$calendario[2]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[2]]);	 ?>" data-clase="<?php if($prevmonth[2]=="prev-month"){echo("");}else{echo($evento[$calendario[2]]);} ?>"><?php echo($calendario[2]);?></td>
						<td class="<?php echo($prevmonth[3]); ?>  <?php if($prevmonth[3]=="prev-month"){echo("");}else{echo($event[$calendario[3]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[3]]);	 ?>" data-clase="<?php if($prevmonth[3]=="prev-month"){echo("");}else{echo($evento[$calendario[3]]);} ?>"><?php echo($calendario[3]);?></td>
						<td class="<?php echo($prevmonth[4]); ?>  <?php if($prevmonth[4]=="prev-month"){echo("");}else{echo($event[$calendario[4]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[4]]);	 ?>" data-clase="<?php if($prevmonth[4]=="prev-month"){echo("");}else{echo($evento[$calendario[4]]);} ?>"><?php echo($calendario[4]);?></td>
						<td class="<?php echo($prevmonth[5]); ?>  <?php if($prevmonth[5]=="prev-month"){echo("");}else{echo($event[$calendario[5]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[5]]);	 ?>" data-clase="<?php if($prevmonth[5]=="prev-month"){echo("");}else{echo($evento[$calendario[5]]);} ?>"><?php echo($calendario[5]);?></td>
						<td class="<?php echo($prevmonth[6]); ?>  <?php if($prevmonth[6]=="prev-month"){echo("");}else{echo($event[$calendario[6]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[6]]);	 ?>" data-clase="<?php if($prevmonth[6]=="prev-month"){echo("");}else{echo($evento[$calendario[6]]);} ?>"><?php echo($calendario[6]);?></td>
					</tr>
					<tr class="dias">
						<td class="<?php echo($prevmonth[7]); ?>  <?php if($prevmonth[7]=="prev-month"){echo("");}else{echo($event[$calendario[7]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[7]]);	 ?>" data-clase="<?php if($prevmonth[7]=="prev-month"){echo("");}else{echo($evento[$calendario[7]]);} ?>"><?php echo($calendario[7]);?></td>
						<td class="<?php echo($prevmonth[8]); ?>  <?php if($prevmonth[8]=="prev-month"){echo("");}else{echo($event[$calendario[8]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[8]]);	 ?>" data-clase="<?php if($prevmonth[8]=="prev-month"){echo("");}else{echo($evento[$calendario[8]]);} ?>"><?php echo($calendario[8]);?></td>
						<td class="<?php echo($prevmonth[9]); ?>  <?php if($prevmonth[9]=="prev-month"){echo("");}else{echo($event[$calendario[9]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[9]]);	 ?>" data-clase="<?php if($prevmonth[9]=="prev-month"){echo("");}else{echo($evento[$calendario[9]]);} ?>"><?php echo($calendario[9]);?></td>
						<td class="<?php echo($prevmonth[10]); ?>  <?php if($prevmonth[10]=="prev-month"){echo("");}else{echo($event[$calendario[10]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[10]]);	 ?>" data-clase="<?php if($prevmonth[10]=="prev-month"){echo("");}else{echo($evento[$calendario[10]]);} ?>"><?php echo($calendario[10]);?></td>
						<td class="<?php echo($prevmonth[11]); ?>  <?php if($prevmonth[11]=="prev-month"){echo("");}else{echo($event[$calendario[11]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[11]]);	 ?>" data-clase="<?php if($prevmonth[11]=="prev-month"){echo("");}else{echo($evento[$calendario[11]]);} ?>"><?php echo($calendario[11]);?></td>
						<td class="<?php echo($prevmonth[12]); ?>  <?php if($prevmonth[12]=="prev-month"){echo("");}else{echo($event[$calendario[12]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[12]]);	 ?>" data-clase="<?php if($prevmonth[12]=="prev-month"){echo("");}else{echo($evento[$calendario[12]]);} ?>"><?php echo($calendario[12]);?></td>
						<td class="<?php echo($prevmonth[13]); ?>  <?php if($prevmonth[13]=="prev-month"){echo("");}else{echo($event[$calendario[13]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[13]]);	 ?>" data-clase="<?php if($prevmonth[13]=="prev-month"){echo("");}else{echo($evento[$calendario[13]]);} ?>"><?php echo($calendario[13]);?></td>
					</tr>
					<tr class="dias">
						<td class="<?php echo($prevmonth[14]); ?>  <?php if($prevmonth[14]=="prev-month"){echo("");}else{echo($event[$calendario[14]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[14]]);	 ?>" data-clase="<?php if($prevmonth[14]=="prev-month"){echo("");}else{echo($evento[$calendario[14]]);} ?>"><?php echo($calendario[14]);?></td>
						<td class="<?php echo($prevmonth[15]); ?>  <?php if($prevmonth[15]=="prev-month"){echo("");}else{echo($event[$calendario[15]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[15]]);	 ?>" data-clase="<?php if($prevmonth[15]=="prev-month"){echo("");}else{echo($evento[$calendario[15]]);} ?>"><?php echo($calendario[15]);?></td>
						<td class="<?php echo($prevmonth[16]); ?>  <?php if($prevmonth[16]=="prev-month"){echo("");}else{echo($event[$calendario[16]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[16]]);	 ?>" data-clase="<?php if($prevmonth[16]=="prev-month"){echo("");}else{echo($evento[$calendario[16]]);} ?>"><?php echo($calendario[16]);?></td>
						<td class="<?php echo($prevmonth[17]); ?>  <?php if($prevmonth[17]=="prev-month"){echo("");}else{echo($event[$calendario[17]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[17]]);	 ?>" data-clase="<?php if($prevmonth[17]=="prev-month"){echo("");}else{echo($evento[$calendario[17]]);} ?>"><?php echo($calendario[17]);?></td>
						<td class="<?php echo($prevmonth[18]); ?>  <?php if($prevmonth[18]=="prev-month"){echo("");}else{echo($event[$calendario[18]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[18]]);	 ?>" data-clase="<?php if($prevmonth[18]=="prev-month"){echo("");}else{echo($evento[$calendario[18]]);} ?>"><?php echo($calendario[18]);?></td>
						<td class="<?php echo($prevmonth[19]); ?>  <?php if($prevmonth[19]=="prev-month"){echo("");}else{echo($event[$calendario[19]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[19]]);	 ?>" data-clase="<?php if($prevmonth[19]=="prev-month"){echo("");}else{echo($evento[$calendario[19]]);} ?>"><?php echo($calendario[19]);?></td>
						<td class="<?php echo($prevmonth[20]); ?>  <?php if($prevmonth[20]=="prev-month"){echo("");}else{echo($event[$calendario[20]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[20]]);	 ?>" data-clase="<?php if($prevmonth[20]=="prev-month"){echo("");}else{echo($evento[$calendario[20]]);} ?>"><?php echo($calendario[20]);?></td>
					</tr>
					<tr class="dias">
						<td class="<?php echo($prevmonth[21]); ?>  <?php if($prevmonth[21]=="prev-month"){echo("");}else{echo($event[$calendario[21]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[21]]);	 ?>" data-clase="<?php if($prevmonth[21]=="prev-month"){echo("");}else{echo($evento[$calendario[21]]);} ?>"><?php echo($calendario[21]);?></td>
						<td class="<?php echo($prevmonth[22]); ?>  <?php if($prevmonth[22]=="prev-month"){echo("");}else{echo($event[$calendario[22]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[22]]);	 ?>" data-clase="<?php if($prevmonth[22]=="prev-month"){echo("");}else{echo($evento[$calendario[22]]);} ?>"><?php echo($calendario[22]);?></td>
						<td class="<?php echo($prevmonth[23]); ?>  <?php if($prevmonth[23]=="prev-month"){echo("");}else{echo($event[$calendario[23]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[23]]);	 ?>" data-clase="<?php if($prevmonth[23]=="prev-month"){echo("");}else{echo($evento[$calendario[23]]);} ?>"><?php echo($calendario[23]);?></td>
						<td class="<?php echo($prevmonth[24]); ?>  <?php if($prevmonth[24]=="prev-month"){echo("");}else{echo($event[$calendario[24]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[24]]);	 ?>" data-clase="<?php if($prevmonth[24]=="prev-month"){echo("");}else{echo($evento[$calendario[24]]);} ?>"><?php echo($calendario[24]);?></td>
						<td class="<?php echo($prevmonth[25]); ?>  <?php if($prevmonth[25]=="prev-month"){echo("");}else{echo($event[$calendario[25]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[25]]);	 ?>" data-clase="<?php if($prevmonth[25]=="prev-month"){echo("");}else{echo($evento[$calendario[25]]);} ?>"><?php echo($calendario[25]);?></td>
						<td class="<?php echo($prevmonth[26]); ?>  <?php if($prevmonth[26]=="prev-month"){echo("");}else{echo($event[$calendario[26]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[26]]);	 ?>" data-clase="<?php if($prevmonth[26]=="prev-month"){echo("");}else{echo($evento[$calendario[26]]);} ?>"><?php echo($calendario[26]);?></td>
						<td class="<?php echo($prevmonth[27]); ?>  <?php if($prevmonth[27]=="prev-month"){echo("");}else{echo($event[$calendario[27]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[27]]);	 ?>" data-clase="<?php if($prevmonth[27]=="prev-month"){echo("");}else{echo($evento[$calendario[27]]);} ?>"><?php echo($calendario[27]);?></td>
					</tr>

					<tr class="dias">
						<td class="<?php echo($prevmonth[28]); ?>  <?php if($prevmonth[28]=="prev-month"){echo("");}else{echo($event[$calendario[28]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[28]]);	 ?>" data-clase="<?php if($prevmonth[28]=="prev-month"){echo("");}else{echo($evento[$calendario[28]]);} ?>"><?php echo($calendario[28]);?></td>
						<td class="<?php echo($prevmonth[29]); ?>  <?php if($prevmonth[29]=="prev-month"){echo("");}else{echo($event[$calendario[29]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[29]]);	 ?>" data-clase="<?php if($prevmonth[29]=="prev-month"){echo("");}else{echo($evento[$calendario[29]]);} ?>"><?php echo($calendario[29]);?></td>
						<td class="<?php echo($prevmonth[30]); ?>  <?php if($prevmonth[30]=="prev-month"){echo("");}else{echo($event[$calendario[30]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[30]]);	 ?>" data-clase="<?php if($prevmonth[30]=="prev-month"){echo("");}else{echo($evento[$calendario[30]]);} ?>"><?php echo($calendario[30]);?></td>
						<td class="<?php echo($prevmonth[31]); ?>  <?php if($prevmonth[31]=="prev-month"){echo("");}else{echo($event[$calendario[31]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[31]]);	 ?>" data-clase="<?php if($prevmonth[31]=="prev-month"){echo("");}else{echo($evento[$calendario[31]]);} ?>"><?php echo($calendario[31]);?></td>
						<td class="<?php echo($prevmonth[32]); ?>  <?php if($prevmonth[32]=="prev-month"){echo("");}else{echo($event[$calendario[32]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[32]]);	 ?>" data-clase="<?php if($prevmonth[32]=="prev-month"){echo("");}else{echo($evento[$calendario[32]]);} ?>"><?php echo($calendario[32]);?></td>
						<td class="<?php echo($prevmonth[33]); ?>  <?php if($prevmonth[33]=="prev-month"){echo("");}else{echo($event[$calendario[33]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[33]]);	 ?>" data-clase="<?php if($prevmonth[33]=="prev-month"){echo("");}else{echo($evento[$calendario[33]]);} ?>"><?php echo($calendario[33]);?></td>
						<td class="<?php echo($prevmonth[34]); ?>  <?php if($prevmonth[34]=="prev-month"){echo("");}else{echo($event[$calendario[34]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[34]]);	 ?>" data-clase="<?php if($prevmonth[34]=="prev-month"){echo("");}else{echo($evento[$calendario[34]]);} ?>"><?php echo($calendario[34]);?></td>
					</tr>
					<tr class="dias">
						<td class="<?php echo($prevmonth[35]); ?>  <?php if($prevmonth[35]=="prev-month"){echo("");}else{echo($event[$calendario[35]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[35]]);	 ?>" data-clase="<?php if($prevmonth[35]=="prev-month"){echo("");}else{echo($evento[$calendario[35]]);} ?>"><?php echo($calendario[35]);?></td>
						<td class="<?php echo($prevmonth[36]); ?>  <?php if($prevmonth[36]=="prev-month"){echo("");}else{echo($event[$calendario[36]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[36]]);	 ?>" data-clase="<?php if($prevmonth[36]=="prev-month"){echo("");}else{echo($evento[$calendario[36]]);} ?>"><?php echo($calendario[36]);?></td>
						<td class="<?php echo($prevmonth[37]); ?>  <?php if($prevmonth[37]=="prev-month"){echo("");}else{echo($event[$calendario[37]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[37]]);	 ?>" data-clase="<?php if($prevmonth[37]=="prev-month"){echo("");}else{echo($evento[$calendario[37]]);} ?>"><?php echo($calendario[37]);?></td>
						<td class="<?php echo($prevmonth[38]); ?>  <?php if($prevmonth[38]=="prev-month"){echo("");}else{echo($event[$calendario[38]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[38]]);	 ?>" data-clase="<?php if($prevmonth[38]=="prev-month"){echo("");}else{echo($evento[$calendario[38]]);} ?>"><?php echo($calendario[38]);?></td>
						<td class="<?php echo($prevmonth[39]); ?>  <?php if($prevmonth[39]=="prev-month"){echo("");}else{echo($event[$calendario[39]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[39]]);	 ?>" data-clase="<?php if($prevmonth[39]=="prev-month"){echo("");}else{echo($evento[$calendario[39]]);} ?>"><?php echo($calendario[39]);?></td>
						<td class="<?php echo($prevmonth[40]); ?>  <?php if($prevmonth[40]=="prev-month"){echo("");}else{echo($event[$calendario[40]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[40]]);	 ?>" data-clase="<?php if($prevmonth[40]=="prev-month"){echo("");}else{echo($evento[$calendario[40]]);} ?>"><?php echo($calendario[40]);?></td>
						<td class="<?php echo($prevmonth[41]); ?>  <?php if($prevmonth[41]=="prev-month"){echo("");}else{echo($event[$calendario[41]]);} ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo($descripciones[$calendario[41]]);	 ?>" data-clase="<?php if($prevmonth[41]=="prev-month"){echo("");}else{echo($evento[$calendario[41]]);} ?>"><?php echo($calendario[41]);?></td>
					</tr>

				</tbody>

			</table>

		</div> <!-- end calendar -->

	</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body">
        <form>
		  <div class="form-group">
            <h3 class="Cabtaller" id="Cabtaller">Taller:</h3>
            <p class="form-control" id="desc-curso"> Descripción del taller </p>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Email:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Mensaje:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	<script>
 $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var dia = button.data('whatever')
  var recipient = button.data('clase') // Extract info from data-* attributes
  if (recipient !="evento")
  {
  return false;
  }
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + dia)
  modal.find('.Cabtaller').text('Nuevo taller de ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
 </script>
</body>
</html>
