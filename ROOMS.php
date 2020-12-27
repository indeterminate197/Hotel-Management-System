<?php
session_start();
require 'includes/index.php';

?>

<!doctype html>
<html lang="en">
<head>
	<title>ROOMS</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<link rel="stylesheet" href="Bootstrap/CSS/Bootstrap.min.css" />
    <link rel="stylesheet" href="Bootstrap/CSS/Main.css" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    
	<!-- Top Row-->
	
	<div class ="container-fluid">
		<div class ="row" style ="background-color:#4B515D;">
			<div class ="col-md-3 offset-md-10">
			<?php
				if(isset($_SESSION['username'])){
					
					echo '<form action="logout.inc.php" method="POST">
					<button type="submit" class="btn btn-dark" name="logout" style ="margin-left:90px;">Logout</button></form>';
					
				}else{
					echo '<button type="button" class="badge badge-light" data-toggle="modal" data-target="#exampleModalCenter"
					style ="margin-left:40px;">SIGN IN / JOIN NOW
					</button>';
					
				}

			?>
				
				
			</div>
		</div>
	
	</div>	
		
	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class ="form-container">
						<form class="form-group" action ="" method ="POST">
							<h3 class="login">Discovery Login</h3>
							<p style ="padding-top:10px;">Login now to receive exclusive benefits for bookings on our website</p>
							<label for="exampleInput">User Name</label>
							<input type="text" name="username" class="form-control" id="exampleInput" placeholder="Enter username"required>
							<small id="emailHelp" class="form-text text-muted">We'll never share your info with anyone else.</small>
						
							<label for="exampleInputPassword1"class ="mt-1">Password</label>
							<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password"required>
						
							<button type="submit" name="login" id="" class="btn btn-primary btn-block mt-3" >Submit</button>
						
							<p class ="para2"style ="margin-top:20px;">Not a DISCOVERY Member yet?
							<a href="SIGN UP.php" class="btn btn-link" role="button">JOIN NOW</a></p>
						</form>
					
					<?php
						if(isset($_POST['login']))
						{
							$username=$_POST['username'];
							$password=$_POST['password'];
							$encrypted_password = md5($password);
							
							$query="select * from userinfo WHERE username='$username' AND password= '$encrypted_password'";
							$query_run = mysqli_query($conn,$query);
							
							if(mysqli_num_rows($query_run)>0)
							{
								//valid
								$_SESSION['username']= $username;
								header('location:HOME.php');
							}
							else
							{
								//invalid
								echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
							}
						}
						
						?>
					
				</div>
			</div>	
		</div>
	</div>
	</div>
	
        <!--navigation-->
  <nav class =" navbar navbar-expand-md navbar-dark bg-dark sticky-top">
  <div class="container-fluid">
       <a class="navbar-brand" href="HOME.php" style = "color:#76ff03;" >Alisson</a>
	   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
	        <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse offset-md-1" id="navbarResponsive">
		
			<ul class="navbar-nav">
			
				<li class="nav-item active"> 
			    <a class="nav-link" href="HOME.php"><h6>HOME</h6></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="ROOMS.php"><h6>ROOMS</h6></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="RESTAURANT.php"><h6>RESTAURANT</h6></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="OVERVIEW.php"><h6>OVERVIEW</h6></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="SERVICES.php"><h6>SERVICES</h6></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="CONTACTS.php"><h6>CONTACTS</h6></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="OFFER.php"><h6>OFFER</h6></a>
				</li>
			</ul>	
			<ul class="nav button offset-md-2" style ="padding-left:85px;">
			<a href="BOOK Trial.php" class="btn btn-info navbar-btn btn-lg">BOOK NOW</a>
			</ul>
		</div>
	</div>
	</nav>	
	
	<!--Image Slider-->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	<li data-target="#carouselExampleIndicators" data-slide-to="1" ></li>
	<li data-target="#carouselExampleIndicators" data-slide-to="2" ></li>
	<li data-target="#carouselExampleIndicators" data-slide-to="3" ></li>
	<li data-target="#carouselExampleIndicators" data-slide-to="4" ></li>

