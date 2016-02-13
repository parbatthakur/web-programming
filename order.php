<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<head>
	<title>Perfume Shop</title>
	<link rel="stylesheet" href="css/main.css" type="text/css" medai="all"/> 
</head>
<body>
<?php
	session_start();
	if(isset($_GET['logout'])){
		session_unset();
		session_destroy();
		header('location:index.php');
	}
?>
<!-- Shell -->
<div class="shell">
  <!-- Header -->
  <div id="header">
    <div id="logo"><a href="#"></a></div>
    <!-- Cart -->
    <div id="cart" style="width:200px;"> <h3>Welcome&nbsp;&nbsp;<?php if($_SESSION){ echo $_SESSION["user"];}?>&nbsp;&nbsp;&nbsp;<span>|</span><label class="ltitle" style="width:60px; float:right; border:1px solid;" for="logout"><a href="loggedin.php?logout" class="logout">Log Out</label></h3>
    </div>
    <!-- End Cart -->
    <!-- Navigation -->
    <div id="navigation">
      <ul>
        <li><a href="loggedin.php">Home</a></li>
        <li><a href="#">Perfumes</a></li>
        <li><a href="#" class="active">Orders</a></li>
        <li><a href="#">Brands</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
    <!-- End Navigation -->
  </div>
  <!-- End Header -->
  <div id="main">
	<div class="cl">&nbsp;</div>
    <!-- Content -->
	<div id="content" style="border:1px solid #dedede">
		<!-- Orders -->
		<div id="orders">
			<h4 style="margin-bottom:5px;">Orders Received</h4>
			<table cellspaceing="5" border="0" style="width:600px;">
			<tr>
				<th>Customer Name</th>
				<th>Email</th>
				<th>Items Ordered</th>
				<th>Date Ordered</th>
				<th>Action</th>
			</tr>
			<tr>
				<?php 
					require_once 'functions.php';
					$result=fetchAllorders();
					while ($row=mysqli_fetch_array($result)){
				?>
				<td><? echo $row['cust_name']?></td>
				<td><? echo $row['cust_email']?></td>
				<td><? echo $row['product_name']?></td>
				<td></td>
				<td><form id="action" method="POST"><input type="submit" value="Deliver" name="deliver" class="button"></form></td>
			</tr>
			<? } ?>
			</table>
		</div>
		<!-- End Orders -->		
    </div>
    <!-- End Content -->
    <!-- Sidebar -->
    <div id="sidebar">
		<div id="login" style="height:230px;">
			<h4>Links</h4>
			<p>information goes here</p>
		</div>
    </div>
    <!-- End Sidebar -->
    <div class="cl">&nbsp;</div>
  <!-- Footer -->
  <div id="footer">
    <p class="left"> <a href="#">Home</a> <span>|</span> <a href="#">Laptops</a> <span>|</span> <a href="#">Offers</a> <span>|</span> <a href="#">Brands</a> <span>|</span> <a href="#">Contact</a> </p>
    <p class="right"> &copy; 2015 Parbat's Shop. Design by <a href="#">Parbat Thakur</a> </p>
  </div>
  <!-- End Footer -->
</div>
<!-- End Shell -->
</body>
</html>