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
                <div class="row mt-3 col-md-6 mx-auto">
                    <div class="col-md-6">
                        <div class="card mb-6 shadow-sm">
                            <img class="bd-placeholder-img card-img-top" src="https://assets.stickpng.com/thumbs/580b57fcd9996e24bc43c529.png"  width="100%" height="210" alt="">
                            <div class="card-body"><hr>
                            <p class="card-text text-center">Administrar clientes</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group mx-auto">
                                    <a class="btn btn-sm btn-outline-secondary"  href="clientes.php">Ir</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-6 shadow-sm">
                            <img class="bd-placeholder-img card-img-top" src="https://spng.pngfind.com/pngs/s/394-3944103_amazon-prime-video-logo-png-transparent-png.png"  width="100%" height="210" alt="">
                            <div class="card-body"><hr>
                            <p class="card-text text-center">Modificar cliente</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group mx-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#staticBackdrop">Ver planes</button>
                                </div>
                            </div>
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