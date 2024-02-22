<?php
   $con = new mysqli("localhost","root","","crud5");
   if($con->connect_error){
    die("connection failded".$con->connect_error);
   }
?>