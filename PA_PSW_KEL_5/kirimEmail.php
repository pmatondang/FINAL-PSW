<?php

    use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_POST['name']) && isset($_POST['email']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $body = $_POST['body'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "proyekpsw2@gmail.com";
        $mail->Password = "akusangatganteng";
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        $mail->isHTML(true);
        $mail->setfrom($email, $name);
        $mail->addAddress($email, $name);
        $mail->Subject = $subject;
        $mail->Body = $body;

        if($mail->send()){
            $status = "sukses";
           $response = "Email terkirim!";
        }
        else{
            $status = "gagal";
           $response =  "Ada Kesalahan : <br><br> " . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));
    }
?>