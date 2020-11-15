<?php
require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

$name=$_POST['name'];
$surname=$_POST['surname'];
$mail=$_POST['mail'];
$message=$_POST['message'];
$adminMail='onurkol4161@gmail.com';
$mailSubject='Onur Kol Web Site: New Contact Mail';


if(empty($name)){
    echo '<script>alert("'.$contactEmptyName.'"); window.location.href="../";</script>';
}
else{
    if(empty($mail)){
        echo '<script>alert("'.$contactEmptyMail.'"); window.location.href="../";</script>';
    }
    else{
        if(empty($message)){
            echo '<script>alert("'.$contactEmptyMessage.'"); window.location.href="../";</script>';
        }
        else{
            // Convert Data
            $headers = ['From' => $mail, 'Reply-To' => $mail, 'Content-type' => 'text/html; charset=iso-8859-1'];
            $bodyParagraphs = ["Name: {$name} {$surname}", "Email: {$mail}", "Message:", $message];
            $body = join(PHP_EOL, $bodyParagraphs);
            // Send Mail
            if (mail($adminMail, $mailSubject, $body, $headers)) {
                echo '<script>alert("'.$contactSuccesSend.'"); window.location.href="../";</script>';
            }
            else{
                echo '<script>alert("'.$contactErrorSend.'"); window.location.href="../";</script>';
            }
        }
    }
}
?>