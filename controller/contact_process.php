<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	if(isset($_POST["contact"])){

		if( !empty($_POST['text']) && !empty($_POST['name']) &&
		!empty($_POST['email']) && !empty($_POST['subject'])){
			$message=$_POST['text'];
			$name=$_POST['name'];
			$email=$_POST['email'];
			$subject=$_POST['subject'];

			// Load Composer's autoloader
			require '../vendor/autoload.php';
			
			try{
				// Instantiation and passing `true` enables exceptions
				$mail = new PHPMailer(true);

				//Server settings
				                     // Enable verbose debug output
				$mail->isSMTP();                                            // Send using SMTP
				$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
				$mail->Username   = 'brunostreet12@gmail.com';                     // SMTP username
				$mail->Password   = '';                               // SMTP password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
			
				//Recipients
				$mail->setFrom($email, $name);
				$mail->addAddress('brunostreet12@gmail.com', 'Bruno Calle');     // Add a recipient
				$mail->addAddress('brunostreet12@gmail.com');               // Name is optional
				
				/*$mail->addReplyTo('info@example.com', 'Information');
				$mail->addCC('cc@example.com');
				$mail->addBCC('bcc@example.com');*/
			
				// Attachments
				/*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
				$mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/   // Optional name
			
				// Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = ("$email($subject)");
				$mail->Body    = ("<strong>from:</strong> ".$name."<br/>".$message);
				
				//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				if($mail->send()){
					echo "<script>console.log('enviado')</script>";
					echo "<script>
					$(document).ready(function(){
						var form=$('#contactForm');
						form.trigger('reset');
						form.html('<h1>Listo!</h1><p>Trataremos de responderte lo más pronto posible</p>');
					})
					</script>";
				}
				
			} catch (Exception $e) {
				echo "<script>alert('Fallo en el envío');</script>";
			}
		} else {
			echo "<script>
			$(document).ready(function(){
				Swal.fire('Debes llenar todos los espacios!');
			})
			</script>";
		}
<<<<<<< HEAD:controller/contact_process.php
	}
=======
	}

	
	
	
	
?>
>>>>>>> 775b4994922328e544430c8f805816b89d767d88:contact_process.php
