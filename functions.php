<?php
	
	function connect(){
	  $con = mysqli_connect("mysql.metropolia.fi","username","password", 'database');
	  if(!$con)
            die("Could not connect to the mysql server");
	  return $con;
	}

	function disconnect($con){
         mysqli_close($con);
	}
	
	function fetchWithQuery($query){
         $con = connect();
         $result = mysqli_query($con, $query);
	 disconnect($con);
	return $result;
        }
        
    function selectUserWithUserName($username){
    	$query = "Select * from Users where Users.Users_name = '".$username."'";
    	$result = fetchWithQuery($query);
    	$rows = $result->num_rows;
    	if($rows == 0)
    		return false;
    	else 
    		return mysqli_fetch_assoc($result);
    }
    
    function authenticateUser($username, $password){
    	$user = selectUserWithUserName($username);
    	if(!$user)
    		return false;
    	else if($user['Password'] != $password)
    		return false;	
    	return $user;
    }
    function fetchAllPerfumes(){
	 $con = connect();        
	 $result = mysqli_query($con, "SELECT * from perfumes");
	 disconnect($con);
	 return $result;
	}
	function fetchAllorders(){
	 $con = connect();        
	 $result = mysqli_query($con, "SELECT * from orders");
	 disconnect($con);
	 return $result;
	}
?>