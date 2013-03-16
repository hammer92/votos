<?php 
include_once 'index.php';
require_once '../controlador/grupo.php';
$grupos= new grupo();
#argregar prupo
if (isset($_POST['id'])||isset($_POST['grupo'])||isset($_POST['id_grado'])||isset($_POST['can_vo'])) {
	$grupos->grupo_set($_POST['id'],$_POST['grupo'],$_POST['id_grado'],$_POST['can_vo']);
}
 ?>
 
<body>
<?php 
if (!isset($_GET['idedit'])) 
{
	echo "<div style='width: 389px; margin-left: -353px; height: 259px;'>";
	$grupos->grupo_form();	
	echo "</div>";

	echo "<div class='body'>";

	
	if (!isset($_GET['lista'])) 
	{
		$grupos->setc();
		echo "<table>";
		while ($r=$grupos->get()) 
		{
			echo "<tr class ='galeria'>";
			#echo "<li>".$r['nom_grado']."</li>";
			
            echo '<td><a href="vgrupo.php?lista='.$r['idgrado'].'"><img src="imagenes/ok.png"></a></td>';
            echo '<td style="width: 100px;"><h3>'.$r['nom_grado'].'</h3></td>';
		
			echo "</tr>";
		}
			echo "</table>";
			
	}else
		{

			echo "<table style='width: 555px'>";
			echo '<a href="vgrupo.php" ><img src="imagenes/atras.png" style="width: 25px; margin-left: -40px; margin-top: -17px;"></a><h3 style="margin-top: -23px; width: 15px; height: 15px; margin-left: -11px;">Atras</h3>';
			
				echo "<tr>";
				echo "<td>Codigo Grupo</td>"; 		 
				echo "<td>Nombre Grupo</td>";
				echo "<td>Can. Votos</td>";
				echo '<td>Eliminar</td>';
				echo '<td>Editar</a></td>';
				echo "</tr>";
			$consulta = 'SELECT * FROM grupo WHERE id_grado='.$_GET['lista'];
			$grupos->grupo_setc($consulta);
			while ($row=$grupos->grupo_get())   
				{				
					echo "<tr>";
					echo "<td>".$row['cod_grupo']."</td>"; 		 
					echo "<td>".$row['nom_grupo']."</td>";
					echo "<td>".$row['vot_grupo']."</td>";
					echo '<td><a href="vgrupo.php?idelete='.$row['idgrupo'].'"><img src=imagenes/eliminar.png style="width: 33px;"></a></td>';
					echo '<td><a href="vgrupo.php?idedit='.$row['idgrupo'].'"><img src=imagenes/act.png style="width: 33px;"></a></td>';
					echo "</tr>";
				}
		}	
	

	 	
	
	?>
</table></div>
<?php
}else
{
$editar=$_GET['idedit'];
	$editar_consulta ='SELECT * FROM grupo WHERE idgrupo='.$editar;
	$grupos->grupo_setc($editar_consulta);

	while ($row2 = $grupos->grupo_get()) 
	{
		$grupos->grupo_form($editar,$row2['cod_grupo'],$row2['nom_grupo'],$row2['id_grado'],$row2['vot_grupo']); 	  	
 	}
}
if (isset($_POST['edit_grado'])) {
	$grado_edit_id = $_POST['edit_grado'];
	$grupos->edit($_GET['idedit'],$grado_edit_id);

}
 ?>
</body>
