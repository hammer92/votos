<?php 

require_once 'grado.php';
/**
* obgeto grupo
*/
class Grupo extends grado
{
	private $ingreso;
	private $consulta1;

	public function grupo_get()
	{
		return $this->resultado();
	}

	public function grupo_setc($consulta='')
	{
		if ($consulta!='') {
			$this->consulta($consulta);
		}else
		{
			$consulta1 = 'SELECT * FROM grupo';
			$this->consulta($consulta1);
		}
	}

	public function grupo_set($id='',$grupo='',$id_grado='',$vot='')
	{
		if ($id!='') {
			$ingreso= "INSERT INTO grupo(cod_grupo,nom_grupo,id_grado,vot_grupo) VALUES ('$id','$grupo','$id_grado','$vot')";
			$this->consulta($ingreso);
		}
	}
	public function grupo_edit($id='',$grupo='',$id_grado='',$vot='')
	{
		# code...
	}
	public function grupo_delete($eliminar='')
	{
		# code...
	}
	public function grado($value='')
	{
		$gradosc='SELECT * FROM grado WHERE idgrado='.$value;
	 	$this->setc($gradosc);
			while ( $row1=$this->get()) {
				
				$grado_nom = $row1['grado'];
				echo "<td>".$grado_nom."</td>";
				
			}
	}

	public function grupo_form($form='',$id='',$grupo='',$id_grado='',$vot='')
	{
		if ($form!='') 
		{ 
				
			echo '<form class="formulario" method="POST" action="vgrupo.php?idedit='.$form.'">';
			echo '<div><label>Codigo Grupo<input type="text" name="edit_id" value="'.$id.'"></label></div>';
			echo '<div><label>Nombre Grupo<input type="text" name="edit_grupo" value="'.$grupo.'"></label></div>';
			echo '<div><label>Nombre Grado</label><select type="select" name="id_edit_grado">';
			$this->setc();			
			while ($row=$this->get()) 
			{
				 echo '<option value="'.$row['idgrado'].'">'.$row['nom_grado'].'</option>';
			}				
			echo '</select></div>';
			echo '<div><label>Votos<input type="text" name="edit_can_vo" value="'.$vot.'"></label></div>';
			echo '<div><input type="submit" value="Editar" name="botton"></div>';
			echo '</form>';
		
		}else
		{
			echo '<form class="formulario" method="POST" action="">';
			echo '<div><label>Codigo Grupo<input type="text" name="id"></label></div>';
			echo '<div><label>Nombre Grupo<input type="text" name="grupo" ></label></div>';
			
			echo '<div><label>Nombre Grado</label><select type="select" name="id_grado" value="6">';
			$this->setc();			
			while ($row=$this->get()) 
			{
				 echo '<option value="'.$row['idgrado'].'">'.$row['nom_grado'].'</option>';
			}				
			echo '</select></div>';
			 
			echo '<div><label>Votos<input type="text" name="can_vo" ></label></div>';
			echo '<div><input type="submit" value="Agregar" name="botton"></div>';
			echo '</form>';
		}
	}
	
}

 ?>