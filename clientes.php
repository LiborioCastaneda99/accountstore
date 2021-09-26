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

		<title>Clientes | AccountStoreTv</title>
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
                                Clientes con servicio
                            </div>
                            <div class="card-body">
                                <span class="btn btn-outline-primary btn-block" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
                                    <span class="fa fa-plus-square-o"></span> Agregar nuevo cliente 
                                </span>
                                <hr>
                                <div id="tablaDatatable"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Agregar-->
                <div class="modal fade bd-example-modal-lg" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agrega nuevo curso</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form id="frmnuevo">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputNombres4">Nombres</label>
                                            <input type="text" class="form-control input-sm" id="nombres" name="nombres" required="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputcorreo4">Correo</label>
                                            <input type="email" class="form-control input-sm" id="correo" name="correo" required="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputGrupo4">Telefono</label>
                                            <input type="number" class="form-control input-sm" id="telefono" name="telefono" required="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="inputJornada4">Servicio</label>
                                            <select class="form-control input-sm" name="servicio" id="servicio">
                                                <option value="" selected="" disabled="">Seleccione...</option>
                                                <option value="NETFLIX">NETFLIX</option>
                                                <option value="AMAZON">AMAZON</option>
                                                <option value="DISNEY">DISNEY</option>
                                                <option value="HBO">HBO</option>
                                                <option value="SPOTIFY">SPOTIFY</option>
                                                <option value="YOUTUBE">YOUTUBE</option>
                                                <option value="DIRECTV GO">DIRECTV GO</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputHorario4">Pantalla</label>
                                            <select class="form-control input-sm" name="pantalla" id="pantalla">
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
                                        <div class="form-group col-md-2">
                                            <label for="inputHorario4">No. Pantalla</label>
                                            <select class="form-control input-sm" name="No_pantalla" id="No_pantalla">
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
                                        <div class="form-group col-md-2">
                                            <label for="inputIntensidad4">Valor Servicio</label>
                                            <input type="number" class="form-control input-sm" id="vlr_servicio" name="vlr_servicio" required="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputIntensidad4">Correo cuenta</label>
                                            <input type="email" class="form-control input-sm" id="correo_cuenta" name="correo_cuenta" required="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputFecha4">Fecha Inicio</label>
                                            <input type="date" class="form-control input-sm" name="fecha_inicio"  id="fecha_inicio" required="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputFecha4">Fecha Fin</label>
                                            <input type="date" class="form-control input-sm" name="fecha_fin"  id="fecha_fin" required="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputFecha4">Fecha Pago</label>
                                            <input type="date" class="form-control input-sm" name="fecha_pago"  id="fecha_pago" required="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputFecha4">Pagado</label>
                                            <select class="form-control input-sm" name="pagado" id="pagado">
                                                <option value="" selected="" disabled="">Seleccione...</option>
                                                <option value="0">NO PAGÓ</option>
                                                <option value="1">PAGÓ</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputFecha4">Estado</label>
                                            <select class="form-control input-sm" name="estado" id="estado">
                                                <option value="" selected="" disabled="">Seleccione...</option>
                                                <option value="0">INACTIVO</option>
                                                <option value="1">ACTIVO</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                                <button type="button" id="btnAgregarnuevo" class="btn btn-outline-secondary">Agregar nuevo</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Editar-->
                <div class="modal fade bd-example-modal-lg" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar cliente <span id="nombreU"></span></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="frmnuevoU">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputNombres4">Nombres</label>
                                            <input type="text" class="form-control input-sm" id="nombresU" name="nombresU" required="">
                                            <input type="text" hidden="" id="idClienteU" name="idClienteU">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputcorreo4">Correo</label>
                                            <input type="text" class="form-control input-sm" id="correoU" name="correoU" required="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputGrupo4">Telefono</label>
                                            <input type="text" class="form-control input-sm" id="telefonoU" name="telefonoU" required="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputJornada4">Servicio</label>
                                            <input type="text" class="form-control input-sm" id="servicioU" name="servicioU" required="">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputHorario4">Pantalla</label>
                                            <input type="text" class="form-control input-sm" id="pantallaU" name="pantallaU" required="">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputIntensidad4">Valor Servicio</label>
                                            <input type="text" class="form-control input-sm" id="vlr_servicioU" name="vlr_servicioU" required="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputIntensidad4">Correo cuenta</label>
                                            <input type="text" class="form-control input-sm" id="correo_cuentaU" name="correo_cuentaU" required="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputFecha4">Fecha Inicio</label>
                                            <input type="date" class="form-control input-sm" name="fecha_inicioU"  id="fecha_inicioU" required="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputFecha4">Fecha Fin</label>
                                            <input type="date" class="form-control input-sm" name="fecha_finU"  id="fecha_finU" required="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputFecha4">Fecha Pago</label>
                                            <input type="date" class="form-control input-sm" name="fecha_pagoU"  id="fecha_pagoU" required="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputFecha4">Pagado</label>
                                            <input type="text" class="form-control input-sm" id="pagadoU" name="pagadoU" required="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputFecha4">Estado</label>
                                            <input type="text" class="form-control input-sm" id="estadoU" name="estadoU" required="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-outline-secondary" id="btnActualizar">Actualizar</button>
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

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarnuevo').click(function(){
			datos=$('#frmnuevo').serialize();
			
            var nombres = document.getElementsByName("nombres")[0].value;
            var correo = document.getElementsByName("correo")[0].value;
            var telefono = document.getElementsByName("telefono")[0].value;
            var servicio = document.getElementsByName("servicio")[0].value;
            var pantalla = document.getElementsByName("pantalla")[0].value;
            var vlr_servicio = document.getElementsByName("vlr_servicio")[0].value;
            var correo_cuenta = document.getElementsByName("correo_cuenta")[0].value;
            var fecha_inicio = document.getElementsByName("fecha_inicio")[0].value;
            var fecha_fin = document.getElementsByName("fecha_fin")[0].value;
			var pagado = document.getElementsByName("pagado")[0].value;
			var estado = document.getElementsByName("estado")[0].value;

            if ((nombres == "")|| (correo == "")|| (telefono == "")|| (servicio == "")|| (pantalla == "")|| (vlr_servicio == "")
            || (fecha_inicio == "")|| (correo_cuenta == "")|| (fecha_fin == "") || (pagado == "")|| (estado == "")) {  //COMPRUEBA CAMPOS VACIOS
                Swal.fire({
                icon: 'error',
                text: 'Por favor revisar, hay campos vacidos.',
                showConfirmButton: false,
                timer: 1500
                })
			}else{
				$.ajax({
					type:"POST",
					data:datos,
					url:"procesos/guardarCliente.php",
					success:function(r){
						if(r==1){
							$('#agregarnuevosdatosmodal').modal('toggle');
							$('#frmnuevo')[0].reset();
							let valor = $('#valor').val();
							$('#tablaDatatable').load('tabla.php?name_group='+valor);
							Swal.fire(
							'Correcto!',
							'Se ha guardado correctamente!',
							'success'
							);
						}else{
							Swal.fire(
							'Error!',
							'No se ha guardado correctamente!',
							'error'
							);
						}
					}
				});
			}
				
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmnuevoU').serialize();
            
			var nombresU = document.getElementsByName("nombresU")[0].value;
            var correoU = document.getElementsByName("correoU")[0].value;
            var telefonoU = document.getElementsByName("telefonoU")[0].value;
            var servicioU = document.getElementsByName("servicioU")[0].value;
            var pantallaU = document.getElementsByName("pantallaU")[0].value;
            var vlr_servicioU = document.getElementsByName("vlr_servicioU")[0].value;
            var correo_cuentaU = document.getElementsByName("correo_cuentaU")[0].value;
            var fecha_inicioU = document.getElementsByName("fecha_inicioU")[0].value;
            var fecha_finU = document.getElementsByName("fecha_finU")[0].value;
			var pagadoU = document.getElementsByName("pagadoU")[0].value;
			var estadoU = document.getElementsByName("estadoU")[0].value;

            if ((nombresU == "")|| (correoU == "")|| (telefonoU == "")|| (servicioU == "")|| (pantallaU == "")|| (vlr_servicioU == "")
            || (fecha_inicioU == "")|| (correo_cuentaU == "")|| (fecha_finU == "") || (pagadoU == "")|| (estadoU == "")) {  //COMPRUEBA CAMPOS VACIOS
                Swal.fire({
                icon: 'error',
                text: 'Por favor revisar, hay campos vacidos.',
                showConfirmButton: false,
                timer: 1500
                })
			}else{
				$.ajax({
					type:"POST",
					data:datos,
					url:"procesos/actualizar.php",
					success:function(r){
						if(r==1){
							$('#modalEditar').modal('toggle');
							let valor = $('#valor').val();
							$('#tablaDatatable').load('tabla.php?name_group='+valor);
							Swal.fire(
							'Correcto!',
							'Se ha actualizado correctamente!',
							'success'
							);					
						}else{
							Swal.fire(
							'Error!',
							'No se ha actualizado correctamente!',
							'error'
							);					
						}
					}
				});
			}
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		let valor = $('#valor').val();
		$('#tablaDatatable').load('tabla.php?name_group='+valor);
	});
