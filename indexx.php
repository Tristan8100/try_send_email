<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if(isset($_POST['sendd'])){
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'gtristan543@gmail.com';
        $mail->Password = 'beyd fvmz dhdl xkcb';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('gtristan543@gmail.com');
        $mail->addAddress($_POST['emm']); //marktristan260@gmail.com
        $mail->isHTML(true);
        $mail->Subject = $_POST['subb'];
        $mail->Body = $_POST['mess'];

        $mail->send();

        $message = 'Send Succesfully';

        header("Location: indexx.php?mess=" . urlencode($message));
        exit();
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        echo 'test 1';
        if(isset($_GET['mess'])){
            echo '<script>alert("' . htmlspecialchars($_GET['mess']) . '");</script>';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>SEND EMAIL</h1>

    <form action="indexx.php" method="POST">
        <label for="itn">Email: </label>
        <input type="email" name="emm" required> <br>

        <label for="itp">Subject: </label>
        <input type="text" name="subb" required> <br>

        <label for="per">Message: </label>
        <input type="text" name="mess"  required> <br>

        <input type="submit" name="sendd">
    </form>
</body>
</html>