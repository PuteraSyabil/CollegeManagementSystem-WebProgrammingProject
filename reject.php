<?php
/*include_once 'includes\dbh.inc.php';

$id=$_GET['id'];

$sql="DELETE FROM users WHERE user_id=$id;";

if($conn->query($sql)===TRUE)
{
  echo "Record rejected and deleted";
}
else {
  echo "Error deleting record".$conn->error;
}
?>
<a href="list.inc.php";
*/

include_once 'includes\dbh.inc.php';
$id=$_GET['id'];


$sql="SELECT * FROM users WHERE user_id=$id;";
$sql="INSERT INTO reject(reject_id,reject_name,reject_blok)
      SELECT user_id,user_name,user_blok FROM users WHERE user_id=$id;";


      if($conn->query($sql)===TRUE)
      {
        Print '<script>alert("RECORD INSERTED INTO TABLE REJECT");</script>';
      }
      else {
        echo "record fail to insert";
      }


      $sql="DELETE FROM users WHERE user_id=$id;";
      if($conn->query($sql)===TRUE)
      {
        Print '<script>alert("RECORD DELETED FROM TABLE USERS");</script>';
      }
      else {
      Print '<script>alert("Error deleting record");</script>';
	  }
		
		
	header("Location: index-admin.php");
    exit();