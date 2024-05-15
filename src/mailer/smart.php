<?php 

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$select = $_POST['user_select'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'lupashkoolga011@gmail.com';                 // Наш логин
$mail->Password = 'txdt cmde xcwv qoit';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('lupashkoolga011@gmail.com', 'Mi test sitio');   // От кого письмо 
$mail->addAddress('lupashkoolga011@gmail.com');     // кому прийдет письмо
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Это тема сообщения';
$mail->Body    = '
	Пользователь оставил свои данные <br> 
	Имя: ' . $name . ' <br>
	Выбор: ' . $select . ' <br>
	Телефон: ' . $phone . '';
 
$mail->AltBody = 'Это альтернативный текст';

//что происходит после отправки
if(!$mail->send()) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";//выводит текст и код ошибки, если не отправлено
} else {
  header('Location: ../pages/thanks.html');//куда перенаправит пользователя после успешной отправки
}


?>