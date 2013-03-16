<?php require_once '../controlador/ciudad.php';

$ciudad = new ciudad();
  # agregar ciudad
if (isset($_POST['nom_ciu'])) {
	$ciudad_nom = $_POST['nom_ciu'];
	$ciudad->set($ciudad_nom);
	 
}
#consultar ciudad
$ciudad->setc();

#eliminar ciudad
if (isset($_GET['idelete']))
{
	$ciudad->delete($_GET['idelete']);	 
}
#editar ciudad
if (isset($_GET['idedit'])) {
	$idedit= 'SELECT * FROM CIUDAD WHERE ID='.$_GET['idedit'];
	$ciudad->setc($idedit);
	while ($row = $ciudad->get()) 
	{	 
	$ciudad->form($row['nombre'],$row['id']);
	//echo $row['nombre'];
	}}

if (isset($_POST['edit_nom_ciu'])) {
	$ciudad_edit_nom = $_POST['edit_nom_ciu'];
	$ciudad->edit($ciudad_edit_nom, $_GET['idedit'] );
	 //echo $ciudad_edit_nom;
}
?>
<!DOCTYPE HTML>
<html>
 <head>
 	<meta charset="utf-8">
 	<title>Muestra la Ciudades</title>
 	<!--css-->

 	<!--js-->

 </head>
 <body>
 	<table>
 <?php   
while ($row = $ciudad->get()) 
{
 		echo "<tr>";
		echo "<td>".$row['id']."</td>"; 		 
 		echo "<td>".$row['nombre']."</td>";
 		echo '<td><a href="vciudad.php?idelete='.$row['id'].'"><img src=imagenes/delete.png></a></td>';
 		echo '<td><a href="vciudad.php?idedit='.$row['id'].'"><img src=imagenes/edit.png></a></td>';
		echo "</tr>";

 

}?>

 	</table>

<?php 
if (!isset($_GET['idedit'])) {
 	?> 
<form method='POST' action='vciudad.php'>
	<div><h1>agregar ciudad</h1></div>
	<div><label>nombre ciudad<input type='text' name='nom_ciu'></label></div>
	<div><input type='submit' value='agregar' name='botton'></div>
</form>
 <?php } ?>
 </body>
 </html>


 