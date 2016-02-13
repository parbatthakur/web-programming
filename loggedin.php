<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<head>
	<title>Laptop and Phone Shop</title>
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
	require_once('functions.php');
	$conn=connect();
	$errormsg="";
	if(isset($_POST['add'])){
		//storing image
		$dir = dirname(__FILE__).'/Laptops and Phones/';
		
		//var_dump($dir);
		//die();
		$filename=$_FILES['img']['name'];
		$tmpfile=$_FILES['img']['tmp_name'];
		$filesize=$_FILES['img']['size'];
		$filetype=$_FILES['img']['type'];
		
		$filepath=$dir.$filename;
		
		$result=move_uploaded_file($tmpfile,$filepath);
		if(!$result){
			$errormsg="Error in uploading image";
			exit;
		}
		if(!get_magic_quotes_gpc()){
			$filename=addslashes($filename);
			$filepath=addslashes($filepath);
		}
 		//defining varaible
 		$product=$_POST["product_name"]; 
	 	$brand=$_POST["brands_name"]; 
 		$price=$_POST["product_price"];
 		$year=$_POST["manu_year"];
 		$description=$_POST["description"]; 
 		$pic=$filename; 
 		
 		//adding into database
		$result  = mysqli_query($conn, "INSERT INTO Laptops and Phones(product_name,brand_name,price,manu_year,description,pic_url) VALUES('$product','$brand','$price','$year','$description', '$pic')"); 
		if(!$result){
		  printf("error: %s\n", mysqli_error($conn));
		  }
		else {
		?><script>
		alert("Data has been successfully added");
		</script>
		<? }

}
?>
<!-- Shell -->
<div class="shell">
  <!-- Header -->
  <div id="header">
    <div id="logo"><a href="#"></a></div>
    <!-- Cart -->
    <div id="cart" style="width:190px;"> <h3>Welcome&nbsp;&nbsp;<?php if($_SESSION){ echo $_SESSION["user"]; } ?>&nbsp;&nbsp;&nbsp;<span>|</span><label class="ltitle" style="width:60px; float:right; border:1px solid;" for="logout"><a href="loggedin.php?logout" class="logout">Log Out</a></label></h3>
    </div>
    <!-- End Cart -->
    <!-- Navigation -->
    <div id="navigation">
      <ul>
        <li><a href="#" class="active">Home</a></li>
        <li><a href="#">Laptops and Phones</a></li>
        <li><a href="order.php">Orders</a></li>
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
		<div id="add_item">
			<h4>Add New Item</h4>
			<form id="form_additem" method="POST" enctype="multipart/form-data">
			Product Name:<br/> 
			<input type="text" name="product_name" size="30"><br/>
			Price:<br/>
			<input type="text" name="product_price" size="30"><br/>
			Manufacturing Year:<br/>
			<input type="text" name="manu_year" size="30"><br/>
			Description:<br/>
			<textarea name="description" rows="7" cols="28"></textarea><br/>
			Select brand</br>
			<select name="brands_name">
			  <option value="brandA">Brand A</option>
  			  <option value="brandB">Brand B</option>
			  <option value="brandC">Brand C</option>
  			  <option value="brandD">Brand D</option>
  			</select><br/>
			Select Image:<br/>
			<input type="file" value="Select Image" name="img" size="2000000" accept="image/gif, image/jpeg, image/x-ms-bmp, image/x-png"><span><?php if($errormsg!="") { echo $errormsg; } ?></span><br/><br/>
			<input type="submit" value="Add" name="add" class="button">
			</form>
		</div>
		<div id="items_stock">
			<h4 style="width:260px;">Items On Stock</h4>
			Select brand</br>
			<select name="brands_name">
			  <option value="brandA">Brand A</option>
  			  <option value="brandB">Brand B</option>
			  <option value="brandC">Brand C</option>
  			  <option value="brandD">Brand D</option>
  			</select>
  			<table cellspacing="0" style="border:1px solid #636363; border-spacing:10px; width:260px;">
			<tr>
				<th>Brand</th>
				<th>Stock</th>
				<th>Exp. Date</th>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			</table>
		</div>
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
    <p class="left"> <a href="#">Home</a> <span>|</span> <a href="#">Laptops and Phones</a> <span>|</span> <a href="#">Offers</a> <span>|</span> <a href="#">Brands</a> <span>|</span> <a href="#">Contact</a> </p>
    <p class="right"> &copy; 2015 Parbat's Shop. Design by <a href="#">Parbat Thakur</a> </p>
  </div>
  <!-- End Footer -->
</div>
<!-- End Shell -->
</body>
</html>