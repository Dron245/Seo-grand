<?php
//$message = 'Имя '.$_POST['type4']."\r\n".
//    'Телефон '.$_POST['type5']."\r\n\r\n".
//    'Модель '.$_POST['type0']."\r\n".
//    'Выберите тип кухни '.$_POST['type1']."\r\n".
//    'Нужна ли вам техника для новой кухни? '.$_POST['type2']."\r\n".
//    'Какую столешницу вы предпочитаете? '.$_POST['type3']."\r\n".
//    'Введите размеры кухонного гарнитура '.$_POST['type8']."\r\n".
//    $_POST['type7']."\r\n"
//
//
//;


//mail('mebelit-spb@mail.ru', 'Заявка - Расчет стоимости кухни', $message);

//print_r($_POST);
	$redirectFlag = 0;
	$name = $_POST['type4'];
	$phone = $_POST['type5'];
//Модификация отправки форм
	$queryUrl = 'https://b24.mebelit-spb.ru/rest/78/etat2xdnilyo6vgo/crm.lead.add.json';
	$queryData = http_build_query( array(
		'fields' => array(
        'TITLE' => 'Заявка с калькулятора',
		'NAME' => $name,
        'PHONE' => Array(
			"n0" => Array(
			"VALUE" => "$phone",
			"VALUE_TYPE" => "WORK",
			),
    	),
	),
		'params' => array("REGISTER_SONET_EVENT" => "Y")
));
	
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_POST => 1,
    CURLOPT_HEADER => 0,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $queryUrl,
    CURLOPT_POSTFIELDS => $queryData,
));

$result = curl_exec($curl);
curl_close($curl);
$result = json_decode($result, 1);
if (array_key_exists('error, $result')) echo "Ошибка при сохранении лида:".$result['error_descripton']."<br/>";
$redirectFlag = true;

header('Content-Type: application/json; charset=utf-8');
echo json_encode(['send' => true, 'redirect' => $redirectFlag] );