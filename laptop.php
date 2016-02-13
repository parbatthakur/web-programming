<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<head>
	<title>Perfume</title>
	<link rel="stylesheet" href="css/main.css" type="text/css" medai="all"/> 
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script></head>
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
  <div id="main">
	<div class="cl">&nbsp;</div>
    <!-- Content -->
	<div id="content">
    	<!--All Available Products-->
    	<!--Perfumelist-->
    	<div class="perfumelist">
    		<?php 
    			require_once 'functions.php';

    			if(isset($_POST['selected'])){
    			 	$query = 'SELECT * from perfumes where perfumes.brand_name='.$_POST['brands_name'];
    			}
    			else{
    				
				$query = 'SELECT * from perfumes where brand_name = "brandA"';
			   $result = fetchWithQuery($query);
			   ?>
			       	<div class="brand_name"><h4 class="brand">Brand A</h4></div>

				<ul>
				<?
				$count = mysqli_num_rows($result); 
				$current_count = 0;
				while ($row=mysqli_fetch_array($result)){
    				?>
    				
					<li style="<?php if($current_count==3){
									  echo "margin-right:0px;";
									  } ?>"><a href="selected.php?id=<?echo $row['id'] ?>"><img class="listed" src="<? echo "perfumes/".$row['pic_url'] ?>" alt="perfume" /></a>
						<div class="product-info">
							<h5 class="ltitle"><? echo $row['product_name']?></h5>
							<h5 class="lprice">&euro; <? echo $row['price']?></h5>
						</div>
					</li>
					<? if($current_count==3){
							break;
						}	
					?>
					<? 	$current_count ++; } ?>
				</ul>
				
				<?
					$query = 'SELECT * from perfumes where brand_name = "brandB"';
			   		$result = fetchWithQuery($query);
				$count = mysqli_num_rows($result); 
				$current_count = 0;
			   ?>
			   <!--List of Brand B-->
			   <div class="brand_name"><h4 class="brand">Brand B</h4></div>
				<ul>
				<?
				while ($row=mysqli_fetch_array($result)){
    				?>
					<li style="<?php if($current_count==3){
										echo "margin-right:0px;";
										} ?>"><a href="selected.php?id=<?echo $row['id'] ?>&p=perfume"><img class="listed" src="<? echo "perfumes/".$row['pic_url'] ?>" alt="perfume" /></a>
						<div class="product-info">
							<h5 class="ltitle"><? echo $row['product_name']?></h5>
							<h5 class="lprice">&euro; <? echo $row['price']?></h5>
						</div>
					</li>
					<? if($current_count==3){
							break;
						}
					?>
					<? $current_count ++; } ?>
				</ul>
				
			<?	} ?>
    	</div>
		<!--End Available Products-->
    </div>
    <!-- End Content -->
    <!-- Sidebar -->
    <div id="sidebar">
		<?php 
			/*session_start();
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
			}*/
			include 'login_form.php';
		?>
		<!--<div id="login">
			<h4 style="margin-bottom:5px;">Login</h4>
			<label id="response" style="color:#B22222; margin-left:5pc;"><?php if($msg!="") { echo $msg; } ?></label>
			<form method="POST" id="login_form">
				<p>Username: <input type="text" name="username" size="20"></p>
				<p>Password: <input type="Password" name="password" size="20"></p>
				<input type="submit" value="Login" name="login" class="button">
			</form>
		</div>-->
		<div id="choose">
			<h4>Select Brand</h4>
			<label style="margin-left:5px;"> Choose brand you prefer</label>
			<form method="POST" action="#" id="select_brand" style="margin:3px;">
				<select name="brands_name">
			  		<option value="brandA">Brand A</option>
  			  		<option value="brandB">Brand B</option>
			  		<option value="brandC">Brand C</option>
  			  		<option value="brandD">Brand D</option>
  				</select>
			</form>
		</div>
    </div>
    <!-- End Sidebar -->
    <div class="cl">&nbsp;</div>
  <!-- Footer -->
  <div id="footer">
    <p class="left"> <a href="index.php">Home</a> <span>|</span> <a href="#">Laptops</a> <span>|</span> <a href="#">Offers</a> <span>|</span> <a href="#">Brands</a> <span>|</span> <a href="contact.php">Contact</a> </p>
    <p class="right"> &copy; 2015 Parbat's Shop. Design by <a href="#">Parbat Thakur</a> </p>
  </div>
  <!-- End Footer -->
</div>
<!-- End Shell -->

<script>
	$('select[name="brands_name"]').change(function(){
		var selectedBrand = $('select[name="brands_name"] option:selected').val();
		var selectedBrandtext=$('select[name="brands_name"] option:selected').text();
		$.post(
			'selected_change.php',
			{brand_name: selectedBrand, brand_text:selectedBrandtext}, 
			function(data){
				$('#content').empty();
				$('#content').html(data);
			}
		);
	});
</script>
</body>
</html>