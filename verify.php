<html>
<body>
  <?php
     $g=mysqli_connect("localhost","id18776715_root","SORRYmachan//123","id18776715_movie_watchers");

     if(isset($_GET[code])) {
       $verification_code=$_GET['code'];

       $result=mysqli_query($g, "SELECT * FROM accounts where verification_code='$verification_code'");

       if(mysqli_num_rows($result)==1) {
         $result=mysqli_query($g, "UPDATE accounts SET is_active= true, verification_code= NULL WHERE verification_code='$verification_code' limit 1");
       }

       if(mysqli_affected_rows($g)==1){
         echo "Email Address Verified Successfully";
       }else{
         echo "Invalied verification code";
       }

  }
?>

</body>
</html>
