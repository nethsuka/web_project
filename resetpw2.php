<!DOCTYPE html>
<html>
<head>
<style>

h1{
   font-family:Calibri;
   font-size:70px;
   text-align:center;
    }
body{
     background-image:url("Log_background.jpg");
        }

</style>
</head>
<body>
<br><br><br><br><br><br><br><br><br><br>
<h1>
    <?php
         //$result=mysqli_query($db ,"SELECT * FROM reset_pw where email='$code'");
         if($t) {
            mysqli_query($db ,"UPDATE reset_pw SET resetpw_code=NULL,pw_active=true WHERE resetpw_code='$code'");
            echo "<center><h2>Your password has been changed to the new one</font></h2></center>";
            exit();
        }else{
            echo "<center><h2>Coulden't change your password, some error occured ...!</h2></center>";
            exit();
        }
      ?>
</h1>

</body>
</html>
