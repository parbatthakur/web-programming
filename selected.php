<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<head>
	<title>Perfume</title>
	<link rel="stylesheet" href="css/main.css" type="text/css" medai="all"/> 
</head>
<body>
<!-- Shell -->
<div class="shell">
  <!-- Header -->
  <div id="header">
    <div id="logo"><a href="index.php"></a></div>
    <!-- Cart -->
    <div id="cart"> <a href="#" class="cart-link">Your Shopping Cart</a>
      <div class="cl">&nbsp;</div>
      <span>Items <strong>0</strong></span> &nbsp;&nbsp; <span>Cost: <strong>&euro;000.00</strong></span> </div>
    <!-- End Cart -->
    <!-- Navigation -->
    <div id="navigation">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#" class="active">Laptops and Phones</a></li>
        <li><a href="#">Offers</a></li>
        <li><a href="#">Brands</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </div>
    <!-- End Navigation -->
  </div>
  <!-- End Header -->
  
  <?php
  require_once ('functions.php');
  if(isset($_GET['id'])){
  //using two table to fetch data 
  	$query = 'SELECT * FROM Laptops WHERE Laptops.id='.$_GET['id'];
  	$result = fetchWithQuery($query);
  	$row = mysqli_fetch_assoc($result);
  ?>
  <div id="main">
	<div class="cl">&nbsp;</div>
    <!-- Content -->
	<div id="content">
    	<!--Selected Product-->
		<div id="image">
			<img src="<?php echo 'Laptops/'.$row['pic_url'] ?>" height="350" width="290" alt="laptop"/>
		</div>
		<div id="productinfo">
			<label for="product_name" class="product_name"><?php echo $row['product_name']; ?></label></br>
			<label for="description"><?php echo $row['description']; ?></label></br>
			<label for="product_price" class="product_name"><?php echo "&euro;".$row['price']; ?></label>
		</div>
		<div id="customerinfo">
			<h4>Your Information</h4>
			<form id="form_additem" method="POST">
				Product Name:<br/>
				<input type="text" name="product_name" size="30" value="<?php echo $row['product_name']; ?>" readonly><br/>
				Price:<br/>
				<input type="text" name="product_price" size="30" value="<?php echo "&euro;".$row['price']; ?>" readonly><br/>
				Your Name:<br/>
				<input type="text" name="cust_name" size="30"><br/>
				Your Email:<br/>
				<input type="text" name="cust_email" size="30"><br/>
				<input type="submit" value="Buy" name="buy" class="button">
			</form>
			<? } ?>
			<?php
				require_once('functions.php');
				$conn=connect();
				if(isset($_POST['buy'])){
					$product=$_POST['product_name'];
					$price=$_POST['product_price'];
					$customer=$_POST['cust_name'];
					$email=$_POST['cust_email'];
					mysqli_query($conn, "INSERT INTO orders(product_name,price,cust_name,cust_email) VALUES('$product','$price','$customer','$email')"); 
					}
			?>	
		</div>
    </div>
    <!-- End Content -->
    <!-- Sidebar -->
    <div id="sidebar">
		<!--<div id="login">
			<h4>Login</h4>
			<h5 id="response"><?php if($msg!="") { echo $msg; } ?></h5>
			<form method="POST" action="#" id="login_form"onsubmit="return validation();">
				<p>Username: <input type="text" name="username" size="20"></p>
				<p>Password: <input type="Password" name="password" size="20"></p>
				<input type="submit" value="Login" name="login" class="button">
			</form>
		</div>-->
		<?php
			include 'login_form.php';
		?>
    </div>
    <!-- End Sidebar -->
    <div class="cl">&nbsp;</div>
  <!-- Footer -->
  <div id="footer">
    <p class="left"> <a href="index.php">Home</a> <span>|</span> <a href="perfume.php">Laptops and Phones</a> <span>|</span> <a href="#">Offers</a> <span>|</span> <a href="#">Brands</a> <span>|</span> <a href="contact.php">Contact</a> </p>
    <p class="right"> &copy; 2015 Parbat's Shop. Design by <a href="#">Parbat Thakur</a> </p>
  </div>
  <!-- End Footer -->
</div>
<!-- End Shell -->
</body>
</html>