</script>

	
<script type="text/javascript">
    function agregaFrmActualizar(idCliente){
		$.ajax({
			type:"POST",
			data:"id=" + idCliente,
			url:"procesos/obtenDatos.php",

			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#idClienteU').val(datos['id']);
				$('#nombresU').val(datos['nombres']);
				$('#correoU').val(datos['correo']);
				$('#telefonoU').val(datos['telefono']);
				$('#servicioU').val(datos['servicio']);
				$('#pantallaU').val(datos['pantalla']);
				$('#vlr_servicioU').val(datos['vlr_servicio']);
				$('#correo_cuentaU').val(datos['correo_cuenta']);
				$('#fecha_inicioU').val(datos['fecha_inicio']);
				$('#fecha_finU').val(datos['fecha_fin']);
				$('#fecha_pagoU').val(datos['fecha_pago']);
				$('#pagadoU').val(datos['pagado']);
				$('#estadoU').val(datos['estado']);
			}
		});
	}

	function eliminarDatos(idCurso){
		const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-outline-success',
			cancelButton: 'btn btn-outline-danger'
		},
		buttonsStyling: false
		})

		swalWithBootstrapButtons.fire({
		title: '¿Está seguro?',
		text: "¡No podrás revertir esto!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: '¡Si, bórralo!',
		cancelButtonText: '¡No, cancela!',
		reverseButtons: true
		}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				type:"POST",
				data:"id=" + idCurso,
				url:"procesos/eliminar.php",
				success:function(r){
					if(r==1){
						let valor = $('#valor').val();
						$('#tablaDatatable').load('tabla.php?name_group='+valor);
						swalWithBootstrapButtons.fire(
						'¡Eliminado!',
						'El curso ha sido eliminado.',
						'success'
						)
					}else{
						swalWithBootstrapButtons.fire(
						'¡Eliminado!',
						'El curso no ha sido eliminado.',
						'error'
						)
					}
				}
			});
			
		} else if (
			result.dismiss === Swal.DismissReason.cancel
		) {
			swalWithBootstrapButtons.fire(
			'Cancelado',
			'El curso está seguro, ha cancelado la eliminación.',
			'error'
			)
		}
		});
	}

	
</script>
