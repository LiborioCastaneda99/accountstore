
<?php 

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$tildes = $conexion->query("SET NAMES 'utf8'");
$sql="SELECT id, nombre, documento, telefono, correo, servicio, perfiles, constacia_pago, cuenta_enviada, fecha_registro FROM clientes_nuevos WHERE cuenta_enviada = 0 AND rechazado = 0";
$result=mysqli_query($conexion,$sql);

?>

<div>
	<div class="table-responsive">

		<table class="table table-hover small" id="cargarClientesVerificar">
			<thead class="text-center bg-primary">
				<tr>
					<td style="color:#fff; font-size:14px;">Documento</td>
					<td style="color:#fff; font-size:14px;">Nombres</td>
					<td style="color:#fff; font-size:14px;">Correo</td>
					<td style="color:#fff; font-size:14px;">Telefono</td>
					<td style="color:#fff; font-size:14px;">Servicio</td>
					<td style="color:#fff; font-size:14px;">Pantallas</td>
					<td style="color:#fff; font-size:14px;">Comprobante de pago</td>
					<td style="color:#fff; font-size:14px;">Fecha de registro</td>
					<td width="10%" style="color:#fff; font-size:14px;">Acciones</td>
				</tr>
			</thead>
			
			<tbody >
				<?php 
				while ($mostrar=mysqli_fetch_row($result)) {
					?>
						<tr class="text-center">
							<td><?php echo strtoupper($mostrar[2]); ?></td>
							<td><?php echo strtoupper($mostrar[1]); ?></td>
							<td><?php echo strtoupper($mostrar[4]); ?></td>
							<td><?php echo strtoupper($mostrar[3]); ?></td>
							<td><?php echo strtoupper($mostrar[5]); ?></td>
							<td><?php echo strtoupper($mostrar[6]); ?></td>
							<td><?php echo strtoupper($mostrar[7]); ?></td>
							<td><?php echo strtoupper($mostrar[9]); ?></td>
							<td style="text-align: center;" >
								
								<button type="button" class="btn btn-sm btn-outline-primary datos" data-text="<?php echo htmlentities($mostrar[0]); ?>" data-descr="<?php echo htmlentities($mostrar[7]); ?>" data-toggle="modal" data-target="#staticBackdrop"><span class="fa fa-eye"></span></button>

                                <span>
                                    <span class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')">
                                <span class="fa fa-pencil-square-o"></span>
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
   
	var table = $('#cargarClientesVerificar').DataTable({
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