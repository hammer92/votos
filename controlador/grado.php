<?php 
require_once '../bd/conec_datos.php';

/**
* obgeto grado
*/
class Grado extends Conexion
{
	private $ingreso;
	private $consulta1;
	#funcion que trae los datos de consulta.
	public function get()
	{
		return $this->resultado();
	}
	#funcion que envia selects
	public function setc($consulta='')
	{
		if ($consulta!='') {
			$this->consulta($consulta);
		}else
		{
			$consulta1 = 'SELECT * FROM grado';
			$this->consulta($consulta1);
		}
	}

	#funcion que ingresa los registros
	public function set($id='',$grado='')
	{
		if ($id!='') {
		$ingreso="INSERT INTO grado(cod_grado,nom_grado) VALUES ('$id','$grado')";
		$this->consulta($ingreso);	
		if ($ingreso) 
			{
				echo '<script>window.alert("El archivo a sido ingresado con exito!");location.href="vgrado.php";</script>';
			}else 
			{
				echo '<script>window.alert("Error al ingresar el archivo");location.href="vgrado.php";</script>';
			}	
		}
	}



	#funcion que edita se deve pasar dos instancias
	public function edit($id='',$grado='')
	{
		if ($id!='') 
		{
			$edit = "UPDATE grado SET cod_grado='$id', nom_grado='$grado' WHERE cod_grado='$id'";
			$this->consulta($edit);
			if ($edit) 
			{
				echo '<script>window.alert("El archivo a sido actualizado con exito!");location.href="vgrado.php";</script>';
			}else 
			{
				echo '<script>window.alert("Error al actalizar el archivo");location.href="vgrado.php";</script>';
			}
			
		}
	}
	public function delete($eliminar='')
	{
		if ($eliminar!='') {
				$delete ="DELETE FROM grado WHERE cod_grado=".$eliminar;
				$this->consulta($delete);
			}	
	}
	public function form($form='',$id='',$grado='')
	{
		if ($form!='') {
			echo '<form class="formulario" method="POST" action="vgrado.php?idedit='.$id.'">';
			echo '<div><label>Codigo Grado<input type="text" name="edit_id" value="'.$id.'"></label></div>';
			echo '<div><label>Nombre Grado<input type="text" name="edit_grado" value="'.$grado.'"></label></div>';
			echo '<div><input type="submit" value="editar" name="botton"></div>';
			echo '</form>';
		}else
		{
		echo '<form class="formulario" method="POST" action="">';
		echo '<div><label>Codigo Grado<input type="text" name="id"></label></div>';
		echo '<div><label>Nombre Grado<input type="text" name="grado"></label></div>';
		echo '<div><input type="submit" value="agregar" name="botton"></div>';
		echo '</form>';
		}
	}
}

 ?>