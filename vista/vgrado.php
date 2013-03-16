<?php 
include_once 'index.php';
require_once '../controlador/grado.php';
$grados= new grado();
#agregar grado.
if (isset($_POST['id'])||isset($_POST['grado'])) {
	$id=$_POST['id'];
	$grado=$_POST['grado'];
	$grados->set($id,$grado);
}

#eliminar grado
if (isset($_GET['idelete'])) {
	$grados->delete($_GET['idelete']);
}
 ?>
<!DOCTYPE HTML>
<html>
 <head>
 	<meta charset="utf-8">
 	<title>GRADOS</title>
 </head>
 <body>
 <!-- esto es el formulario de ingreso y edicion-->
<?php 
if (!isset($_GET['idedit'])) 
{
	echo "<div style='width: 389px; margin-left: -353px; height: 259px;'>";
 	 $grados->form();
 	 echo "</div>";
	
	echo "<div class='body'>";

	echo "<table style='width: 515px'>";
				echo "<tr>";
				echo "<td>Codigo Grado</td>"; 		 
				echo "<td>Nombre Grado</td>";
				echo '<td>Eliminar</td>';
				echo '<td>Editar</a></td>';
				echo "</tr>";
	# esto es para ver el listado de grados
	$grados->setc();
	while ($row = $grados->get()) 
	{
	 	echo "<tr>";
		echo "<td>".$row['cod_grado']."</td>"; 		 
	 	echo "<td>".$row['nom_grado']."</td>";
	 	echo '<td><a href="vgrado.php?idelete='.$row['idgrado'].'"><img src=imagenes/eliminar.png style="width: 33px;"></a></td>';
	 	echo '<td><a href="vgrado.php?idedit='.$row['cod_grado'].'"><img src=imagenes/act.png style="width: 33px;"></a></td>';
		echo "</tr>";	 
	}?>
</table></div>

<?php }else
{	
	$editar=$_GET['idedit'];
	$editar_consulta ='SELECT * FROM grado WHERE cod_grado='.$editar;
	$grados->setc($editar_consulta);
	while ($row2 = $grados->get()) 
	{
		$grados->form($editar,$row2['cod_grado'],$row2['nom_grado']); 	  	
 	}
}
if (isset($_POST['edit_grado'])) {
	$grado_edit_id = $_POST['edit_grado'];
	$grados->edit($_GET['idedit'],$grado_edit_id);

}
	  ?>


 </body>
 </html>