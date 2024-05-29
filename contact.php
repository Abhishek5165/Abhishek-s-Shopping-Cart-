<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./fevi.png">
    <title>Contact Form</title>

    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">


</head>
<style>
    body {
        background: #9DDE8B;
        margin: 0;
    }

    .form {
        width: 600px;
        position: relative;
        top: 30px;
        height: 560px;
        background: #e6e6e6;
        border-radius: 8px;
        box-shadow: 0 0 40px -10px #000;
        margin: 0 auto;
        padding: 20px 30px;
        max-width: calc(100vw - 40px);
        box-sizing: border-box;
        font-family: 'Montserrat', sans-serif;
        position: relative;
    }

    h2 {
        margin: 10px 0;
        padding-bottom: 10px;
        width: 180px;
        color: #002379;
        border-bottom: 3px solid #78788c;
    }

    input {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        background: none;
        outline: none;
        resize: none;
        border: 0;
        font-family: 'Montserrat', sans-serif;
        transition: all .3s;
        border-bottom: 2px solid #bebed2;
    }

    input:focus {
        border-bottom: 2px solid #78788c;
    }

    p:before {
        content: attr(type);
        display: block;
        margin: 28px 0 0;
        font-size: 16px;
        color: #002379;
    }

    button {
        float: right;
        padding: 8px 12px;
        margin: 8px 0 0;
        border-radius: 20px;
        font-family: 'Montserrat', sans-serif;
        border: 2px solid #151515;
        background: 0;
        color: #000000;
        cursor: pointer;
        transition: all .3s
    }

    button:hover {
        background: #A91D3A;
        color: #fff;
    }

    div {
        content: 'Hi';
        position: absolute;
        bottom: 10px;
        right: -20px;
        background: #0A6847;
        color: #fff;
        width: 500px;
        padding: 16px 4px 16px 0;
        border-radius: 6px;
        font-size: 13px;
        box-shadow: 10px 10px 40px -14px #000;
    }

    span {
        margin: 0 5px 0 15px
    }


    @media only screen and (max-width: 768px) {

        div {
            width: 240px;
        }
    }
</style>

<body class="background-img">
    <form class="form" id="contact-form" method="post">
        <h2>CONTACT US</h2>
        <p type="Name:"><input placeholder="Write your name here.." name="name"></input></p>
        <p type="Email:"><input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Let us know how to contact you back.." name="email"></input></p>
        <p type="Message:"><input placeholder="What would you like to tell us.." name="message"></input></p>
        <button name="send">Send Message</button>
        <div>
            <span class="fa fa-phone">Name : ABHISHEK VERMA</span><br>
            <span class="fa fa-envelope-o">Mobile : +91 8707814022 🙂</span>
        </div>
    </form>
    <style>
div[style*="text-align: right;position: fixed;z-index:9999999;bottom: 0;width: auto;right: 1%;cursor: pointer;line-height: 0;display:block !important;"] {
    display: none !important;
}

img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
    display: none !important;
}

a[href*="https://www.000webhost.com/?utm_source=000webhostapp&utm_campaign=000_logo&utm_medium=website&utm_content=footer_img"] {
    display: none !important;
}
</style>
</body>

</html>


<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['send'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //Load Composer's autoloader

    require './PHPMailer/Exception.php';
    require './PHPMailer/PHPMailer.php';
    require './PHPMailer/SMTP.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings

        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'abhishek1310verma@gmail.com';                     //SMTP username
        $mail->Password   = 'qadiwamlmymrjjde';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('abhishek1310verma@gmail.com', 'Website User');
        $mail->addAddress('abhishek1000verma@gmail.com', 'Abhishek');     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Contact Form';
        $mail->Body    = "Sender : $name <br> Email : $email <br><br> Message : $message";

        $mail->send();
        echo "<script>alert('Message Has Been Sent !')</script>";
    } catch (Exception $e) {
        echo "<script>alert('Message Could't Sent !')</script>";
    }
}

?>