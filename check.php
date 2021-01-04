<?php 
  session_start();
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

$otp=$_POST['otp'];
include("connect.php");
$email= $_SESSION["email"];
// echo $email;
$sql="SELECT *from validate where Email='$email'";

$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $a=$row['Email'];
      $b=$row['otp'];
    if($email==$a&&$otp==$b)
    {
        echo "right otp";
        mysqli_query($con,"UPDATE validate set otp='' where Email='$a'");
    }
    else
    {
        echo "wrong otp";
    }
  }
} else {
  echo "0 results";
}
$con->close();





?>