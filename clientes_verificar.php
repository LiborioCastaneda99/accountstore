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
            .anyClass {
                height:400px;
                overflow-y: scroll;
            }
		</style>

		<title>Clientes Por Verificar | AccountStoreTv</title>
	</head>
	<body>
		
        <?php if(!empty($user) && ($user[5]=='1')): ?>
            
            <div class="container">
					
                <!-- menu -->
                <?php require_once "menu.php";?>

                <div class="row mt-1">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header text-center">
                                Clientes pendiente de verificar
                            </div>
                            <div class="card-body">
                                <div id="tablaDatatable"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal de servicios -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Datos del pago</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="frmDatosCuenta" enctype="multipart/form-data" >                                        
                                <div class="modal-body">
                                        
                                    <div class="anyClass">
                                        <img class="img-fluid" src="" id="imgPago" name="imgPago" width="100%" alt="">
                                    </div>

                                        <input type="hidden" class="form-control input-sm" name="idCliente" id="idCliente">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="submit" class="btn btn-outline-primary btn-sm btn-block" id="bntAprobar">Aprobar pago</button>
                                    <button type="submit" name="rechazar" class="rechazar btn btn-outline-danger btn-sm btn-block" id="btnRechazar">Rechazar pago</button>
                                   
                                </div>
                            </form>                        
                        </div>
                    </div>
                </div>

            </div>
        <?php else: ?>
            <?php echo "<script>window.location='index.php';</script>"; ?>
        <?php endif; ?>

    </body>
</html>

<script type="text/javascript">
 $(document).on('click', '.datos', function () {

    var descr = $(this).attr('data-descr');
    var text = $(this).attr('data-text');
    $('#staticBackdrop #imgPago').attr("src", 'pagos/'+descr);
    $('#staticBackdrop input[name=idCliente]').val(text);

    });

	$(document).ready(function(){
		$('#tablaDatatable').load('tabla_clientes_verificar.php');
	});

    $(document).ready(function(e){
		$("#frmDatosCuenta").on('submit', function(e){
			e.preventDefault();
		
            $.ajax({
            type: 'POST',
            url: 'procesos/actualizarPago.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
                success:function(r){
                    if(r==1){
                        $('#staticBackdrop').modal('toggle');
                        $('#frmDatosCuenta')[0].reset();
                        $('#tablaDatatable').load('tabla_clientes_verificar.php');
                        Swal.fire(
                        'Correcto!',
                        'Se ha aprobado correctamente el pago, deberá mandar la cuenta al cliente en breve!',
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
		});

		$("#frmDatosCuenta").on('click','.rechazar', function(e){
			e.preventDefault();
            
            var idCliente = document.getElementsByName("idCliente")[0].value;

            $.ajax({
                data: {"idCliente" : idCliente},
                type: "POST",
                dataType: "json",
                url: 'procesos/actualizarPagoRechazado.php',
                success:function(r){
                    if(r==1){
                        $('#staticBackdrop').modal('toggle');
                        $('#frmDatosCuenta')[0].reset();
                        $('#tablaDatatable').load('tabla_clientes_verificar.php');
                        Swal.fire(
                        'Correcto!',
                        'Se ha rechazado correctamente debido a que no cuenta con los requisitos correctos!',
                        'error'
                        );
                    }else{
                        Swal.fire(
                        'Error!',
                        'No se ha podido rechazar correctamente!',
                        'error'
                        );
                    }
                }
            });
		});
	});

</script>