</ol>
<div class="carousel-inner">
     <div class="carousel-item active">
	      <img class ="Image" src="images/img/r-2.jpg" alt="ALLISON HOTEL">
		
	 </div>
	 <div class="carousel-item">
	      <img class ="Image1" src="images/img/r-1.jpg">
		 
	 </div>
	 <div class="carousel-item">
	      <img class ="Image2" src="images/img/r-3.jpeg">
		
	 </div>
	 
	 <div class="carousel-item">
	      <img class ="Image3" src="images/img/r-4.jpg">
		 
	 </div>
	 
	 <div class="carousel-item">
	      <img class ="Image4" src="images/img/r-5.jpg">
		 
	 </div>
	 
</div>

	<!-- Left and right controls -->
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<hr>

<!--headings-->
<div class ="container">
	<div class ="row">
		<div class ="col-md-12">
			<h1 class ="room mt-2"style ="text-align:center">ROOMS</h1>
			<h6 class =""style ="text-align:center">__________</h6>
		</div>
	</div>
		
		<div class ="row offset-md-1">
			<div class ="mt-3 col-md-12">
				<h4 class =""style ="font-family:Times">A wonderful choice of accommodation awaits with 142 bedrooms and junior suites together with 149 private bungalow suites.Guests can relax with their own private balconies, private pools, beautifully groomed gardens and generous terraces.</h4>
			</div>
		</div>	
</div>
<hr>

<!--ROOMS-->

<div class ="container">
	<div class="row offset-md-1">
		<div class ="mt-4 col-md-6 ">
			<div class ="mt-4 row">
				<h4 class =""style ="padding-left:120px;"><a href ="DELUXE DOUBLE ROOM.php" style="text-decoration:none;">DELUXE DOUBLE ROOM</h4></a>
				
			</div>
			<h6 class =""style ="text-align:center">_________</h6>
			<p class="well mt-3 offset-md-1 " style="color:#616161">Contemporary designed, stylish double room located <br> in main building.
			  All come with floor to ceiling windows,<br>  
			  offering impressive sea or inland views.</p>
			  <img class ="img-fluid mt-3" style ="padding-top:15px;" src ="images/ss1.png" />
		</div>
		<div class ="mt-5 col-md-6">	
			<img class="img-fluid" src ="images/r1.jpg"/>
		</div>
	</div>
	
	<div class="row offset-md-1">
		<div class ="mt-5 col-md-6">	
			<img class="img-fluid" src ="images/r2.jpg"/>
		</div>
		<div class ="mt-4 col-md-6">
			<div class ="mt-3 row">
				<h4 class ="mt-1"style ="padding-left:140px;"><a href =" DELUXE TRIPPLE ROOM.php"style="text-decoration:none;"> DELUXE TRIPPLE ROOM</h4></a>
			</div>
			<h6 class =""style ="text-align:center">_________</h6>
			<p class="well mt-4 offset-md-1 " style="color:#616161">Combining contemporary luxury, infinite space and a<br> premium beachfront location,
			  this suite sleeps up to six<br> in absolute comfort.</p>
			  <img class ="mt-4 img-fluid" style ="" src ="images/ss2.png"/>
		</div>
	</div>
	<div class="row offset-md-1">
		<div class ="mt-3 col-md-6 ">
			<div class ="mt-4 row">
				<h4 class =""style ="padding-left:150px;"><a href ="SUITE POOL VIEW.php"style="text-decoration:none;">SUITE POOL VIEW</h4></a>
			</div>
			<h6 class =""style ="text-align:center">_________</h6>
			<p class="well mt-3 offset-md-1 " style="color:#616161">Contemporary luxury comes to life in this ultra spacious,<br> stylish suite 
			  which sleeps five comfortably. It features a separate bedroom with 
			  bathroom en suite and elegant <br> lounge for added privacy and 
			  private secluded garden.</p>
			  <img class =" img-fluid" style ="padding-top:15px;" src ="images/ss3.png"/>
		</div>
		<div class ="mt-5 col-md-6">	
			<img class ="img-fluid" src ="images/r3.jpg"/>
		</div>
	</div>
	
	<div class="row offset-md-1">
		<div class ="mt-5 col-md-6">	
			<img class="img-fluid" src ="images/r4.1.jpg"/>
		</div>
		<div class ="mt-4 col-md-6">
			<div class =" row">
				<h4 class ="mt-3"style ="padding-left:130px;"><a href ="TWIN POOL VIEW.php"style="text-decoration:none;">TWIN POOL VIEW</h4></a>
			</div>
			<h6 class =""style ="text-align:center">_________</h6>
			<p class="well mt-3 offset-md-1 " style="color:#616161">An ultra-spacious suite in a prime, poolview location. Ideal<br> for the larger family, with two separate bedrooms, lounge, bathroom and 
			  separate shower room for extra comfort and privacy.  </p>
			  <img class ="img-fluid" style ="padding-top:15px;" src ="images/ss4.png"/>
		</div>
	</div>


