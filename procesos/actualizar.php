<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();
	
	$datos=array(
		$_POST['idClienteU'],
		$_POST['nombresU'],
		$_POST['correoU'],
		$_POST['telefonoU'],
		$_POST['servicioU'],
		$_POST['pantallaU'],
		$_POST['vlr_servicioU'],
		$_POST['correo_cuentaU'],
		$_POST['fecha_inicioU'],
		$_POST['fecha_finU'],
		$_POST['fecha_pagoU'],
		$_POST['pagadoU'],
		$_POST['estadoU']
	);


	echo $obj->actualizar($datos);
	

 ?>