<html>
  <head>
    <title></title>
    <style>

    body{
          background-image: url("Log_bacground.jpg");
           }
    div{
        margin: auto;
        background: transparent;
        background-color: #E6E6FA;
        width: 450px;
        height: 220px;
        padding: 25px;
        border-radius: 10px;
            }
    .tsp{
         font-size: 20px;
         width: 400px;
         height: 40px;
         font-family: arial;
         border-radius: 15px;
         border: hidden;
            }
     label{
           font-size: 20px;
           font-weight: bold;
           font-family: arial;
             }
     #subbut{
             font-size: 23px;
             font-family: arial;
             width: auto;
             height: 45px;
             border-radius: 15px;
             border: hidden;
             background-color: #808000;
             text-align: center;
               }
      h2{
          font-size: 40px;
          font-family: arial;
          text-align: center;
          }

    </style>
  </head>
  <body>
   <br><br><br><br><br>
   <?php
     $db=mysqli_connect("localhost:3308","root","","movie_watchers");

     if(isset($_GET[email]) && isset($_GET[code])) {
           $code=$_GET['code'];
           $email=$_GET['email'];
           $npw=$_POST['npw'];
           $ncpw=$_POST['ncpw'];

          $check=mysqli_query($db ,"SELECT * from reset_pw where reset_code='$code'");

          if(mysqli_num_rows($check)==1){
            mysqli_query($db ,"UPDATE reset_pw active=true,reset_code=NULL where reset_code='$code'");
          }else{
            echo "Invalied link";
            exit();
          }
            ?>

   <h2>Reset Password</h2><br>
   <div>
      <form method="post" action="">
         <label>Enter A New Password :</label>
         <input type="password" name="npw" placeholder=" Password" class="tsp" required><br><br>
         <label>Confirm Password :</label>
         <input type="password" name="ncpw" placeholder=" Reenter Password" class="tsp" required><br><br>
         <input type="submit" name="submit" value="Reset Password" id="subbut">
       </form>
   </div>
 <?php

    if(isset($submit)) {
       $t=mysqli_query($db ," UPDATE accounts SET password='$npw' WHERE email='$email' limit 1");

           if($t) {
             echo "Your password has been changed to the new one";
           }else{
             echo "Coulden't change your password, some error occured ...!";
           }
    }
    ?>

  </body>
</html>
