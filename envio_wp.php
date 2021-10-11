<?php
define('WB_TOKEN', '659597e84d3439a5a38eba0524ea33736164811ac46ea');
define('WB_FROM', '573045985632');


function sendMessageCurl($to, $msg){
	
	$to = filter_var($to, FILTER_SANITIZE_NUMBER_INT);

	if (empty($to)) return false;

	$msg = urlencode($msg);

	$custom_uid = "unique-" . time() ;

	$url = "https://www.waboxapp.com/api/send/chat?token=" . WB_TOKEN . "&uid=" . WB_FROM . "&custom_uid=" . $custom_uid . "&to=" . $to . "&text=" . $msg;

	$curl = curl_init();

	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$result = curl_exec($curl);
	curl_close($curl);
   
	if ($result) return json_decode($result);

	return false;

}

function sendImageCurl($to, $url_image, $caption = '', $description = ''){
	
	$to = filter_var($to, FILTER_SANITIZE_NUMBER_INT);

	if (empty($to)) return false;

	$url_image = urlencode($url_image);
	$caption = urlencode($caption);
	$description = urlencode($description);
	

	$custom_uid = "unique-" . time() ;

	$url = "https://www.waboxapp.com/api/send/image?token=" . WB_TOKEN . "&uid=" . WB_FROM . "&custom_uid=" . $custom_uid . "&to=" . $to . "&url=" . $url_image."&caption=".$caption."&description=".$description;

	$curl = curl_init();

	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$result = curl_exec($curl);
	curl_close($curl);
   
	if ($result) return json_decode($result);

	return false;

}


$msg = '🍿 NETFLIX PREMIUM  
Mjqf01+5O3W2IZ2@gmail.com

Contraseña: 676767

Tu pantalla es:
1 🔐 PIN 4040

(NO MODIFICAR PERFILES NI PINES)

      ¡Gracias por tu compra!\n';


//change 59312345678 to a phone number destination
$result = sendMessageCurl('573146756823',$msg);


print_r($result);





















