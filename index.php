<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  
	<meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
	<script src="behaviour.js">hello</script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	
	
    <title>Hufflepuff College</title>
	
	<style>
		section h1 {
			background-color:#66e0ff;
			padding-top:30px;
			padding-bottom:30px;
			text-align:center;
		}
		
		span {
			color: #cc00ff;
		}
		
		
		input {
			margin-top:20px;
			width: 40%;
			display: block;
			margin: 1px auto;
		}
		
		
	</style>
	
  </head>
  <body>
  
	<!------ nav bar ------>
	
    <div class="nav-bar">
	<nav class="navbar navbar-expand-lg">
	<a class="navbar-brand" href="#"><img src="img/HF3.jpeg"></a>
	
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" 
		aria-expanded="false" aria-label="Toggle navigation">
		<i class="fa fa-bars"></i>
	</button>
	
	<div class="collapse navbar-collapse" id="navbarNav">
	<ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<a class="nav-link" href="index.php">HOME</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#footer">ABOUT US</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#button-4">REQUEST NOW !</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#button-5">CHECK STATUS</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="includes/map.php">LOCATION</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="https://mail.google.com/mail/" >CONTACT US</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="login.php" >LOG IN</a>
		</li>
    </ul>

	<style>
  /* Change the color of links on hover */
  .nav-item a:hover {
  background-color: #00cc99;
  color: black;
  }

  /* Add an active class to highlight the current page */
  .nav-item a.active {
  background-color: #4CAF50;
  color: white;
  }

  /* Hide the link that should open and close the topnav on small screens */
  .nav-item .icon {
  display: none;
  }
  </style>

	</div>
	</nav>
	</div>
	
	
	



	<!------ header ------>
	
	<header>
		WELCOME BACK
		<br>
		TO COLLEGE!
		<br>
		<h3>New Intake for 2020/2021</h3>
	</header>

	<section id=body>
	
		<h1><span>Hufflepuff</span> Registration College</h1>

	<!-- Flex Container -->
	
	<div id="container">
	
	<div class="button" id="button-4">
	<div id="underline"></div>
	<a href="#">Request Now!</a>
	</div>

	<div class="button" id="button-5">
	<div id="translate"></div>
	<a href="#">Check Status!</a>
	</div>

	<div class="button" id ="button-2">
	<div id="slide"></div>
	<a href='includes/map.php'>Search Location!</a>
	</div>	


	<!-- End Container -->
	</div>
	</section>
	
	
	<!----------modal section----->
	<div class="bg-modal">
  <div class="modal-content">
    <div class="close">+</div>
    <h4>Request Now!</h4>
	<br>

    <form class="" action="includes/request.inc.php" method="POST">

	
      <?php
       if(isset($_GET['name']))
       {
         $name = $_GET['name'];
         echo '<input type="text" name="name" placeholder="Name" value="'.$name.'">';

       }
       else{
         echo '<input type="text" name="name" placeholder="Name">';
       }
      echo '<br>';


       if(isset($_GET['id']))
       {
         $id = $_GET['id'];
         echo '<input type="text" name="id" placeholder="Student ID(NUMBER ONLY)" maxlength="10" required value="'.$id.'">';

       }
       else{
         echo '<input type="text" name="id" maxlength="10" required placeholder="Studet ID(NUMBER ONLY)">';
       }


       echo '<br>';
       if(isset($_GET['blok']))
       {
         $blok = $_GET['blok'];
         echo '<input type="text" name="blok" placeholder="College Blok(M16,M17,M22,M23)" maxlength="5" required value="'.$blok.'">';

       }
       else{
         echo '<input type="text" name="blok"maxlength="5" required placeholder="College Blok(M16,M17,M22,M23)">';
       }
      echo '<br>';


       ?>



       <button type="submit" name="submit">Request Now!</button>

    </form>
  <?php
      $fullUrl = "http://$$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

      if(strpos($fullUrl,"request=empty")==true)
      {
        Print '<script>alert("YOU DID NOT INSERT ALL FIELD");</script>';
      }
      if(strpos($fullUrl,"request=char")==true)
      {
        Print '<script>alert("YOU INSERT INVALID CHARACTER");</script>';
      }
      if(strpos($fullUrl,"request=success")==true)
      {
        Print '<script>alert("SUBMITTED");</script>';
      }
      ?>


  </div>
