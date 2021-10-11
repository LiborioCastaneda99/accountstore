<?php
session_start();

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

if (isset($_SESSION['user_id'])) {
  $id_ = $_SESSION['user_id'];
  $tildes = $conexion->query("SET NAMES 'utf8'");
  $sql="SELECT id, nombres, apellidos, correo, password, id_tipo_usuario, estado, fecha_registro
  FROM usuarios WHERE id = $id_";
  $res_login = mysqli_fetch_row(mysqli_query($conexion,$sql));
  $user = null;

  if (count($res_login) > 0) {
    $user = $res_login;
  }
}
$nombre_carpeta = "no_principal";
?>
<!doctype html>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Gemunu+Libre:wght@600&display=swap" rel="stylesheet">
		<?php require_once "scripts.php";?>

		<style>
			body{
				font-family: 'Gemunu Libre', sans-serif;
			}
		</style>

		<title>Mi cuenta | AccountStoreTv</title>
	</head>
	<body>
		
        <?php if(!empty($user) && ($user[5]=='1')): ?>
            
            <div class="container">
					
                <!-- menu -->
                <?php require_once "menu.php";?>

                <!-- servicios -->
                <h3 class="text-center">Administrador</h3>
                <div class="row mt-3 col-md-8 mx-auto">
                    <div class="col-md-6">
                        <div class="card mb-6 shadow-sm">
                            <img class="bd-placeholder-img card-img-top" src="img/user_Plus.png"  width="100%" alt="">
                            <div class="card-body"><hr>
                                <p class="card-text text-center">Administrar clientes</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group mx-auto">
                                        <a class="btn btn-sm btn-block btn-outline-primary"  href="clientes.php">Ir</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted text-center">
                                <?php 
                                    $contarP = mysqli_query($conexion, "SELECT count(id) As contar FROM clientes where estado = 1");
                                    echo "Hay ".mysqli_fetch_row($contarP)[0]. " clientes activos.";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-6 shadow-sm">
                            <img class="bd-placeholder-img card-img-top" src="img/userCheck.png"  width="100%" alt="">
                            <div class="card-body"><hr>
                                <p class="card-text text-center">Clientes por verificar</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group mx-auto">
                                        <a class="btn btn-sm btn-block btn-outline-primary"  href="clientes_verificar.php">Consultar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted text-center">
                                <?php 
                                    $contarP = mysqli_query($conexion, "SELECT count(cuenta_enviada) As contar FROM clientes_nuevos where cuenta_enviada = 0 AND rechazado = 0");
                                    echo "Por verificar hay ".mysqli_fetch_row($contarP)[0]. " clientes.";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        <?php else: ?>
            <?php echo "<script>window.location='index.php';</script>"; ?>
        <?php endif; ?>

  </body>
</html>