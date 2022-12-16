<?php  
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require '../PHPMailer-6.6.5/src/Exception.php';
    require '../PHPMailer-6.6.5/src/PHPMailer.php';
    require '../PHPMailer-6.6.5/src/SMTP.php';
    
    $mail = new PHPMailer(true);
                            
   try {

    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;   //Enable SMTP authentication
    $mail->Username   = 'dgenig115@gmail.com';                     //SMTP username
    $mail->Password   = 'vwochsgyhoqzeimo';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                                
    //Recipients
    $mail->setFrom( $_POST["email"]);
    $mail->addAddress('enig115.gui@gmail.com');
    $mail->addReplyTo($_POST["email"]);     //Add a recipient
    
              //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
          
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                                
    //Content
    $mail->isHTML(true);  //Set email format to HTML
    $mail->Subject = $_POST["subject"];
    $mail->Body    = $_POST["message"];
    if($mail->send()){
      header("location:contactez-nous.php?success=1");
    }else{
      header("location:contactez-nous.php?erreur=0");
    }
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>