</div>


	<div class="bg-modal1">
  <div class="modal-content1">
    <div class="close1">+</div>
    <center>


    <h4>Approved!</h4>

    <?php
    session_start();
    include_once 'includes/dbh.inc.php';

    $sql = "select * from `approve`";

    $result = mysqli_query($conn, $sql);
    if (false === $result)
      {
         echo mysqli_error();
      }

  if ($result->num_rows > 0) {


      echo "<table><tr><th>ID</th><th>Name</th><th>Blok</th></tr>";


      while($row = $result->fetch_assoc()) {


          echo "<tr><td>" . $row["approve_id"]. "</td><td>" . $row["approve_name"]. "</td><td>" . $row["approve_blok"]."</td>

          </td>


          </tr>";


      }

      echo "</table>";

  } else {

      echo "0 results";

  }



    ?>

    <h4>Rejected!</h4>

    <?php

    include_once 'includes/dbh.inc.php';



    $sql = "select * from `reject`";

    $result = mysqli_query($conn, $sql);
    if (false === $result)
      {
         echo mysqli_error();
      }



  if ($result->num_rows > 0) {


      echo "<table><tr><th>ID</th><th>Name</th><th>Blok</th></tr>";


      while($row = $result->fetch_assoc()) {


          echo "<tr><td>" . $row["reject_id"]. "</td><td>" . $row["reject_name"]. "</td><td>" . $row["reject_blok"]."</td>

          </td>


          </tr>";


      }

      echo "</table>";

  } else {

      echo "0 results";

  }



    ?>
  </center>
  </div>
</div>


	<!--<div class="bg-modal2">
  <div class="modal-content2">
    <div class="close2">+</div>
    <center>
    <h4>Map!</h4>
    <div class="floating panel">
      <select id="start">
        <option value="UTM,SKUDAI">UTM</option>
      </select>
      <select id="end">
        <option value="M16,KTDI, UTM">M16</option>
        <option value="M17,KTDI, UTM">M17</option>
        <option value="M22,KTDI, UTM">M22</option>
        <option value="M23,KTDI, UTM">M23</option>
      </select>
    </div>
    <div id="map"></div>
    <script>
      function initmap()
      {
        var directionsService=new google.maps.DirectionsService;
        var directionsDisplay= new google.maps.DirectionRenderer;
        var map = new google.maps.Map(document.getElementById('map'),{
          zoom: 7;
          center: {lat:41.85,lng:-87.65}
        });
        directionDisplay.setMap(map);

        var onChangeHandler=function()
      {
        calculateAndDisplay(directionsService, directionsDisplay);
      };

      document.getElementById('start').addEventListener('change',onChangeHandler);
      document.getElementById('end').addEventListener('change',onChangeHandler);
      }

      function calculateAndDisplayRoute(directionsService,directionsDisplay)
      {
        directionsService.route({
          origin:document.getElementById('start').value,
          destination:document.getElementById('end').value,
          travelMode:'DRIVING';},function(response,status){
            if(status==='OK')
            {
              directionsDisplay.setDirections(response);
            }
            else {
              {
                window.alert('Direction request failed due to '+status);
              }
            }
          });

      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>



  </center>
  </div>
</div>
-->

	<!--footer-->

	<footer>
	<div class="footer" id="footer">
      <div class="container-fluid p-0">
        <div class="row text-left">

                <div class="col-md-5 col-sm-5">
                    <h3> Contact Us </h3>
                    <p class="text-muted">Further information and enquires regarding admission to HUFFLEPUFF College, 
                      please forward to the following address</p>                  
                    <p>Telephone No : 03-2456 7896 
                      <br>
                      Fax No : 603-55223311
                      <br>
                      Email : admission@hpcollege.edu.my 
                    </p>
                    <p class="pt-4 text-muted">Copyright ©2019 All rights reserved </p>
                </div>          
        
                <div class="col-md-5 col-sm-12">
                    <h3> Newsletter </h3>                     
                      <ul>                    
                        <li>
                            <div class="input-append subscribe-btn text-center">
                                <input type="text" class="full text-center" placeholder="Email ">
                                <button class="btn  btn-warning" type="button"> Subscribe <i class="fa fa-mail"> </i> </button>
                            </div>
                        </li>
                    </ul>                  
                </div>

                <div class="col-md-2 col-sm-12">
                    <h3> Follow Us </h3>
                  
                    <ul class="social">
                        <li> <a href="https://web.facebook.com/"> <i class="fa fa-facebook">   </i> </a> </li>
                        <li> <a href="https://twitter.com/login"> <i class="fa fa-twitter">   </i> </a> </li>
                        <li> <a href="https://mail.google.com/mail/"> <i class="fa fa-google-plus">   </i> </a> </li>
                        <li> <a href="https://www.pinterest.com/"> <i class="fa fa-pinterest">   </i> </a> </li>
                        <li> <a href="https://www.youtube.com/"> <i class="fa fa-youtube">   </i> </a> </li>
                    </ul>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
    <!--/.footer-->
    
   <!-- <div class="footer-bottom">
        <div class="container">
            <p class="pull-center"> Copyright � 2004-2018. All rights reserved. </p>
        </div>
    </div> -->
    <!--/.footer-bottom--> 
</footer>





  </body>
<script src="behaviour.js">hello</script>
</html>
