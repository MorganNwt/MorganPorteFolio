<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once '../vendor/autoload.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $sujet = $_POST['sujet'];
        $message = $_POST['message'];

        $mail = new PHPMailer(true);

        try {
            // Configurations SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com'; // Utiliser le serveur SMTP d'Outlook
            $mail->SMTPAuth = true;
            $mail->Username = 'metodik60@hotmail.fr'; 
            $mail->Password = 'Morgan2toi1*$';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            // Destinataires
            $mail->setFrom($email, "$prenom $nom");
            $mail->addAddress('metodik60@hotmail.fr');

            // Contenu de l'e-mail
            $mail->isHTML(false);
            $mail->Subject = "Nouveau message de contact: $sujet";
            $mail->Body    = "Nom: $nom\nPrénom: $prenom\nEmail: $email\nTéléphone: $telephone\n\nMessage:\n$message";

            $mail->send();
            echo 'Message envoyé avec succès.';
        } catch (Exception $e) {
            echo "Échec de l'envoi du message. Erreur de PHPMailer : {$mail->ErrorInfo}";
        }
    } else {
        echo "Méthode de requête non prise en charge.";
    }
?>