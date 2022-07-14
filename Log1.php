<?php

$dbcn=mysqli_connect("localhost:3308","root","","movie_watchers");

if(isset($_POST['Uname'])){

         $uname=$_POST['Uname'];
         $pw=$_POST['pw'];

         $r=mysqli_query($dbcn,"select * from accounts where email='".$uname."'");

         $result=mysqli_query($dbcn,"select * from accounts where email='".$uname."' and password='".$pw."'");

         if(mysqli_num_rows($r)==0){
              include "exlog.php";
         }elseif(mysqli_num_rows($result)==1){
              include "Log2.php";
         }else{
              include "Afterlog.php";
         }
 }
mysqli_close($dbcn);

?>
