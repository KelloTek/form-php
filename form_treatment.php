<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once "vendor/autoload.php";

    use Dotenv\Dotenv;

    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $phone = htmlspecialchars($_POST["phone"]);
        $subject = htmlspecialchars($_POST["subject"]);
        $message = htmlspecialchars($_POST["message"]);

        try {
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = $_ENV["MAIL_HOST"];
            $mail->SMTPAuth = true;
            $mail->Port = $_ENV["MAIL_PORT"];
            $mail->Username = $_ENV["MAIL_USER"];
            $mail->Password = $_ENV["MAIL_PASS"];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->setFrom($_ENV["MAIL_FROM"]);
            $mail->addAddress($_ENV["MAIL_RECIPTIENT"]);
            $mail->CharSet = "UTF-8";
            $mail->Encoding = "base64";
            $mail->isHTML(true);
            $mail->Subject = "[Formulaire de contact] Demande de " . $name . " - " . $subject;
            $mail->Body = "Adresse-email : " . $email . "<br>" . "Numéro de téléphone: " . $phone . "<br><br>" . "Message: <br>" . $message;
            $mail->AltBody = $message;
            $mail->send();
            header("Location: index.php?status=ok");
        } catch (Exception $e) {
            echo "Message could not be send. Mail Error: " . $e->getMessage();
            header("Location: index.php?status=no");
        }
    }
?>