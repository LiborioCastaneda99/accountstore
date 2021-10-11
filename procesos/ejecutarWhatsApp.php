<?php 



	$nombres = $_POST['nombres'];
	$nombreProducto = $_POST['nombreProducto'];
    $porciones = explode(" ", $nombres);
    $n_m = strtolower($porciones[0]);
    $n = ucfirst($n_m);
    //abrir conexión
    $ch = curl_init("https://api.callmebot.com/whatsapp.php?phone=+573045985632&text=Hola%2C%20soy%20".$n."%2C%20acab%C3%A9%20de%20adquirir%20un%20servicio%20de%20".$nombreProducto."%2C%20ademas%20anexe%20mi%20comprobante%20de%20pago%2C%20muchas%20gracias%20espero%20mi%20cuenta.%20&apikey=112274");
    curl_exec($ch);
    echo ($ch);
    curl_close($ch);
	
    //abrir conexión
    $ch = curl_init("https://api.callmebot.com/whatsapp.php?phone=+573043355645&text=Hola%2C%20soy%20".$n."%2C%20acab%C3%A9%20de%20adquirir%20un%20servicio%20de%20".$nombreProducto."%2C%20ademas%20anexe%20mi%20comprobante%20de%20pago%2C%20muchas%20gracias%20espero%20mi%20cuenta.%20&apikey=135864");
    curl_exec($ch);
    echo ($ch);
    curl_close($ch);

 ?>