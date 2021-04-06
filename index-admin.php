<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="styleAdmin.css">
	<script src="Nav.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">

	
	
  </head>
  <body>

	<div class="topnav" id="myTopnav">
	<a href="index.php">Log Out</a>
	<a href="#rejected">Rejected</a>
	<a href="#approved">Approved</a>
	<a href="#tablet">Pending</a>
	<a href="#body" class="active">Search</a>
	<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
	</a>
</div>

<section id=body>
  <h1><span>Hufflepuff Admin</span></h1> 
  <h2> - Registration College - </h2>

  <center>
  <div class="form">
      <div class="form-heading">SEARCH STUDENT INFORMATION</div>
      <form action="list.inc.php" method="get">

          <?php
           if(isset($_GET['sid']))
           {
             $sid = $_GET['sid'];
             echo '<input type="text" name="sid" placeholder="Student ID" maxlength="9" value="'.$sid.'">';

           }
           else{
             echo '<input type="text" name="sid" placeholder="Student ID" maxlength="9">';
           }
          
          ?>
		  
		  <input type="reset" name="" value="reset">
		  <br>
          <button type="submit" class="btn" name="Submit">Search</button>
          
      </form>
  </div>
  </center>
 </section>
  
  <div class = "tablet" id="tablet">
	<h3>List of Pending Requests</h3>
	
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


      $sql = "select * from `users`";

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
  
  <div class = "approved" id="approved">
	<h3>List of Approved Requests</h3>
  
	<table  class="table" align="center" style="width:90%" >
        <tr>
          <th>STUDENT ID</th>
          <th>NAME</th>
          <th>BLOK</th>
        </tr>

      <?php
      include_once 'includes/dbh.inc.php';


      $sql = "select * from `approve`";

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
  </div>
  
  <div class = "rejected" id="rejected">
	<h3>List of Rejected Requests</h3>
  
  <table  class="table" align="center" style="width:90%" >
        <tr>
          <th>STUDENT ID</th>
          <th>NAME</th>
          <th>BLOK</th>
        </tr>

      <?php
      include_once 'includes/dbh.inc.php';


      $sql = "select * from `reject`";

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
	</div>
	
	</div>
	
  </body>
<script src="behaviour.js">hello</script>
</html>
