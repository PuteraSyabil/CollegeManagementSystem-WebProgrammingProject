<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="styleAdmin.css">
    <script src="behaviour.js">hello</script>
    <meta charset="utf-8">
    <title></title>
	
	
  </head>
  <body>
  
  <div class="topnav" id="myTopnav">
	<a href="index.php">Log Out</a>
	<a href="index-admin.php">Pending</a>
	<a href="index-admin.php">Home</a>
	<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
	</a>
</div>

<section id=body>
  <h1><span>Hufflepuff Admin</span></h1> 
  <h2> - Registration Colllege - </h2>

  <h3>Pending List</h3>
  <table  class="table" align="center" style="width:90%" >
        <tr>
          <th>STUDENT ID</th>
          <th>NAME</th>
          <th>BLOK</th>
          <th colspan="2">STATUS</th>
        </tr>

      <?php
      session_start();
      include_once 'includes/dbh.inc.php';
      $sid = $_GET['sid'];


      $sql = "select * from `users` where `user_id` like '%$sid%'";

      $result = mysqli_query($conn, $sql);
      if (false === $result)
        {
           echo mysqli_error();
        }
      while($row = mysqli_fetch_assoc($result))
  	{
          Print '<tr>
                    <td>'.$row['user_id'].'</td>
  				              <td>'.$row['user_name'].'</td>
                            <td>'.$row['user_blok'].'</td>                 


                    <td><center>
                    <a href="accept.php?id='.$row['user_id'].'" class="btn btn-warning" role="button">Accept</a>
                    </center></td>
                    <td><center>
                    <a href="reject.php?id='.$row['user_id'].'" class="btn btn-danger" role="button">Reject</a>
                    </center></td>
                 </tr>';
        }

      ?>
  </table>
  
  <h3></h3>

  <h3>Accepted List</h3>
  <table  class="table" align="center" style="width:90%" >
        <tr>
          <th>STUDENT ID</th>
          <th>NAME</th>
          <th>BLOK</th>
        </tr>

      <?php
      include_once 'includes/dbh.inc.php';
      $sid = $_GET['sid'];


      $sql = "select * from `approve` where `approve_id` like '%$sid%'";

      $result = mysqli_query($conn, $sql);
      if (false === $result)
        {
           echo mysqli_error();
        }
      while($row = mysqli_fetch_assoc($result))
  	{
          Print '<tr>
                    <td>'.$row['approve_id'].'</td>
  				              <td>'.$row['approve_name'].'</td>
                            <td>'.$row['approve_blok'].'</td>                 
                 </tr>';
        }

      ?>
  </table>
  
  <h3></h3>

  <h3>Rejected List</h3>
  <table  class="table" align="center" style="width:90%" >
        <tr>
          <th>STUDENT ID</th>
          <th>NAME</th>
          <th>BLOK</th>
        </tr>

      <?php
      include_once 'includes/dbh.inc.php';
      $sid = $_GET['sid'];


      $sql = "select * from `reject` where `reject_id` like '%$sid%'";

      $result = mysqli_query($conn, $sql);
      if (false === $result)
        {
           echo mysqli_error();
        }
      while($row = mysqli_fetch_assoc($result))
  	{
          Print '<tr>
                    <td>'.$row['reject_id'].'</td>
  				              <td>'.$row['reject_name'].'</td>
                            <td>'.$row['reject_blok'].'</td>                 
                 </tr>';
        }

      ?>
  </table>
  
  <h3></h3>



</section>
  </body>
<script src="behaviour.js">hello</script>
</html>
