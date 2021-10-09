<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['nombres'],
		$_POST['correo'],
		$_POST['telefono'],
		$_POST['servicio'],
		$_POST['pantalla'],
		$_POST['vlr_servicio'],
		$_POST['correo_cuenta'],
		$_POST['fecha_inicio'],
		$_POST['fecha_fin'],
		$_POST['fecha_pago'],
		$_POST['pagado'],
		$_POST['estado'],
		$_POST['no_pantalla'],
		$_POST['responsable']
	);


	echo $obj->guardarCliente($datos);
	

 ?>