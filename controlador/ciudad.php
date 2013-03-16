<?php 
require_once '../bd/conec_datos.php'; 
/**
* objeto ciudad
*/

class ciudad extends Conexion
{
	private $ingreso;
	private $consulta1;
	 public function get()
	 {
	 	return $this->resultado();
	 }
	public function setc($consulta='')
	 {	   
	 	 if ($consulta!='') {
	 		$this->consulta($consulta); 	
	 	 }else
	 	 {
	 	  	$consulta1 = 'SELECT * FROM ciudad';
		  	$this->consulta($consulta1);  	
	 	 } 	
	 }
	public function set($ingresar='')
	{
		if ($ingresar!='') {
			$ingreso= 'INSERT INTO ciudad(nombre) VALUES ("'.$ingresar.'")';
			$this->consulta($ingreso);
		} 
	}

	public function edit($editar='',$id='')
	{
			
		if ($editar!='') {
			$edit= "UPDATE ciudad SET  nombre='$editar' WHERE id='$id'";
			$this->consulta($edit);
			if ($edit) 
			{
				echo '<script>window.alert("El archivo a sido actualizado con exito!");location.href="vciudad.php";</script>';
			}else 
			{
				echo '<script>window.alert("Error al actalizar el archivo");location.href="vciudad.php";</script>';
			}
		} 
	}
	public function delete($eliminar='')
	{
		if ($eliminar!='') 
		{
			$delete= 'DELETE FROM ciudad WHERE id ='.$eliminar;
			$this->consulta($delete);
			if ($delete) 
			{
				echo '<script>window.alert("El archivo a sido borrado con exito!");location.href="vciudad.php";</script>';
			}else 
			{
				echo '<script>window.alert("Error al borrar el archivo");location.href="vciudad.php";</script>';
			}
		} 
	}
	public function form($edit_nom='',$edit_id='')
	{
		if ($edit_nom!='') {
		echo'<form method="POST" action="vciudad.php?idedit='.$edit_id.'">';
		echo	'<div><h1>editar ciudad</h1></div>';
		echo '<div><label>nombre ciudad<input type="text" name="edit_nom_ciu" value="'.$edit_nom.'""></label></div>';
		echo '<div><input type="submit" value="editar" name="botton"></div>';
		echo '</form>';

			 
		}
	}

}



 