</div>

<hr>
	
<!--jumbotron-->
   
<div class="jumbotron">
  <h6 class="display-4" style ="color:#ffb300">DON'T MISS OUR SECRET OFFER</h6>
  <p class="lead" style ="color:#ffffff"><strong>Only available for booking direct on the hotel website.</strong></p>
  <form class="form-inline">
	<div class ="col-md-4 offset-md-5">
    <input class="form-control" type="search" placeholder="Your email address" aria-label="Search">
	 <button class="btn btn-outline-secondary" type="submit" >Subscribe</button>
  </div>
  </form>
  <hr class="my-6">
	<div class ="container-fluid">
		<div class ="row">
			<div class ="col-md-3">
				<a href ="#"><i class="fa fa-facebook-official fa-2x" aria-hidden="true" style="color:#ffffff"></i></a>
				<a href ="#"><i class="fa fa-twitter-square fa-2x" aria-hidden="true" style="color:#ffffff"></i></a>
				<a href ="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"style="color:#ffffff"></i></a>
				<a href ="#"><i class="fa fa-youtube fa-2x" aria-hidden="true"style="color:#ffffff"></i></a>
			</div>
			
			    <h1 class ="align" style ="color:#e0f7fa"> |</h1>
				<a><i class="fa fa-phone fa-2x" aria-hidden="true"style="color:#ffffff"></i></a>
				<div class ="para"style ="color:#ffffff">TELEPHONE
				<p class ="para1">02-12864965</p></div>
				
			<div class ="row offset-md-1">
				<h1 class ="align1" style ="color:#e0f7fa"> |</h1>
				<a><i class="fa fa-envelope fa-2x" aria-hidden="true"style="color:#ffffff"></i></a>
	
				<div class ="para"style ="color:#ffffff">EMAIL
				<p class ="para1">Allison.fivestar@gmail.com</p></div>
			</div>
			<div class ="row offset-md-1">
				<h1 class ="align2" style ="color:#e0f7fa"> |</h1>
				<a ><i class="fa fa-map-marker fa-2x" aria-hidden="true"style="color:#ffffff"></i></a>
				<div class ="para"style ="color:#ffffff">ADDRESS
				<p class ="para1">221/A Uttra,D-block,Dhaka-1209</p></div>
			
		</div>
	</div>
</div>
</div>
<div class="row footer-copyright  text-white py-3" style="background-color:#2E2E2E">
			   <div class="col ">Allison Hotel @ 2018. All Rights Reserved.</div>

</div>


	</body>
</html>



























