<?php
	use PHPMailer\PHPMailer\PHPMailer; 
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php'; 
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true); 
	$mail->CharSet = 'UTF-8'; 
	$mail->setLanguage('ru', 'phpmailer/language/'); 
	$mail->IsHTML(true);

	$mail->setFrom('tony_harbour@mail.ru', 'Парикмахерская Чио Чио');
	$mail->addAddress('tony_harbour@mail.ru');
	$mail->Subject = 'Привет! Это "Парикмахерская Чио Чио"';

	
	$body = '<h1>Встречайте супер письмо!</h1>';
	if(trim(!empty($_POST['name']))){0
		$body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
	}
	if(trim(!empty($_POST['email']))) {
		$body.='<p><strong>E-mail:</strong>'.$_POST['email'].'</p>';
	}
	if(trim(!empty($_POST['message']))){
		$body.='<p><strong>Сообщение:</strong>'.$_POST['message'].'</p>';
	}

	$mail->Body = $body;

	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json'); 
	echo json_encode($response);
?>