	<!-- Barra de menu -->
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">
            <a href="index.php" class="text-secondary" style="text-decoration-line: none;">
                <img src="https://getbootstrap.com/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy"> 
                AccountStoreTv
            </a>
        </h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <?php if(!empty($user)):?>
                <a class="p-2 text-dark" href="index.php#pasos">¿Cómo adquirir un servicio?</a>
                <a class="p-2 text-dark" href="index.php#servicios">Servicios</a>
            <?php else: ?>
                <a class="p-2 text-dark" href="#pasos">¿Cómo adquirir un servicio?</a>
                <a class="p-2 text-dark" href="#servicios">Servicios</a>
            <?php endif; ?>
        </nav>
        <?php if(!empty($user)):?>
            <a class="p-2 text-dark" href="cuenta.php"><?php echo strtoupper($user[1]." ".$user[2]); ?></a>
            <a class="p-2 text-dark" href="logout.php" title="Cerrar sesión"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
        <?php else: ?>
            <a class="btn btn-outline-primary" href="iniciar-sesion.php">Iniciar sesión</a>
        <?php endif; ?>

    </div>