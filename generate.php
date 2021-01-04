<?php 
 error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
session_start();
$email=$_POST['email'];
echo $email;
$_SESSION["email"]="$email";
$otp=rand(1111,9999);
include("connect.php");
$sql="INSERT into validate(email,otp) VALUES('$email',$otp)";
if($con->query($sql)==true)
{
 
$html="your otp verification code is".$otp;
smtp_mailer($email,'otp verification',$html);
}
else
{
    echo "query not run";
}


function smtp_mailer($to,$subject,$msg)
{
require 'vendor/autoload.php'; 
  
$mail = new PHPMailer(true); 
  
                                     
    $mail->isSMTP();                                             
    $mail->Host       = 'smtp.gmail.com;';                     
    $mail->SMTPAuth   = true;                              
    $mail->Username   = 'mouryasuneelsm.sm93@gmail.com';                  
    $mail->Password   = 'patanahi123@';                         
    $mail->SMTPSecure = 'tls';    
                              
    $mail->Port       = 587;   
  
    $mail->setFrom('mouryasuneelsm.sm93@gmail.com', 'Suneel Mourya');            
    $mail->addAddress($to); 
    
    $mail->isHTML(true);                                   
    $mail->Subject = $subject; 
    $mail->Body    = $msg; 
    
    $mail->send(); 
    echo "Mail has been sent successfully!"; 
 
}
?> 
