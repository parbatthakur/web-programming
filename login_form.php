		
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
		<div id="login">
			<h4 style="margin-bottom:5px;">Login</h4>
			<label id="response" style="color:#B22222; margin-left:5pc;"><?php if($msg!="") { echo $msg; } ?></label>
			<form method="POST" id="login_form">
				<p>Username: <input type="text" name="username" size="20"></p>
				<p>Password: <input type="Password" name="password" size="20"></p>
				<input type="submit" value="Login" name="login" class="button">
			</form>
		</div>