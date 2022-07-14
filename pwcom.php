<html>
<body>
    <?php
      $db=mysqli_connect("localhost:3308","root","","movie_watchers");

      if(isset($_GET[email]) && isset($_GET[code])) {
            $code=$_GET['code'];
            $email=$_GET['email'];
            $npw=$_POST['npw'];
            $ncpw=$_POST['ncpw'];
    ?>        
  </body>
</html>
