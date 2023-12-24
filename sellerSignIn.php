<?php
session_start();
include("connection.php");
extract($_REQUEST);
if(isset($_SESSION['id']))
{
	header("location:food.php");
}
  if(isset($login))
  {
	$sql=mysqli_query($con,"select * from tblvendor where fld_email='$username' && fld_password='$pswd' ");
    if(mysqli_num_rows($sql))
	{
	 $_SESSION['id']=$username;
	header('location:dashboard.php');	
	}
	else
	{
	$admin_login_error="Invalid Username or Password";	
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

    <title>Foodshala | Restaurant Sign In</title>

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
    <a class="navbar-brand" href="index.php">Foodshala</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"></li>
              <li class="nav-item"></li>
            </ul>
            <form class="form-inline my-2 my-md-0">
              <a href="index.php"><button type="button" class="btn btn-lg btn-block btn-primary">Main Site <i class="fas fa-arrow-circle-right"></i></button></a>
            </form>
        </div>
  </div>
</nav>
<div class="container" style="padding:40px; border:1px solid #ED2553; left:30%; top:30%;">
<h3 class="pb-3 mb-4  border-bottom">Restaurant Login</h3>
<div class="footer" style="color:red;"><?php if(isset($admin_login_error)){ echo $admin_login_error;}?></div>
		<form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="username">Email:</label>
          <input type="text" class="form-control" id="username" placeholder="Enter Email" name="username" required/>
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="pswd" required/>
        </div>
          <button type="submit" name="login" class="btn btn-primary">Submit</button>
          <a href="sellerSignUp.php"><button type="button" name="new" class="btn btn-warning">Sign Up for New Account</button></a>
    </form>
</div>
<footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>Made by Teju ramesh</p>
      </footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	   
</body>
</html>