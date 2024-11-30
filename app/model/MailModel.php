<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'app/function/PHPMailer/src/Exception.php';
require 'app/function/PHPMailer/src/PHPMailer.php';
require 'app/function/PHPMailer/src/SMTP.php';

class MailModel
{
    public static function sendMail($to, $subject, $message){

        //Create an instance; passing `true` enables exceptions
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
            $mail->addAddress($to);     //Add a recipient
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
            $mail->Subject = $subject;
            $mail->Body    = $message;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            echo "Mail chưa được gửi. Cung cấp lỗi cho QTV: {$mail->ErrorInfo}";
        }
    }
        
}