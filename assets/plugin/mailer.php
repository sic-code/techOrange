<?php
require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";
require 'PHPMailer-master/src/Exception.php';
$mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
try {
    $mail->SMTPDebug = 0; //0,1,2: chế độ debug
    $mail->isSMTP();
    $mail->CharSet  = "utf-8";
    $mail->Host = 'smtp.gmail.com';  //SMTP servers
    $mail->SMTPAuth = true; // Enable authentication
    $mail->Username = 'quyltpps26205@fpt.edu.vn'; // SMTP username
    $mail->Password = 'uqfxublhisdkiozs';   // SMTP password
    $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
    $mail->Port = 465;  // port to connect to                
    $mail->setFrom('quyltpps26205@fpt.edu.vn', 'Tech Orange');
    $mail->addAddress($email, $ho_ten);
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $noidungthu;
    $mail->smtpConnect(array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        )
    ));
    $mail->send();
    $flag = true;
} catch (Exception $e) {
    echo 'Error: ', $mail->ErrorInfo;
}
?>