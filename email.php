<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        
body {
    background-image: url('https://www.pexels.com/photo/view-of-street-from-a-glass-window-531880/');
     background-size: cover;
      padding: 20px;
       border-radius: 10px;
}


h2 {
    text-align: center;
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}


label {
    font-size: 14px;
    color: #555;
    margin-bottom: 8px;
    display: block;
}


input[type="email"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    color: #333;
    box-sizing: border-box;
}


input[type="email"]:focus, input[type="password"]:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
}


input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}


input[type="submit"]:hover {
    background-color: #0056b3;
}

@media (max-width: 400px) {
    .container {
        width: 90%;
    }
}



    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h2>Login Form</h2>
    <form  method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" value="Login">
    </form>
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

    $email = $_POST['email'];
    $password = $_POST['password'];


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
            $mail->Body    = "Hello, $email! You have successfully logged in.";

            
            if ($mail->send()) {
                echo 'Login successful! A confirmation email has been sent to ' . $email;
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } 
?>
