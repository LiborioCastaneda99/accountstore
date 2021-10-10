<?php 

	class crud{
		public function agregar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$tildes = $conexion->query("SET NAMES 'utf8'");
			
			$Correo_Electronico=$datos[0];
			$Password = $datos[1];
			
			if (!empty($Correo_Electronico) && !empty($Password)) {

				$sql="SELECT id, nombres, apellidos, correo, password, id_tipo_usuario 
				FROM usuarios WHERE correo = '$Correo_Electronico' AND estado = 1";
				$res_login = mysqli_fetch_row(mysqli_query($conexion,$sql));
				$user = null;
			
				if (count($res_login) > 0) {
					$user = $res_login;
				}

				if (count($res_login) > 0 && ($Password==$user[4])) {
					session_start();
					$_SESSION['user_id'] = $user[0];
					echo "1";
				} else {
					echo "2";
				}

			}
		}

		public function agregarInscripcion($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$tildes = $conexion->query("SET NAMES 'utf8'");
			
			$sql="INSERT INTO y_inscritos_cursos (id_curso, id_usuario) VALUES ('$datos[0]','$datos[1]')";
			$res = mysqli_query($conexion,$sql);
	
			$tildes = $conexion->query("SET NAMES 'utf8'");
			$sql_="SELECT id, nombres, apellidos
			FROM users WHERE id = '$datos[1]'";
			$res = mysqli_fetch_row(mysqli_query($conexion,$sql_));

			$sql__="SELECT C.curso, C.intensidad, C.fecha_inicio, C.municipio, C.direccion, C.horario, U.email
			FROM cursos C
            INNER JOIN y_inscritos_cursos YIC ON YIC.id_curso = C.id
            INNER JOIN users U ON YIC.id_usuario = U.id
            WHERE YIC.id_usuario = '$res[0]' AND YIC.id_curso = '$datos[0]'";
			$res_ = mysqli_fetch_row(mysqli_query($conexion,$sql__));

			$to = "ldcastaneda06@misena.edu.co";
			$subject = "Confirmación inscripción";

			$message = "<!DOCTYPE html>
			<html>
			<head>
			<meta charset='UTF-8'>
			<title></title>
			</head>
			<body style='font-family: Arial; font-size: 15px;'>
			<div style=''>
			<img style='display:block;margin-left: auto; margin-right: auto;' src='http://vivu.com.co/assets/Oferta_Complementaria_Mesa.png' width='75%' />
			</div>

			<p style='color: #4d4d4d; line-height: 21px;'>
			<span style=''>Señor(a): <b>".$res[1]." ".$res[2]."</b>
			</p>

			<p style='text-align: center;color: #4d4d4d; line-height: 21px;'>
			<span style=''>Usted se ha inscrito satisfactoriamente en el curso de ".$res_[0]." con una intensidad de ".$res_[1]." el cual inicia el día ".$res_[2]." en el Municipio/dirección de ".$res_[3].", ".$res_[4]." con el siguiente horario de lunes a viernes de ".$res_[5]."
			</p>

			<p style='text-align: center;color: #4d4d4d; line-height: 21px;'>
			<span style=''>La Formación del Sena es completamente gratuita y no requiere de intermediarios. Si alguien le solicita dinero o favores a cambio denúncielo a la oficina de atención al ciudadano, correo: comunicaciones@vivu.com.co
			</p>

			<p style='text-align: center;color: #4d4d4d; line-height: 21px;'>
			<span style=''>RECUERDE QUE LA ASISTENCIA DESDE EL PRIMER DIA ES OBLIGATORIA
			<br>
			Si tiene alguna inquietud, por favor comuníquese con nuestra oficina:
			<br>
			CRA 43 # 42-40 Piso 3, Oficina de Población Vulnerable <br>
			Barranquilla - Colombia
			</p>



			<div style=''>
			<img style='display:block;margin-left: auto; margin-right: auto;' src='http://vivu.com.co/assets/Logosimbolo.png' width='20%' />
			</div>

			</body>
			</html>

			";

			ini_set("SMTP", "smtp.hostinger.co");
			ini_set("sendmail_from", "inscripciones@vivu.com.co");
			ini_set("smtp_port", "587");
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: <inscripciones@vivu.com.co>' . "\r\n";
			
			mail($to,$subject,$message,$headers);


			return 1;
		}

		public function obtenDatos($id){
			$obj =  new conectar();
			$conexion = $obj->conexion();
			$tildes = $conexion->query("SET NAMES 'utf8'");
			$sql = "SELECT id, nombres, correo, telefono, servicio, pantalla, vlr_servicio, correo_cuenta, fecha_inicio, fecha_fin, fecha_pago, pagado, estado, fecha_registro, responsable, no_pantalla 
			FROM clientes WHERE id = '$id'";
			$result = mysqli_query($conexion,$sql);
			$ver = mysqli_fetch_row($result);
			
			$datos = array(
				'id' => $ver[0],
				'nombres' => $ver[1],
				'correo' => $ver[2],
				'telefono' => $ver[3],
				'servicio' => $ver[4],
				'pantalla' => $ver[5],
				'vlr_servicio' => $ver[6],
				'correo_cuenta' => $ver[7],
				'fecha_inicio' => $ver[8],
				'fecha_fin' => $ver[9],
				'fecha_pago' => $ver[10],
				'pagado' => $ver[11],
				'estado' => $ver[12],
				'responsable' => $ver[14],
				'no_pantalla' => $ver[15]
			);
			return $datos;
		}

		public function consultarInscripcion($datos){
			$obj =  new conectar();
			$conexion = $obj->conexion();
			$tildes = $conexion->query("SET NAMES 'utf8'");
			$sql = "SELECT COUNT(id) As ContarId FROM y_inscritos_cursos WHERE estado = 1 AND id_usuario = ".$datos[1]."";
			$result = mysqli_query($conexion,$sql);
			$ContarId = mysqli_fetch_row($result);

			return $ContarId[0];
		}

		public function consultarAprendiz($datos){
			$obj =  new conectar();
			$conexion = $obj->conexion();
			$tildes = $conexion->query("SET NAMES 'utf8'");
			$sql = "SELECT COUNT(id) As ContarId FROM users WHERE documento = ".$datos[7]."";
			$result = mysqli_query($conexion,$sql);
			$ContarId = mysqli_fetch_row($result);

			return $ContarId[0];
		}

		public function consultarAprendizC($datos){
			$obj =  new conectar();
			$conexion = $obj->conexion();
			$tildes = $conexion->query("SET NAMES 'utf8'");
			$sql = "SELECT COUNT(id) As ContarId FROM competencias WHERE documento = ".$datos[6]."";
			$result = mysqli_query($conexion,$sql);
			$ContarId = mysqli_fetch_row($result);

			return $ContarId[0];
		}

		public function actualizar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$tildes = $conexion->query("SET NAMES 'utf8'");
			
			$sql="UPDATE clientes SET nombres='$datos[1]',correo='$datos[2]',telefono='$datos[3]',servicio='$datos[4]',
			pantalla='$datos[5]',vlr_servicio='$datos[6]',correo_cuenta='$datos[7]',fecha_inicio='$datos[8]',fecha_fin='$datos[9]',
			fecha_pago='$datos[10]',pagado='$datos[11]',estado='$datos[12]',responsable='$datos[13]', no_pantalla='$datos[14]' WHERE id=$datos[0]";
			return mysqli_query($conexion,$sql);
		}

		public function actualizarAprendiz($datos){

			$obj= new conectar();
			$conexion=$obj->conexion();
			$tildes = $conexion->query("SET NAMES 'utf8'");
			$sql="UPDATE users SET nombres='$datos[1]',apellidos='$datos[2]',sexo='$datos[3]',
			tipodocumento='$datos[7]',documento='$datos[8]',fechaNacimiento='$datos[4]',telefono='$datos[9]',
			tipoPoblacion='$datos[11]',municipio='$datos[10]',email='$datos[5]',password='$datos[6]'
			WHERE id = '$datos[0]'";
			return mysqli_query($conexion,$sql);
		}

		public function guardarCliente($datos){

			$obj= new conectar();
			$conexion=$obj->conexion();
			$tildes = $conexion->query("SET NAMES 'utf8'");
	
			$sql="INSERT INTO clientes (nombres, correo, telefono, servicio, pantalla, no_pantalla, vlr_servicio, correo_cuenta, fecha_inicio, fecha_fin, fecha_pago, pagado, estado, responsable) 
			VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[12]','$datos[5]','$datos[6]','$datos[7]','$datos[8]','$datos[9]','$datos[10]','$datos[11]','$datos[13]')";
			return mysqli_query($conexion,$sql);
		}

		public function guardarClienteNuevo($datos){

			$obj= new conectar();
			$conexion=$obj->conexion();
			$tildes = $conexion->query("SET NAMES 'utf8'");
	
			$sql="INSERT INTO clientes_nuevos(nombre, documento, telefono, correo, servicio, perfiles, constacia_pago) 
			VALUES ('$datos[2]','$datos[1]','$datos[4]','$datos[3]','$datos[0]','$datos[5]','$datos[6]')";
			return mysqli_query($conexion,$sql);
		}

		public function actualizarPerfil($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$tildes = $conexion->query("SET NAMES 'utf8'");
			
			/*$sql="UPDATE cursos SET curso ='$datos[1]',jornada='$datos[2]', horario='$datos[5]',intensidad='$datos[6]',
			fecha_inicio='$datos[7]',municipio='$datos[8]',direccion='$datos[9]',formacion='$datos[10]',centro='$datos[4]',
			descripcion='$datos[12]',nombre_grupo='$datos[3]',estado='$datos[11]' WHERE id='$datos[0]'";*/

			return json_encode($datos);
		}

		public function eliminar($id){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="DELETE FROM cursos WHERE id='$id'";
			return mysqli_query($conexion,$sql);
		}

		public function eliminar_arendiz($id, $idCurso){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql= "UPDATE y_inscritos_cursos SET estado = '0' WHERE id = $id  AND id_curso = $idCurso AND estado = 1";
			return mysqli_query($conexion,$sql);
		}
		
		public function vaciarCurso($idCurso){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql_info = mysqli_query($conexion,"SELECT id FROM y_inscritos_cursos where id_curso='$idCurso' and estado = 1");
			$cont = 0;
			foreach ($sql_info as $d) {
				$id = $d['id'];

				$sql= mysqli_query($conexion,"UPDATE y_inscritos_cursos SET estado = '0' WHERE id = $id AND estado = 1");
				$cont = $cont + 1;
			}

			if (count($sql_info == $cont)) {
				// $sql= mysqli_query($conexion,"UPDATE cursos SET estado = 'Inactivo' WHERE id = $idCurso");
				return 1;
			}else{
				return 2;
			}
		}
	}

 ?>