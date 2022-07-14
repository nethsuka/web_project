<html>
<head>
<link rel="stylesheet" type="text/css" href="Log2.css">
<style>

.ur{
  font-size:16px;
  display:block;
  background-color:brown;
  width:100px;
  text-align:center;
  height:25px;
  border-radius:15px;
  padding:6px;
  }

</style>

</head>
<body>
<?php

   $p=mysqli_query($dbcn,"select *from accounts where email='".$uname."'");

?>

<h2>
<?php

   $row=mysqli_fetch_assoc($p);
   echo "Hello ".$row['first_name']." !";

?>
</h2>
<div class="go">
    <img src="Logimg.jpg" height=150px width=150px><br><br>
    <h3><u>Movie site links</u></h3><br>
    <a href="https://www.magnetdl.com" target="_blank">MagnetDL</a><br><br>
    <a href="https://www.1337xxx.to" target="_blank">1337x</a><br><br>
    <a href="http://pirateproxy-bay.com" target="_blank">The Pirat Bay</a><br><br>
    <a href="https://www.yts.mx" target="_blank">YTS</a><br><br>
    <a href="https://www.torrentz2" target="_blank">Torrentz2</a><br>
</div>
<div class="full">
    <div class="k">
     <?php

        echo "<table border='0'>";
           echo "<tr>";
               echo "<td>";
                   echo "Full name :";
               echo "</td>";
               echo "<td>";
                   echo $row["first_name"]." ".$row["last_name"];
               echo "</td>";
            echo "</tr>";
            echo "<tr>";
               echo "<td>";
                   echo "Email :";
               echo "</td>";
               echo "<td>";
                   echo $row["email"];
               echo "</td>";
            echo "</tr>";
            echo "<tr>";
               echo "<td>";
                 echo "location";
               echo "</td>";
               echo "<td>";
               echo "</td>";
            echo "</tr>";
            echo "<tr>";
               echo "<td>";
                   echo "Country :";
               echo "</td>";
               echo "<td>";
               echo "</td>";
            echo "</tr>";
             echo "<tr>";
               echo "<td>";
                   echo "password :";
               echo "</td>";
               echo "<td>";
                   echo $row["password"];
               echo "</td>";
            echo "</tr>";
            echo "<tr>";
               echo "<td>";
                   echo "Tel No :";
               echo "</td>";
               echo "<td>";
                   echo $row["tel_no"];
               echo "</td>";
            echo "</tr>";

        echo "</table>";
     ?>
    </div>
    <div class="l">
    <br><br>
    <label style="font-family:arial;">Download the Jungle Cruise movie sinhala sub :</label>

    <a href="data/Jungle-Cruise-2021-Blu-Ray.zip" download class="ur">Download</a><br><br>

    <form method="POST" action="">
           <input type="file" name="uploadfile" value="">
           <button type="submit" name="upload">UPLOAD</button><br><br>

    <!--customized profile contents-->
    <?php
    if ($uname=='soo@gmail.com') {
      ?>
      <label style="font-family:arial;">my new :</label>
      <a href="data/Jungle-Cruise-2021-Blu-Ray.zip" download class="ur">Download</a>

  <?php } ?>

    </div>
</div>


</body>
</html>
