<?php
include("connection.php");
session_start();
extract($_REQUEST);
if(isset($updstatus))
{
	if(!empty($_SESSION['id']))
{
	  if(mysqli_query($con,"update tblorder set fldstatus='$status' where fld_order_id='$order_id'"))
	  {
		  header("location:dashboard.php");
	  }
}
else
{
	header("location:sellerSignIn.php?msg=You Must Login First");
}
}
if(isset($logout))
{
	session_destroy();
	header("location:sellerSignIn.php");
}
			  
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FoodVilla</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d8aeeb35ee.js" crossorigin="anonymous"></script>

<style>
		ul li{}
		ul li a {color:white;padding:40px; }
		ul li a:hover {color:white;}
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
          <li class="nav-item">
          <?php
	if(!empty($id))
	{
	?>
	<a class="navbar-brand" style="color:red; text-decoration:none;"><i class="far fa-user"></i> Welcome, <?php if(isset($id)) { echo $vr['fld_name']; }?></a>
	<?php
	}
	?>
                        </li>
		  	
          </ul>
          <form class="form-inline my-2 my-md-0">
          <?php
			if(empty($_SESSION['id']))
			{
			?>
		   <button class="btn btn-outline-danger my-2 my-sm-0" name="login"><i class="fas fa-sign-in-alt"></i> Log In</button>
            <?php
			}
			else
			{
			?>
			
			<button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit"><i class="fas fa-sign-out-alt"></i> Log Out</button>
			<?php
			}
			?>
          </form>
        </div>
      </div>
</nav> 
<div class="container" style="padding:40px; border:1px solid #ED2553; left:30%; top:30%;">
	<h3 class="pb-3 mb-4  border-bottom">Update Order Status</h3>
	<div class="footer" style="color:red;"><?php if(isset($admin_login_error)){ echo $admin_login_error;}?></div>
	<form method="post">
	  <input type="radio"  name="status" value="Delivered"> Deliverd<br>
	  <input type="radio"  name="status" value="Out Of Stock"> Out Of Stock<br>
	  <br>
	  <button type="submit" class="btn btn-outline-success" name="updstatus">Update Status</button>
	  </div>
	</form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	   
</body>
</html>