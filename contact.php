<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<head>
	<title>Perfume Shop</title>
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
        <li><a href="laptop.php">Perfumes</a></li>
        <li><a href="order.php">Orders</a></li>
        <li><a href="#">Brands</a></li>
        <li><a href="#" class="active">Contact</a></li>
      </ul>
    </div>
    <!-- End Navigation -->
  </div>
  <!-- End Header -->
  <div id="main">
	<div class="cl">&nbsp;</div>
    <!-- Content -->
	<div id="content" style="border:1px solid #dedede">
		<div id="contact">
			<?php 
				if(isset($_POST['submit'])){
					$name=$_POST['visitor_name'];
					$email=$_POST['visitor_email'];
					$visitor_msg=$_POST['visitor_msg'];
					$email2="arjunnarjun@hotmail.com";
					$subject2="Perfume Shop Query";
					$subject="Auto Reply";
					$message="Thank you ".$name." for contacting us we will contact you if needed.\r\n \r\n\r\nRegards\r\nPerfume Shop";
					$from="info@perfumeshop.com";
					$headers="From:".$from;
					$headers2="From:".$email;
					mail($email,$subject,$message,$headers);//sends email to customer
					mail($email2,$subject2,$visitor_msg,$hearders2);//sends mail to shop owner
					?>
					<script type="text/javascript">
						document.getElementById("contact").innerHTML="";
						document.getElementById("contact").innerHTML='<h3>Thank You for contacting us.</h3>';
					</script>
					<?							
				}
			
			?>
			<h4>Contact US</h4>
			<form id="form_contact" method="POST" enctype="multipart/form-data">
			Your Name:<br/> 
			<input type="text" name="visitor_name" size="40"><br/>
			Your Email:<br/>
			<input type="text" name="visitor_email" size="40"><br/>
			Your message:<br/>
			<textarea name="visitor_msg" rows="7" cols="29"></textarea><br/>
			<input type="submit" value="Submit" name="submit" class="button">
			</form>
		</div>
    </div>
    <!-- End Content -->
    <!-- Sidebar -->
    <div id="sidebar">
		<div id="login" style="height:230px;">
			<h4>side bar</h4>
			<p>information goes here</p>
		</div>
    </div>
    <!-- End Sidebar -->
    <div class="cl">&nbsp;</div>
  <!-- Footer -->
  <div id="footer">
    <p class="left"> <a href="index.php">Home</a> <span>|</span> <a href="laptop.php">Laptops</a> <span>|</span> <a href="#">Offers</a> <span>|</span> <a href="#">Brands</a> <span>|</span> <a href="#">Contact</a> </p>
    <p class="right"> &copy; 2015 Parbat's Shop. Design by <a href="#">Parbat Thakur</a> </p>
  </div>
  <!-- End Footer -->
</div>
<!-- End Shell -->
</body>
</html>