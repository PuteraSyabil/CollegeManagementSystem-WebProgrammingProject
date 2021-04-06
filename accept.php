
<?php
/*
include_once 'includes\dbh.inc.php';
$id=$_GET['id'];
$query ="select * from 'users' where 'user_id'='$id';";

$result = mysqli_query($conn, $query);
$resultCheck=mysqli_num_rows($result);

if($resultCheck>0)
{
  while($row=mysqli_fetch_assoc($result))
  {
    $name=$row['user_name'];
    $sid=$row['user_id'];
    $blok=$row['user_blok'];

    $query.="INSERT INTO 'approves'('approve_id','approve_name','approve_blok') VALUES($sid,$name,$blok);";

  }
  $query="DELETE FROM 'users' WHERE 'users'.'id'='$id';";

}
*/




include_once 'includes\dbh.inc.php';
$id=$_GET['id'];


$sql="SELECT * FROM users WHERE user_id=$id;";
$sql="INSERT INTO approve(approve_id,approve_name,approve_blok)
      SELECT user_id,user_name,user_blok FROM users WHERE user_id=$id;";


      if($conn->query($sql)===TRUE)
      {
        Print '<script>alert("RECORD INSERTED INTO TABLE APPROVE");</script>';
      }
      else {
        echo "record fail to insert";
      }
/*if($result = mysqli_query($conn,$sql))
{
  while($row = mysqli_fetch_assoc($result))
  {
    $sid=$row['user_id'];
   $name=$row['user_name'];
    $blok=$row['user_blok'];


    $sql="INSERT INTO approve('approve_id','approve_name','approve_blok') FROM VALUES ($sid,$name,$blok);";
    if($conn->query($sql)===TRUE)
    {
      echo "Record inserted";
    }
    else {
      echo "record not inserted";
    }
  }
  */

  $sql="DELETE FROM users WHERE user_id=$id;";
  if($conn->query($sql)===TRUE)
  {
    Print '<script>alert("RECORD DELETED FROM TABLE USE");</script>';
  }
  else {
    Print '<script>alert("Error deleting record");</script>';
  }

//}
  header("Location: index-admin.php");
  exit();