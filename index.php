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

		<title>Inicio | AccountStoreTv</title>
	</head>
	<body>
		
		<div class="container">

			<?php if(!empty($user) && ($user[5]=='1')): ?>
					<!-- menu -->
					<?php require_once "menu.php";?>
			<?php else: ?>
				<?php require_once "menu.php";?>
			<?php endif; ?>

			<!-- Slider -->
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
					<img src="https://blog.idinbound.com/hs-fs/hubfs/ALTERNATIVA%20SLIDER%20NETFLIX.png?width=1893&name=ALTERNATIVA%20SLIDER%20NETFLIX.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
					<img src="https://blog.idinbound.com/hs-fs/hubfs/ALTERNATIVA%20SLIDER%20NETFLIX.png?width=1893&name=ALTERNATIVA%20SLIDER%20NETFLIX.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
					<img src="https://blog.idinbound.com/hs-fs/hubfs/ALTERNATIVA%20SLIDER%20NETFLIX.png?width=1893&name=ALTERNATIVA%20SLIDER%20NETFLIX.png" class="d-block w-100" alt="...">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>

			<!-- servicios -->
			<hr>
			<h3 class="text-center">Nuestros servicios</h3>
			<div class="row">
				<div class="col-md-3">
					<div class="card mb-3 shadow-sm">
						<img class="bd-placeholder-img card-img-top" src="https://assets.stickpng.com/thumbs/580b57fcd9996e24bc43c529.png"  width="100%" height="210" alt="">
						<div class="card-body"><hr>
						<p class="card-text">This is a wider card with. This content is a little bit longer.</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group mx-auto">
							<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#staticBackdrop">Ver planes</button>
							</div>
							<small class="text-muted">9 mins</small>
						</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card mb-3 shadow-sm">
						<img class="bd-placeholder-img card-img-top" src="https://spng.pngfind.com/pngs/s/394-3944103_amazon-prime-video-logo-png-transparent-png.png"  width="100%" height="210" alt="">
						<div class="card-body"><hr>
						<p class="card-text">This is a wider card with. This content is a little bit longer.</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group mx-auto">
							<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#staticBackdrop">Ver planes</button>
							</div>
							<small class="text-muted">9 mins</small>
						</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card mb-3 shadow-sm">
						<img class="bd-placeholder-img card-img-top" src="https://1000marcas.net/wp-content/uploads/2021/04/Disney-Plus-logo.jpg"  width="100%" height="210" alt="">
						<div class="card-body"><hr>
						<p class="card-text">This is a wider card with. This content is a little bit longer.</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group mx-auto">
							<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#staticBackdrop">Ver planes</button>
							</div>
							<small class="text-muted">9 mins</small>
						</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card mb-3 shadow-sm">
						<img class="bd-placeholder-img card-img-top" src="https://1000marcas.net/wp-content/uploads/2021/04/Disney-Plus-logo.jpg"  width="100%" height="210" alt="">
						<div class="card-body"><hr>
						<p class="card-text">This is a wider card with. This content is a little bit longer.</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group mx-auto">
							<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#staticBackdrop">Ver planes</button>
							</div>
							<small class="text-muted">9 mins</small>
						</div>
						</div>
					</div>
				</div>
			</div>

		</div>


		<!-- modal de servicios -->
		<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Nuestros planes</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
						<!-- <button type="button" class="btn btn-outline-primary">Understood</button> -->
					</div>
				</div>
			</div>
		</div>



		<!-- Optional JavaScript; choose one of the two! -->

		<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
		<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->

		<!-- Option 2: jQuery, Popper.js, and Bootstrap JS
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
		-->
  </body>
</html>