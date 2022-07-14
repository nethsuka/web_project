<html>
  <head>
    <title></title>
    <style>

    #voo{
         background-color: #7FFF00;
         color: black;
         width: 205px;
         height: 50px;
         text-align: center;
         border-radius: 15px;
         font-weight: bold;
         font-size: 20px;
       }

    #foo{
          width: 500px;
          height: 50px;
          color: black;
          font-size: 25px;
          border-radius: 15px;
          border: hidden;
       }

   body{
        background-image: url("Log_background.jpg");
        font-family: arial;
     }

   label{
        font-size: 25px;
        color: black;
        font-weight: bold;
        font-family: arial;
     }
    </style>
  </head>
  <body>
    <br><br><br><br><br><br><br><br>
    <center><div>
    <form class="" action="" method="post">
      <label>Your Email :</label>
      <input type="text" name="rmail" placeholder="myname@mail.com" id="foo" required>
      <input type="submit" name="submit" value="Send Recovery Mail" id="voo">
    </form>
  </div></center>

  <?php
     $db=mysqli_connect("localhost:3308","root",'',"movie_watchers");

    if(isset($_POST['submit'])){

         $rmail=$_POST['rmail'];

         $p=mysqli_query($db ," SELECT * from accounts where email='$rmail'");

         if(mysqli_num_rows($p)==0){
           echo "<center><h2>It looks like you don't have an account yet !</h2></center>";
           exit();
         }

         //sending email
         $recover_code=sha1($rmail.time());
         $resetlink='https://www.sanupro.gq/resetpw.php?email='.$rmail.'&code='.$recover_code;

         $p=mysqli_query($db, " INSERT INTO reset_pw (email,active,reset_code,password) values('$rmail','false','$recover_code','')");

         $to="$rmail";
         $sender="sanubro55@gmail.com";
         $subject="Reset Account Password";
         $body="Dear user,\r\n\r\nReset your account password\r\nClick Link : ".$resetlink."\r\n\r\n~Thank You~\r\nSanupro Works";

         $header=$sender;

         $test=mail($to, $subject, $body, $header);


       if($test){
           echo "<center><h1>Check Your Email</h1></center>";
       }else{
              echo "<center><h1>Coulden't Send Mail Try To Resend</h1></center> ";
        }
    }


   ?>



  </body>
</html>
