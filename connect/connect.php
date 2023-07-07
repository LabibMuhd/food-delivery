<?php

$con=mysqli_connect("localhost","root","","fooddelivery");

if(!$con){
  echo "Error connecting to database " . mysqli_connect_error(); 
  die;
}

?>