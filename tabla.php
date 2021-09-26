
<?php 
session_start();

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

if (isset($_SESSION['user_id'])) {
	$id = $_SESSION['user_id'];
	$tildes = $conexion->query("SET NAMES 'utf8'");
	$sql="SELECT id, nombres, apellidos, tipodocumento, documento, tipoPoblacion, email, password, 
	fechaRegistro, rol, fecha_sesion, telefono, fechaNacimiento, municipio, sexo, img, centro 
	FROM users WHERE id = $id";
	$result_login = mysqli_fetch_row(mysqli_query($conexion,$sql));
	$user = null;
  
	if (count($result_login) > 0) {
	  $user = $result_login;
	}
}

$tildes = $conexion->query("SET NAMES 'utf8'");
$sql="SELECT id, nombres, correo, telefono, servicio, pantalla, vlr_servicio, correo_cuenta, fecha_inicio, fecha_fin, fecha_pago, CASE WHEN pagado = 1 THEN 'SI' WHEN pagado = 0 THEN 'No' END As pagado, CASE WHEN estado = 1 THEN 'Activo' WHEN estado = 0 THEN 'Inactivo' END As estado, fecha_registro FROM clientes WHERE estado = 1";
$result=mysqli_query($conexion,$sql);

?>

<div>
	<div class="table-responsive">

		<table class="table table-hover small" id="cargarClientes">
			<thead class="text-center bg-primary">
				<tr>
					<td>Nombres</td>
					<td>Correo cliente</td>
					<td>Telefono</td>
					<td>Servicio</td>
					<td>Pantalla</td>
					<td>Valor servicio</td>
					<td>Correo cuenta</td>
					<td>Fecha Inicio</td>
					<td>Fecha Fin</td>
					<td>Fecha Pago</td>
					<td>Pagó</td>
					<td>Estado</td>
					<td width="20%">Acciones</td>
				</tr>
			</thead>
			
			<tbody >
				<?php 
				while ($mostrar=mysqli_fetch_row($result)) {
					?>
						<tr class="text-center">
							<td><?php echo strtoupper($mostrar[1]); ?></td>
							<td><?php echo strtoupper($mostrar[2]); ?></td>
							<td><?php echo strtoupper($mostrar[3]); ?></td>
							<td><?php echo strtoupper($mostrar[4]); ?></td>
							<td><?php echo strtoupper($mostrar[5]); ?></td>
							<td><?php echo strtoupper($mostrar[6]); ?></td>
							<td><?php echo strtoupper($mostrar[7]); ?></td>
							<td><?php echo strtoupper($mostrar[8]); ?></td>
							<td><?php echo strtoupper($mostrar[9]); ?></td>
							<td><?php echo strtoupper($mostrar[10]); ?></td>
							<td><?php echo strtoupper($mostrar[11]); ?></td>
							<td><?php echo strtoupper($mostrar[12]); ?></td>
							<td style="text-align: center;" >
								<span class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')">
									<span class="fa fa-pencil-square-o"></span>
								</span>
							</td>
						</tr>
					<?php 
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	function btnInscribir(idCurso, idUsuario){
		var datos = {
			"idCurso" : idCurso,
			"idUsuario" : idUsuario
        };
		$.ajax({
			type:"POST",
			data: datos,
			url:"procesos/agregarInscripcion.php",
			success:function(r){
				if(r == 1){
					let valor = $('#valor').val();
					$('#tablaDatatable').load('tabla.php?name_group='+valor);
					Swal.fire(
					'Correcto!',
					'Se ha inscrito correctamente!',
					'success'
					);
				}else if(r == 2){
					Swal.fire(
					'Ojo!',
					'No te puedes inscribir debido que ya cuentas con 2 inscripciones vigentes.',
					'warning'
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
	$('#btnInscribir').click(function(){
			datos=$('#frmInscribir').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/agregarInscripcion.php",
				success:function(r){
					if(r==1){
						let valor = $('#valor').val();
						$('#tablaDatatable').load('tabla.php?name_group='+valor);
						Swal.fire(
						'Correcto!',
						'Se ha inscrito correctamente!',
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
		});

	$(document).ready(function() {
		$('#cargarClientes').DataTable();
	} );

	var table = $('#cargarClientes').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
        "infoEmpty": "Mostrando 0 de 0 de 0 Registros",
        "infoFiltered": "(Filtrado de _MAX_ total Registros)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Registros",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
});
</script>