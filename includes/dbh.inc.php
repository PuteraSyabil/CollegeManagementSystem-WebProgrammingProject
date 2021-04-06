<?php
  $dbServername="localhost";
  $dbUsername="root";
  $dbPassword="";
  $dbName="wpproject";

  $conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

  if(!$conn)
{
  die('Could not Connect to MYSQL:'.mysql_error());
}
