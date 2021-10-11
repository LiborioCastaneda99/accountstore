$fecha_real = "2021-10-15";
$fecha_tres_dia = "2021-10-12";
$fecha_hoy = DATE("Y-m-d");

echo "fecha real ".$fecha_real;echo "<br>";
echo "fecha - tres dias ".$fecha_tres_dia;echo "<br>";
echo "fecha hoy ".$fecha_hoy;echo "<br>";

$id_cumplen =  [];

if($fecha_tres_dia == $fecha_hoy){
    array_push($id_cumplen, '12345');
}

echo "hoy se manda mensaje a => ".json_encode($id_cumplen);

//ejecutar que

//ciclo para de 1 hasta la cantidad del array
    //foreach ir mandando mensaje x id cliente
        //crear mensaje x cliente por ejem. si hay 3 , 3 mensajes de renovar.



        SELECT id, nombres, DATE_ADD(fecha_fin,INTERVAL -3 DAY) As fecha_tres_dias, fecha_fin FROM `clientes` where estado = 1