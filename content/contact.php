<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
//ini var
//var erreur
$nomError = $mailError = $telError = $messageError = "";
//Var post + success
$nom= $email = $tel = $message  = $success = "";

// Form POST
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["nom"])){
        $nomError = "Nom vide.";
    } else{
        $nom =$_POST["nom"];
        //verif que des lettres
        if(!preg_match("/^[a-zA-Z\s]*$/",$nom)){
            $nomError = "Le nom doit contenir que des lettres et espaces";
        }
    }

    if (empty($_POST["mail"])){
        $mailError = "Email vide.";
    } else {
        $email = $_POST["mail"];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $mailError = "Format mail invalide.";
        }
    }

    if (empty($_POST["tel"])){
        $telError = "Telephone vide";
    } else {
        $tel = $_POST["tel"];
        if (!preg_match("/(\+41|0041|0){1}(\(0\))?[0-9]{2}[\s.-]?[0-9]{3}[\s.-]?[0-9]{2}[\s.-]?[0-9]{2}$/",$tel)) {
            $telError = "Telephone pas valide.";
    }
    }


    if (empty($_POST["message"])){
        $message = "";
        $messageError="Message vide";
    } else {
        $message = $_POST["message"];
    }

    if($nomError == '' && $mailError == '' && $telError == '' && $messageError == '' ){
        $messageBody = '';
        unset($_POST['submit']);
        foreach ($_POST as $key => $value){
            $messageBody .= "$key: $value\n";
        }



// Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'dyxx555@gmail.com';                     // SMTP username
            $mail->Password = '***';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom($email, 'test');
            $mail->addAddress('dyxx555@gmail.com', 'dylan');     // Add a recipient


            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Contact formative';
            $mail->Body = $message;
            $mail->AltBody = $message;

            $mail->send();
            $success = "Message envoyé, Merci de nous avoir contacté !";
        } catch (Exception $e) {
            $success = FALSE;
        }



    }
}

include '../main/header.php';
?>


    <section id="contactForm">
      Contact

        <form method="post" action="contact.php">

            <input type="text" name="nom" placeholder="Nom"/>
        <label class="error"><?php echo $nomError; ?></label>
            <br />
        <input type="text" name="tel" placeholder="Téléphone"/>
        <label class="error">   <?php echo $telError; ?></label>
        <br />
            <input type="email" name="mail" placeholder="Email"/>
        <label class="error">     <?php echo $mailError; ?></label>
            <br />
            <textarea name="message" placeholder="Message"></textarea>
        <label class="error">    <?php echo $messageError; ?></label>
            <br />
            <button name="submit" type="submit">Envoyer</button>
        </form>
        <label class="success"><?php echo $success; ?></label>
    </section>


    </div>
    <script type="text/javascript" src="../js/uikit.min.js"></script>
    <script type="text/javascript" src="../js/uikit-icons.min.js"></script>
    <script type="text/javascript" src="../js/index.js"></script>
    </body>
<?php
include '../main/footer.php';
?>