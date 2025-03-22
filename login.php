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

// Load Composer's autoloader
require 'vendor/autoload.php';
include 'db.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['pass'];

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP(); // Use SMTP
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server (e.g., Gmail's SMTP server)
    $mail->SMTPAuth = true; 
    $mail->Username = 'your email'; // SMTP username
    $mail->Password = 'your app password'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
    $mail->Port = 587; // TCP port to connect to

    //Recipients
    $mail->setFrom('gagarevaishnavi717@gmail.com', 'TravelSphere'); // Sender's email
    $mail->addAddress($email, $username); // Recipient's email and name

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Welcome to TravelSphere!';
    $mail->Body    = 'Thank you for signing up, ' . htmlspecialchars($username) . '! <br> Welcome to TravelSphere. We are excited to have you on board.';

    // Send email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

