<html>
<head>
<style>

h1{
   font-family:Calibri;
   font-size:70px;
   text-align:center;
    }
body{
     background-image:url("Backimage.jpg");
        }
a{
    text-decoration:none;
    font-family:arial;
    font-size:25px;
    font-weight:bold;
    color:white;
      }

</style>
</head>
<body>
<br><br><br><br><br><br><br>

<?php

$g=mysqli_connect("localhost:3308","root","","movie_watchers");


if(isset($_POST['submit'])) {


         $fname= $_POST["fname"];
         $lname= $_POST["lname"];
         $mail= $_POST["email"];
         $num= $_POST["tno"];
         $pw= $_POST["pw"];
         $cpw= $_POST["cpw"];

         $f=mysqli_query($g, "select *from accounts where email='$mail'");
         if(mysqli_num_rows($f)==1) {
           echo "you already have an account";
           exit();
         }

         if($pw!=$cpw) {
           echo "conferm your password correctly";
           exit();
         }

         $verification_code=sha1($mail.time());
         $verify_link= 'https://www.sanupro.gq/verify.php?code='.$verification_code;

        mysqli_query($g,"insert into accounts (first_name,last_name,email,tel_no,password,is_active,verification_code) values('$fname','$lname','$mail','$num','$pw',false,'$verification_code');");

        //mail sending code

        $to= $mail; // receiver
        $sender= 'sanubro55@gmail.com'; //sender
        $mail_subject= "Verify Email Address";
        $email_body= "Dear ".$fname.",\r\nThank you for singing up. There is one more step. Click below link to verify your email adderss in order to activate your account\r\nVerify Link:".$verify_link.
        "\r\nThank You,\r\n~Sanubro Works~";


        $header= $sender;

       $s=mail($to,$mail_subject,$email_body,$header);

       if($s) {
           echo "please chech your email";
       }else{
           echo "error";
       }

 }

?>
<br><br><br>
<center><a href="index.html">---Back To Home Page---</a></center>


</body>
</html>
