<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../app/function/PHPMailer/src/Exception.php';
require '../app/function/PHPMailer/src/PHPMailer.php';
require '../app/function/PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            //key: zcus ewbn npqf tgkq
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'mobilelandmailer@gmail.com';                     //SMTP username
            $mail->Password   = 'zcus ewbn npqf tgkq';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('mobilelandmailer@gmail.com', 'MobileLand Support');
            $mail->addAddress($_SESSION['email']);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->CharSet = "UTF-8"; // Mã hóa tiêu đề và nội dung

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $_SESSION['subject'];
            $mail->Body    = $_SESSION['message'];

            $mail->send();
            unset($_SESSION['cart']);
            unset($_SESSION['order_info']);
            unset($_SESSION['subject']);
            unset($_SESSION['message']);
            header('Location: ../?action=history');
            
        } catch (Exception $e) {
            echo "Mail chưa được gửi. Cung cấp lỗi cho QTV: {$mail->ErrorInfo}";
        }

?>