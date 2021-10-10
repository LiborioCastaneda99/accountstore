<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

    $uploadedFile = '';
    if(!empty($_FILES["file"]["type"])){
        $fileName = time().'_'.$_FILES['file']['name'];
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temporary);
        if(in_array($file_extension, $valid_extensions)){
            $sourcePath = $_FILES['file']['tmp_name'];
            $targetPath = "../pagos/".$fileName;
            $uploadedFile = $fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile = $fileName;
            }
        }
    }
	$datos=array(
		$_POST['nombreProducto'],
		$_POST['documento'],
		$_POST['nombres'],
		$_POST['correo'],
		$_POST['telefono'],
		$_POST['perfiles'],
		$uploadedFile

	);


	echo $obj->guardarClienteNuevo($datos);
	

 ?>