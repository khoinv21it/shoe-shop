<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['send'])) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hatbui2003@gmail.com';
    $mail->Password = 'zemmlkjiwtafhnwr';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->SMTPDebug = 1;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->setFrom('congtinh06032003@gmail.com');
    $mail->addAddress($_POST['email']);

    $mail->isHTML(true);

    $mail->Subject = $_POST['tt'];
    $mail->Body = $_POST['mess'];

    $mail->send();

    echo '
    <script>
    alert("Gửi mail thành công!!");
    document.location.href = "mail.php";
    </script>
    ';
}
