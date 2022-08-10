<?php
require("PHPMailer-5.2-stable/class.phpmailer.php");
require("PHPMailer-5.2-stable/class.smtp.php");
session_start();
$message=$_SESSION['msg']."<br>"."Payment Method: ".$_SESSION['paym']."<br>"."Payment Status: Complete"."<br><br>"."Regards,"."<br>"."Pet Pash";
error_reporting(E_ALL);
$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->From = "petpash123@gmail.com";
$mail->FromName = "PetPash Organization";
$mail->Host = "smtp.gmail.com"; // specif smtp server
$mail->SMTPSecure= "ssl"; // Used instead of TLS when only POP mail is selected
$mail->Port = 465; // Used instead of 587 when only POP mail is selected
$mail->SMTPAuth = true;
$mail->Username = "petpash123@gmail.com"; // SMTP username
$mail->Password = "keepcalm123"; // SMTP password
$mail->addAddress($_SESSION['oemail']);
$mail->IsHTML(true); // set email format to HTML
$mail->Subject = 'Order Placed Successfully';
$mail->Body = $message;

      if($mail->send())
      { 
      header("location:orderthanks.php");
  }
  else
  {
    echo "Error In Processing. Please Try Again. ";
  }

?>
