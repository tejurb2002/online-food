<?php
session_start();
include("connection.php");
extract($_REQUEST);
    if(isset($_SESSION['id']))
{
	header("location:dashboard.php");
}

if(isset($register))
     {
	$sql=mysqli_query($con,"select * from tblvendor where fld_email='$email'");
    if(mysqli_num_rows($sql))
	{
	  $email_error="This Email Id is laready registered with us";
	}
	else
	{
	$logo=$_FILES['logo']['name'];
	$sql=mysqli_query($con,"insert into tblvendor 
	(fld_name	,fld_email,fld_password,fld_mob,fld_address,fld_logo)
       	values('$r_name','$email','$pswd','$mob','$address','$logo')");
	
    if($sql)
	{
	mkdir("image/restaurant");
	mkdir("image/restaurant/$email");
	
	move_uploaded_file($_FILES['logo']['tmp_name'],"image/restaurant/$email/".$_FILES['logo']['name']);
	}
	$_SESSION['id']=$email;
	
	header("location:dashboard.php");
	
	}
  }
	
  
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FoodVilla | Restaurant Sign Up</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d8aeeb35ee.js" crossorigin="anonymous"></script>
    <style>
		ul li{list-style:none;}
		ul li a {color:black;text-decoration:none; }
		ul li a:hover {color:black; text-decoration:none;}
		</style>
  </head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">FoodVilla</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"></li>
              <li class="nav-item"></li>
            </ul>
            <form class="form-inline my-2 my-md-0">
              <a href="sellerSignIn.php"><button type="button" class="btn btn-lg btn-block btn-primary">Restaurant LogIn <i class="fas fa-arrow-circle-right"></i></button></a>
            </form>
        </div>
  </div>
</nav>

<div class="container">
    <main role="main">
        <div class="jumbotron" style="background: url(assets/images/bg-image1.jpg) no-repeat center / cover;">
          <div class="col-sm-8 mx-auto">
            <h1>Add your restaurant on FoodVilla</h1>
            <p>Get more customers!</p>
          </div>
        </div>
      </main>
    </div>

<div class="container" style="padding:40px; border:1px solid #ED2553; left:30%; top:30%;">
        <h3 class="pb-3 mb-4  border-bottom">
            Register your Restaurant
          </h3>
	   
			    <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="name">Name:</label>
                          <input type="text" class="form-control" id="name" value="<?php if(isset($r_name)) { echo $r_name;}?>" placeholder="Enter Restaurant Name" name="r_name" required/>
                      </div>
	                  <div class="form-group">
                          <label for="name">Email Id:</label>
                          <input type="email" class="form-control" id="email" value="<?php if(isset($email)) { echo $email;}?>" placeholder="Enter Email" name="email" required/>
                          <span style="color:red;"><?php if(isset($email_error)){ echo $email_error;} ?></span>
	                  </div>
	                 <div class="form-group">
                         <label for="pswd">Password:</label>
                         <input type="password" class="form-control" id="pswd" placeholder="Enter Password" name="pswd" required/>
                     </div>
                     <div class="form-group">
                         <label for="mob">Mobile:</label>
                         <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" value="<?php if(isset($mob)) { echo $mob;}?>"id="mob" placeholder="Enter 10-digit Phone no." name="mob" required/>
                     </div>
	                 <div class="form-group">
                          <label for="add">Address:</label>
                          <input type="text" class="form-control" id="add" placeholder="Enter Address" value="<?php if(isset($address)) { echo $address;}?>" name="address" required>
                     </div>
	                 <div class="form-group">
                     Upload Logo <br>
                     <input type="file"  name="logo" required>
                     </div>
                     <button type="submit" id="register" name="register" class="btn btn-outline-primary">Register</button>
                     Already have an account? <a href="sellerSignIn.php"><button type="button" name="new" class="btn btn-warning">LogIn</button></a>
                </form>
				<br>
			</div>
	   </div>
	<br>
    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>Made by Teju ramesh</p>
      </footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	   
</body>
</html>