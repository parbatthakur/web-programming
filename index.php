<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<head>
	<title>Perfume</title>
	<link rel="stylesheet" href="css/main.css" type="text/css" medai="all"/> 
</head>
<body>
<!--php code-->
<?php 
	session_start();
	$msg="";
	require_once 'functions.php';
	if(isset($_POST['login'])){
		$user = authenticateUser($_POST['username'], $_POST['password']);
		if(!$user){
			$msg="No such User!";
		}
		else{
			$_SESSION["user"]=$_POST['username'];
			if(isset($_SESSION["user"])){
			header('Location:loggedin.php');
			}
		}
	}
	
?>
<!--End php code-->
<!-- Shell -->
<div class="shell">
  <!-- Header -->
  <div id="header">
    <div id="logo"><a href="#"></a></div>
    <!-- Cart -->
    <div id="cart"> <a href="#" class="cart-link">Your Shopping Cart</a>
      <div class="cl">&nbsp;</div>
      <span>Items <strong>0</strong></span> &nbsp;&nbsp; <span>Cost: <strong>&euro;000.00</strong></span> </div>
    <!-- End Cart -->
    <!-- Navigation -->
    <div id="navigation">
      <ul>
        <li><a href="#" class="active">Home</a></li>
        <li><a href="laptop.php">Laptops and Phones</a></li>
        <li><a href="#">Offers</a></li>
        <li><a href="#">Brands</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </div>
    <!-- End Navigation -->
  </div>
  <!-- End Header -->
  <div id="main">
	<div class="cl">&nbsp;</div>
    <!-- Content -->
	<div id="content">
		<!--Ads Slider-->
		<div id="adslider"><?php include 'slider.php'; ?></div>
    	<!--End AdsSlider-->
    	<!--Featured Products-->
    	<div class="fproducts">
    		<?php 
    			require_once 'functions.php';
    			$query='SELECT * FROM perfumes WHERE perfumes.product_name="Bloom" OR product_name="John" OR product_name="Vera Wang"';
    			$result=fetchWithQuery($query);
    			while ($row=mysqli_fetch_array($result)){
    		?>
    		<ul>
    			<li><a href="selected.php?id=<?echo $row['id'] ?>"><img class="featured" src="<? echo "perfumes/".$row['pic_url']; ?>" alt="laptop" /></a>
    				<div class="fproducts-info">
    					<h4 class="ftitle"><? echo $row['product_name'] ?></h4>
    					<p class="ftext"><? echo $row['description']?></p>
    					<h4 class="fprice">&euro; <? echo $row['price'] ?></h4>
    				</div>
    			</li>
    			<? } ?>
    		</ul>
    	</div>
		<!--End Featured Products-->
    </div>
    <!-- End Content -->
    <!-- Sidebar -->
    <div id="sidebar">
		<div id="login">
			<h4 style="margin-bottom:5px;">Login</h4>
			<label id="response" style="color:#B22222; margin-left:5pc;"><?php if($msg!="") { echo $msg; } ?></label>
			<form method="POST" id="login_form">
				<p>Username: <input type="text" name="username" size="20"></p>
				<p>Password: <input type="Password" name="password" size="20"></p>
				<input type="submit" value="Login" name="login" class="button">
			</form>
		</div>

    </div>
    <!-- End Sidebar -->
    <div class="cl">&nbsp;</div>
  <!-- Footer -->
  <div id="footer">
    <p class="left"> <a href="#">Home</a> <span>|</span> <a href="laptop.php">Laptops</a> <span>|</span> <a href="#">Offers</a> <span>|</span> <a href="#">Brands</a> <span>|</span> <a href="contact.php">Contact</a> </p>
    <p class="right"> &copy; 2015 Parbat's Shop. Design by <a href="#">Parbat Thakur</a> </p>
  </div>
  <!-- End Footer -->
</div>
<!-- End Shell -->
</body>
</html>