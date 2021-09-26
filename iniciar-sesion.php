<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: micuenta.php');
}

?><!doctype html>
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
    <title>Iniciar sesión | Account Store Tv</title>
  </head>
  <body>

	<div class="container">
        <!-- menu -->
        <?php require_once "menu.php";?>
        <!-- cuerpo -->
        <div class="jumbotron text-center">
            <form class="" id="formsignin">
                <img class="mb-4" src="https://getbootstrap.com/docs/4.5/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Por favor, inicie sesión</h1>

                <div class="col-md-3 mx-auto">
                    <label for="inputEmail" class="sr-only">Correo electronico</label>
                    <input type="email" id="Email" name="Email" class="form-control" placeholder="Correo electronico" autofocus>
                </div>
                <div class="col-md-3 mt-2 mx-auto">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="Password" name="Password" class="form-control" placeholder="Password">
                </div>
                <div class="col-md-3 mt-3 mx-auto">
                    <button type="button" class="btn btn-outline-primary btn-block" id="btnIniciar">Entrar</button>
                </div>
            </form>
        </div>
	</div>
  </body>
</html>


<script type="text/javascript">
        $('#btnIniciar').click(function(){
            datos=$('#formsignin').serialize();
            
            var Email = document.getElementsByName("Email")[0].value;
            var Password = document.getElementsByName("Password")[0].value;

            if ((Email == "") || (Password == "")) {  //COMPRUEBA CAMPOS VACIOS
                Swal.fire({
                icon: 'error',
                text: 'Por favor revisar, hay campos vacidos.',
                showConfirmButton: false,
                timer: 3000
                })
            }else{
                $.ajax({
                    type:"POST",
                    data:datos,
                    url:"procesos/agregar.php",
                    success:function(r){
                        if(r==1){
                            // $('#agregarnuevosdatosmodal').modal('toggle');
                            $('#formsignin')[0].reset();
                            // let valor = $('#valor').val();
                            // $('#tablaDatatable').load('tabla.php?name_group='+valor);
                            Swal.fire(
                            'Correcto!',
                            'Ha iniciado sesión correctamente!',
                            'success'
                            );
                            window.location.href="cuenta.php";
                        }else{
                            Swal.fire(
                            'Error!',
                            'No se ha podido loguear correctamente!',
                            'error'
                            );
                        }
                    }
                });
            }
                
        });

</script>