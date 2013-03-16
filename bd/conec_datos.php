<?php 
/**
* conexion a base dedatos
*/
abstract class Conexion 
{
	private $conexion;
	private $query;

	abstract protected function get();
	abstract protected function set();
	abstract protected function edit();
	abstract protected function delete();
	 public function abrir_conec()
	 {
	 	include 'datos.php';
		$this->conexion = mysql_connect($server, $user, $pass);
		mysql_select_db($bdatos,$this->conexion);
	 	
	 }

	 public function cerrar_conec()
	 {
	 	$this->conexion= mysql_close();
	 }

	 public function consulta($consulta)
	 {
	 	$this->abrir_conec();
	 	$this->query = mysql_query($consulta, $this->conexion);
	 	$this->cerrar_conec();
	 }

	 public function resultado()
	 {
	 	$this->abrir_conec();
	 	$resul= mysql_fetch_array($this->query) ;
	 	 return $resul; 
		$this->cerrar_conec();	
	 }
}
 