<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['sendMSG'])) {
	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$subject = htmlspecialchars($_POST['subject']);
	$message = htmlspecialchars($_POST['message']);

	$mail = new PHPMailer(true);

	try {
		$mail->isSMTP();

        $mail->Host       = 'mail.drmcoders.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'emailapin@drmcoders.com';
        $mail->Password   = 'ggxcWBYPB=Cl_[;B';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        
		// Recipients
		$mail->setFrom('noreply@drmcoders.com', $name);  // from the user
		$mail->addAddress('rashida.akther.off2022@gmail.com', 'website'); // to your Gmail
		$mail->addReplyTo($email, $name);
		
		// Content
		$mail->isHTML(true);
		$mail->Subject = $subject;
		$mail->Body	= '
				<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                </head>
                <body>
                    <div style="border: 1px solid #ccc; padding: 15px; margin: 20px auto; max-width: 500px;">
                        <h1 style="margin:auto 10px">'.$subject.'</h1>
                        <center><img src="https://cdn-icons-png.flaticon.com/512/6806/6806987.png" alt="Placeholder Image" width="120"></center><br><br>
                        <p>'.$message.'</p>
                        <p>Sended By:</p>
                        <h3>'.$name.'</h3>
						<hp>'.$email.'</p>
                    </div>
                </body>
                </html>';

			if($mail->send()){
			    $msg = "Message has been sent successfully!";
				echo '<script>
				        alert("'.htmlspecialchars($msg, ENT_QUOTES, 'UTF-8').'");
				        window.history.back()
				    </script>
				    ';
			};
		} catch (Exception $e) {
			echo '<script>
				        alert("Message could not be sent. Mailer Error: '.$mail->ErrorInfo.'");
				        window.history.back()
				    </script>
				    ';
		}
}
?>

