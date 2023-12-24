<?php
session_start();
include("../connection.php");
extract($_REQUEST);
if(isset($_GET['product']))
{
	$product_id= $_GET['product'];
}
else
{
	$product_id= "";
}
if(isset($_GET['msg']))
{
	$loginmsg=$_GET['msg'];
}
else
{
	$loginmsg="";
}
if(isset($login))
{
	$query=mysqli_query($con,"select * from tblcustomer where fld_email='$email' && password='$password'");
    if($row=mysqli_fetch_array($query))
	{
		$customer_email =$row['fld_email'];
		$_SESSION['cust_id']=$customer_email;
		if(!empty($customer_email && $product_id))
		{
			echo $_SESSION['cust_id']=$customer_email;
			
			 header("location:cart.php?product=$product_id");
			
		}
		else
		{
		header("location:../index.php");
		 $_SESSION['product']=$product_id;
		 $_SESSION['cust_id'];
		}
		 
	}
	else
	{
		$ermsg="Email or Password is incorrect";
	}
}

if(isset($signup))
{
	{
		header("location:form/userSignup?product=$product_id");
		
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

    <title>FoodVilla</title>

   
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    
    <link href="../assets/css/style.css" rel="stylesheet">
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
    <a class="navbar-brand" href="../index.php">FoodVilla</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"></li>
              <li class="nav-item"></li>
            </ul>
            <form class="form-inline my-2 my-md-0">
              <a href="../sellerSignIn.php"><button type="button" class="btn btn-lg btn-block btn-primary">Restaurant Login <i class="fas fa-arrow-circle-right"></i></button></a>
            </form>
        </div>
  </div>
</nav>
<div class="container" style="padding:40px; border:1px solid #ED2553; left:30%; top:30%;">
	<h3 class="pb-3 mb-4  border-bottom">Log In</h3>
	  <div class="footer" style="color:red;"><?php if(isset($loginmsg)){ echo $loginmsg;}?></div>
			<form method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="email">Email address:</label>
            <input type="email" class="form-control" name="email" id="email" required/>
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
            <input type="password" name="password" class="form-control" id="pwd" required/>
        </div>
          <button type="submit" name="login" style="background:#ED2553; border:1px solid #ED2553;" class="btn btn-primary">Log In</button>
				  Didn't have account?<a href="userSignup.php?product=<?php echo $product_id?>"> Sign Up</a>
				  <div class="footer" style="color:red;"><?php if(isset($ermsg)) { echo $ermsg; }?><?php if(isset($ermsg2)) { echo $ermsg2; }?></div>
      </form>
    </div>
  </div>
</div>
	  
      
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>