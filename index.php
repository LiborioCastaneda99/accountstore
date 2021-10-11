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

$tildes = $conexion->query("SET NAMES 'utf8'");
$sql_servicios="SELECT `id`, `nombre`, `img`, `fechaRegistro`, img_precios FROM `servicios`";
$res_servicios = mysqli_query($conexion,$sql_servicios);

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
			li{
				list-style: none;
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

			<!-- pasos -->
			<hr>
			<h3 id="pasos" class="text-center">¿Cómo adquirir un servicio?</h3>
			<div class="row text-center mt-3">
				<div class="col-sm-4 mb-3">
					<div class="card  border-danger btn-outline-danger" style="transition: .3s linear;">
						<div class="card-body">
							<h5 class="card-title font-italic" style="font-size:60px;">1</h5>
							<h5>Escoger tipo de cuenta.</h5>
							<p class="" style="font-size:16px;">Se debe escoger el tipo de cuenta que deseas adquirir, ¿Full, Pantalla, Disney + o Amazon Prime Video?.</p>
						</div>
					</div>
				</div> 
				<div class="col-sm-4 mb-3">
					<div class="card  border-danger btn-outline-danger" style="transition: .3s linear;">
						<div class="card-body">
							<h5 class="card-title font-italic" style="font-size:60px;">2</h5>
							<h5>Pagar la suscripción.</h5>
							<p class="" style="font-size:16px;">Una vez elijas el tipo de servicio, debes realizar el pago para la suscripción mensual y subirlo en el seguiente paso.</p>
						</div>
					</div>
				</div> 
				<div class="col-sm-4 mb-3">
					<div class="card  border-danger btn-outline-danger" style="transition: .3s linear;">
						<div class="card-body">
							<h5 class="card-title font-italic" style="font-size:60px;">3</h5>
							<h5>Registrar datos.</h5>
							<p class="" style="font-size:16px;">Luego de realizar el pago, inmediatamente le mostrará un formulario para ingresar los datos solicitados.</p>
						</div>
					</div>
				</div>
				<div class="col-sm-4 mb-3">
					<div class="card  border-danger btn-outline-danger" style="transition: .3s linear;">
						<div class="card-body">
							<h5 class="card-title font-italic" style="font-size:60px;">4</h5>
							<h5>Validación de datos.</h5>
							<p class="" style="font-size:16px;">El sistema y nuestro equipo validarán los datos ingresados en caso de haber un fallo se colocarán en contacto con el usted.</p>
						</div>
					</div>
				</div>
				<div class="col-sm-4 mb-3">
					<div class="card  border-danger btn-outline-danger" style="transition: .3s linear;">
						<div class="card-body">
							<h5 class="card-title font-italic" style="font-size:60px;">5</h5>
							<h5>¡Listo!</h5>
							<p class="" style="font-size:16px;">Luego de cumplir estos sencillos pasos, le llegará un Mensaje a tu WhatsApp o un correo a tu email con los datos de acceso a tu cuenta.</p>
						</div>
					</div>
				</div>
				<div class="col-sm-4 mb-3">
					<div class="card  border-danger btn-outline-danger" style="transition: .3s linear;">
						<div class="card-body">
							<h5 class="card-title font-italic" style="font-size:60px;"><i class="fa fa-clock-o" aria-hidden="true"></i></h5>
							<h5>Duración del proceso.</h5>
							<p class="" style="font-size:16px;">Todo este procedimiento, no tardará mas de 10 minutos, en caso de cualquier inquietud dejenos un mensaje, aprovecha y adquiere tu suscripción.</p>
						</div>
					</div>
				</div>
			</div>
			
			<!-- servicios -->
			<hr>
			<h3 id="servicios" class="text-center">Nuestros servicios</h3>
			<center><button class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#staticBackdrop_">Ver metodos de pagos</button></center>
			<div class="row mt-3">
				<?php
					foreach ($res_servicios as $s) { 
						?>
							<div class="col-md-3">
								<div class="card mb-3 shadow-sm">
									<img class="bd-placeholder-img card-img-top" src="img/<?= $s['img']?>"  width="100%" alt="">
									<div class="card-body"><hr>
									<p class="card-text text-center"><?= $s['nombre']?></p>
									<div class="d-flex justify-content-between align-items-center">
										<div class="btn-group mx-auto">
										<button type="button" class="btn btn-sm btn-outline-primary datos" data-text="<?php echo htmlentities($s['nombre']); ?>" data-descr="<?php echo htmlentities($s['img_precios']); ?>" data-toggle="modal" data-target="#staticBackdrop">Ver planes</button>
										</div>
									</div>
									</div>
								</div>
							</div>
						<?php
					}
				?>
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
						<img class="bd-placeholder-img card-img-top" src="" id="img_flayers" name="img_flayers" width="100%" alt="">
						<p class="font-italic text-center"><b>Nota:</b> Los datos a suministrar deben ser correctos para poder comunicarnos contigo una vez este activa la cuenta.</p>
						<hr>
						<form id="frmDatosCuenta" enctype="multipart/form-data" >
							<div class="row">
								<input type="hidden" class="form-control input-sm" name="nombreProducto" id="nombreProducto">
								<div class="form-group mx-auto col-md-4">
									<label for="inputPantalla">Documento</label>
									<input type="number" min="0" class="form-control input-sm" name="documento" id="documento">
								</div>
								<div class="form-group mx-auto col-md-8">
									<label for="inputPantalla">Nombres</label>
									<input type="text" class="form-control input-sm" name="nombres" id="nombres">
								
								</div>
								<div class="form-group mx-auto col-md-7">
									<label for="inputPantalla">Correo</label>
									<input type="text" class="form-control input-sm" name="correo" id="correo">
								</div>
								<div class="form-group mx-auto col-md-5">
									<label for="inputPantalla">Numero WhatsApp</label>
									<input type="number" min="0" class="form-control input-sm" name="telefono" id="telefono">
								</div>
								<div class="form-group mx-auto col-md-4">
									<label for="inputPantalla">Cantidad de perfiles</label>
									<select class="form-control input-sm" name="perfiles" id="perfiles">
										<option value="" selected="" disabled="">Seleccione...</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
									</select>
								</div>
								<div class="form-group mx-auto col-md-8">
									<label for="inputPantalla">Comprobante de pago</label>
									<input type="file" class="form-control input-sm" name="file" id="file">
								</div>
								<div class="form-group mx-auto col-md-12">
									<button type="submit" name="submit" class="btn btn-outline-primary btn-sm btn-block" id="bntComprar">Comprar</button>
								</div>
							</div>
						</form>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>


		<!-- modal de servicios -->
		<div class="modal fade" id="staticBackdrop_" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Metodos de pagos</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						
					<div class="">
						<p class="card-text font-italic">Es importante tener en cuenta que antes de registrar los datos, debes escojer el metodo de pago por el cual deseas comprar tu suscripción.</p> 
						<ul>
							<li>❇️ <strong>Efecty o cualquier otro punto fijo</strong><br> Liborio Castañeda  - Cc 1045173046<br> Lorenzo Yanet  - Cc 1140902526<br> <em>(costo del envío por separado)</em></li><br>
							<li>❇️ <strong>Nequi:</strong> 3045985632 - 3043355645</li><br>
							<li>❇️ <strong>Daviplata:</strong>  3045985632 - 3043355645</li><br>
							<li>❇️ <strong>Cuenta de ahorros Bancolombia:</strong>  77591585269 - 03135389204  <br><em>(Solo transferencias desde cuentas Bancolombia, por la página web de Bancolombia o por la app) </em>  ¡IMPORTANTE!</li><br>
							<li>❇️ <strong>Cuenta de Ahorros Davivienda:</strong> 156000755074</li><br>
							<li>❇️ <strong>Titular de las cuentas Bancarias:</strong><br>Liborio Castañeda - CC. 1045173046<br>Lorenzo Yanet - CC. 1140902526</li><br>
						</ul>
					</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>

  </body>
</html>
<script>
    $(document).on('click', '.datos', function () {

        var descr = $(this).attr('data-descr');
        var text = $(this).attr('data-text');
        $('#staticBackdrop #img_flayers').attr("src", 'img/'+descr);
		$('#staticBackdrop input[name=nombreProducto]').val(text);
    
	});

	$(document).ready(function(e){
		$("#frmDatosCuenta").on('submit', function(e){
			e.preventDefault();
		
			var nombreProducto = document.getElementsByName("nombreProducto")[0].value;
			var documento = document.getElementsByName("documento")[0].value;
			var nombres = document.getElementsByName("nombres")[0].value;
			var correo = document.getElementsByName("correo")[0].value;
			var telefono = document.getElementsByName("telefono")[0].value;
			var perfiles = document.getElementsByName("perfiles")[0].value;
			var file = document.getElementsByName("file")[0].value;

			if ((nombreProducto == "")|| (documento == "")|| (nombres == "")|| (correo == "")|| (telefono == "")|| (perfiles == "")|| (file == "")) { 
				Swal.fire({
				icon: 'error',
				text: 'Por favor revisar, hay campos vacidos.',
				showConfirmButton: false,
				timer: 1500
				})
			}else{
				$.ajax({
				type: 'POST',
				url: 'procesos/guardarClienteNuevo.php',
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
					success:function(r){
						if(r==1){

							$.ajax({
								data: {"nombres" : nombres, "nombreProducto" : nombreProducto},
								type: "POST",
								dataType: "json",
								url: 'procesos/ejecutarWhatsApp.php',
							});

							$('#staticBackdrop').modal('toggle');
							$('#frmDatosCuenta')[0].reset();
							Swal.fire(
							'Correcto!',
							'Se ha enviado correctamente, en menos de 5min será enviada su cuenta, una vez el team verifique su pago!',
							'success'
							);
						}else{
							Swal.fire(
							'Error!',
							'No se ha podido enviar sus datos correctamente!',
							'error'
							);
						}
					}
				});
			}
		});
	});

</script>