<?php
session_start();


include("connection.php");
extract($_REQUEST);
$arr=array();
if(isset($_GET['msg']))
{
	$loginmsg=$_GET['msg'];
}
else
{
	$loginmsg="";
}
if(isset($_SESSION['cust_id']))
{
	 $cust_id=$_SESSION['cust_id'];
	 $cquery=mysqli_query($con,"select * from tblcustomer where fld_email='$cust_id'");
	 $cresult=mysqli_fetch_array($cquery);
}
else
{
	$cust_id="";
}
 
if(!empty($_SESSION['cust_id']))
  {
    $fetch=mysqli_query($con,"select fld_preference from tblcustomer where fld_email='$cust_id'");
    $pfetch=mysqli_fetch_array($fetch);
    $pref=$pfetch['fld_preference'];
  }
else
  {
    $pref=1;
  }
  
 if(isset($addtocart))
 {
	 
	if(!empty($_SESSION['cust_id']))
	{
		 
		header("location:form/cart.php?product=$addtocart");
	}
	else
	{
		header("location:form/?product=$addtocart");
	}
 }

 $query=mysqli_query($con,"select tbfood.foodname,tbfood.fldvendor_id,tbfood.cost,tbfood.cuisines,tbfood.fldimage,tblcart.fld_cart_id,
 tblcart.fld_product_id,tblcart.fld_customer_id from tbfood inner  join tblcart on tbfood.food_id=tblcart.fld_product_id where 
 tblcart.fld_customer_id='$cust_id'");
$re=mysqli_num_rows($query);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FoodVilla | Home</title>


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d8aeeb35ee.js" crossorigin="anonymous"></script>
</head>

<body>
<!-- navbar -->
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
					        if(!empty($cust_id))
				    	      {
					      ?>
					        <a class="navbar-brand" style="color:#1fafdb; text-decoration:none;"><i class="far fa-user"></i> Hi! <?php echo $cresult['fld_name']; ?></a>
              </li>
		            <?php
						        }
		  			      if(empty($cust_id))
		  				      {
		  	        ?>
		  				    <a href="form/index.php?msg=User must be logged in"><span style="color:red; font-size:20px;"><i class="fa fa-shopping-cart" aria-hidden="true"> <span style="color:red;" id="cart"  class="badge badge-light">0</span></i></span></a>
    						  &nbsp;
                  <a href="form/index.php"><button class="btn btn-info my-2 my-sm-0" name="login" type="submit">Log In</button></a>
                  <a href="form/userSignUp.php"><button class="btn btn-primary my-2 my-sm-0" type="submit">Create New Account</button></a>  
		  	        <?php
		  	    		    }
		  			      else
		  				      {
		  	        ?>
              <li class="nav-item">
		  			  	<a href="form/cart.php"><span style=" color:green; font-size:20px;"><i class="fa fa-shopping-cart" aria-hidden="true"> <span style="color:green;" id="cart"  class="badge badge-light"><?php if(isset($re)) { echo $re; }?></span></i></span></a>
		  			  	<a href="logout.php"><button class="btn btn-success my-2 my-sm-0" type="submit">Log Out</button></a>
              </li>
		  	        <?php
		  				      }
		  	        ?>
            </ul>
            <form class="form-inline my-2 my-md-0">
              <a href="sellerSignUp.php"><button type="button" class="btn btn-lg btn-block btn-warning">FoodVilla Business <i class="fas fa-arrow-circle-right"></i></button></a>
            </form>
        </div>
  </div>
</nav>
  
<div class="container">
  <main role="main">
    <div class="jumbotron" style="background: url(assets/images/bg-image1.jpg) no-repeat center / cover;">
      <div class="col-sm-8 mx-auto">
        <h1>Discover The Flavors Of FoodVilla</h1>
        <p>Most Interesting Food To Your Doorstep.</p>
        <p>Order food from favourite restaurants near you.</p>
      </div>
    </div>
  </main>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-1 col-md-2 col-sm-3 col-3">
      <img class="rounded-circle" src="assets/images/burger.png" alt="Burger" >
    </div>
    <div class="col-lg-1 col-md-2 col-sm-3 col-3">
      <img class="rounded-circle" src="assets/images/chinese.png" alt="Noodles" >
    </div>
    <div class="col-lg-1 col-md-2 col-sm-3 col-3">
      <img class="rounded-circle" src="assets/images/pizza.png" alt="Pizza" >
    </div>
    <div class="col-lg-1 col-md-2 col-sm-3 col-3">
      <img class="rounded-circle" src="assets/images/bevrages.png" alt="Beverages" >
    </div>
    <div class="col-lg-1 col-md-2 col-sm-3 col-3">
      <img class="rounded-circle" src="assets/images/italian.png" alt="Italian" >
    </div>
    <div class="col-lg-1 col-md-2 col-sm-3 col-3">
      <img class="rounded-circle" src="assets/images/pastry.png" alt="Pastry" >
    </div>
    <div class="col-lg-1 col-md-2 col-sm-3 col-3">
      <img class="rounded-circle" src="assets/images/tacos.png" alt="Tacos" >
    </div>
    <div class="col-lg-1 col-md-2 col-sm-3 col-3">
      <img class="rounded-circle" src="assets/images/tea.png" alt="Tea" >
    </div>
    <div class="col-lg-1 col-md-2 col-sm-3 col-3">
      <img class="rounded-circle" src="assets/images/sandwich.png" alt="Sandwich" >
    </div>
    <div class="col-lg-1 col-md-2 col-sm-3 col-3">
      <img class="rounded-circle" src="assets/images/hotdog.png" alt="Hot dog" >
    </div>
    <div class="col-lg-1 col-md-2 col-sm-3 col-3">
      <img class="rounded-circle" src="assets/images/soup.png" alt="Soup" >
    </div>
    <div class="col-lg-1 col-md-2 col-sm-3 col-3">
      <img class="rounded-circle" src="assets/images/juice.png" alt="Juice" >
    </div>
  </div>
</div>

<div class="album py-5 bg-light">
  <div class="container">
    <h3 class="pb-3 mb-4  border-bottom">Choose From Most Popular</h3>
    <div class="row">
      <?php
        if($pref==1)
        {
			  $query=mysqli_query($con,"select tbfood.food_id,tblvendor.fld_name,tbfood.foodname,tbfood.cost,tbfood.cuisines,tbfood.fldimage,tbfood.paymentmode,tblvendor.fld_email,tblvendor.fld_logo from tbfood inner join tblvendor on tbfood.fldvendor_id=tblvendor.fldvendor_id order by food_id desc");  
        }
        elseif($pref=="Veg")
        {
          $query=mysqli_query($con,"select tbfood.food_id,tblvendor.fld_name,tbfood.foodname,tbfood.cost,tbfood.cuisines,tbfood.fldimage,tbfood.paymentmode,tblvendor.fld_email,tblvendor.fld_logo from tbfood inner join tblvendor on tbfood.fldvendor_id=tblvendor.fldvendor_id and paymentmode='Veg' order by food_id desc");  
        }
        else{
          $query=mysqli_query($con,"select tbfood.food_id,tblvendor.fld_name,tbfood.foodname,tbfood.cost,tbfood.cuisines,tbfood.fldimage,tbfood.paymentmode,tblvendor.fld_email,tblvendor.fld_logo from tbfood inner join tblvendor on tbfood.fldvendor_id=tblvendor.fldvendor_id and paymentmode='Non-Veg' order by food_id desc");  

        }
        while($res=mysqli_fetch_array($query))
	  			{
					  $hotel_logo= "image/restaurant/".$res['fld_email']."/".$res['fld_logo'];
					  $food_pic= "image/restaurant/".$res['fld_email']."/foodimages/".$res['fldimage'];
	  	?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
          <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="<?php echo $food_pic; ?>" alt="<?php echo $res['foodname']; ?>" width="auto" height="150px">
            <div class="card-body">
              <p class="card-text"><img class="rounded-circle" src="<?php echo $hotel_logo; ?>" alt="<?php echo $res['fld_name']; ?>" width="30px" height="auto"> <?php echo $res['fld_name']; ?> <br> <br>
              <i class="fas fa-utensils"></i><b> <?php echo $res['foodname'];?></b> <br> 
              Cuisine: <?php echo $res['cuisines']; ?> <br>
              <i class="fas fa-rupee-sign"></i>. <b><?php echo $res['cost']; ?></b> per person</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <form method="post">
                  <button type="submit" class="btn btn-sm btn-success" name="addtocart" value="<?php echo $res['food_id'];?>">Order Now!</button>
                </form>
              </div>
                <small class="text-muted"><?php
                if ($res['paymentmode']=="Veg")
                  {
                  ?>
                  <img src="assets/images/veg.png">
                  <?php
                  }
                else
                  {
                  ?>
                    <img src="assets/images/nonveg.png">
                  <?php
                  }
                  ?>  </small>
            </div>
          </div>
        </div>
      </div>
      <?php
    		 }
			?>
    </div>
  </div>
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
