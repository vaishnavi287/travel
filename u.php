<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="e.css">
</head>
<body>
  
 
    <div class="wrapper">
      <form method="post">
        <div class="box">

            <div class="icon">
                <div class="circle"></div>
                <h1>Travel</h1>
                <h1 style="padding-left: 5vw;">Sphere</h1>
            </div>

            <h2>Create an account</h2>

            <div class="f">
                <div class="forms">
                    <label for="username">Username*</label>
                    <input type="text" name="username" placeholder="Username" required>
                </div>

                <div class="forms">
                    <label for="email">Email*</label>
                    <input type="email" name="email" placeholder="mail@gmail.com" required>
                </div>

                <div class="forms">
                    <label for="passward">Passward*</label>
                    <input type="password" name="pass" placeholder="***********" required>
                </div>

                <div class="forms">
                    <input type="submit" value="Sign Up" style="color: white; background-color: #5495fd; font-weight: 600; font-size: 1.2vw;">
                </div>
            </div>
            

            <p>"The best journeys answer questions that in the beginning you didn’t even think to ask." </p>

            <h3>Already have an account? <a href="#">Log in</a></h3>

        </div>
      </form>
    </div>

</body>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass'];


        try {
            
            $mail = new PHPMailer(true);

            
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'gagarevaishnavi717@gmail.com'; 
            $mail->Password = 'jxmu tcut psok unuq'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;  

        
            $mail->setFrom('gagarevaishnavi717@gmail.com', 'Travelsphere');
            $mail->addAddress($email);  

        
            $mail->isHTML(true);
            $mail->Subject = 'Login Successful';
            $mail->Body    = "Hello, $email! You have successfully logged in .your userid :$uname  and password:$password";

            
            if ($mail->send()) {
                echo 'Login successful! A confirmation email has been sent to ' . $email;
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } 
?>
