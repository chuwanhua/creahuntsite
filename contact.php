<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function clean_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

    $name = clean_input($_POST['name']?? '');
    $phone = clean_input($_POST['phone']?? '');
    $email = clean_input($_POST['email']?? '');
    $message = clean_input($_POST['message']?? '');
        }
    // Validate email format
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'chuwanhua0825@gmail.com';                     //SMTP username
    $mail->Password   = 'ftrfbpwxjjabjxkb';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;            

    // Set sender as form user
    $mail->setFrom($email, $name);

    // Set recipient as your email
    $mail->addAddress('chuwanhua0825@gmail.com', 'apple'); // Replace with the fixed recipient email

    // Email content
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    // 設定郵件標題
    $mail->Subject = '來自老獵人表單的聯絡';
    $mail->Body = "名字: $name<br>電話: $phone<br>Email: $email<br>訊息:<br>$message";

    // Send email
    $mail->send();
    echo "Message has been sent"; // Return success response if email is sent successfully
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; // Return failure response if an error occurs
}

?>
