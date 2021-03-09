

<?php

$fname = "";
$contactno = "";
$lname = "";
$email = "";
$errors = array(); 


//connect to database
$db = mysqli_connect('localhost', 'root', '', 'loginsystem');

//if the register button is clicked
if(isset($_POST['register'])){
	$fname =$db -> real_escape_string($_POST['fname']);
	$lname =$db -> real_escape_string($_POST['lname']);
	$email =$db -> real_escape_string($_POST['email']);
	$password_1 = $db -> real_escape_string($_POST['password_1']);
	$password_2 = $db -> real_escape_string($_POST['password_2']);
	$contactno =$db -> real_escape_string($_POST['contactno']);


	// ensure that form fields are filled properly
if(empty($fname)){
	array_push($errors, "first name is required");

}

if(empty($lname)){
	array_push($errors, "last_name is required");

}

if(empty($contactno)){
	array_push($errors, "contact is required");

}

if(empty($email)){
	array_push($errors, "Email is required");

}

if(empty($password_1)){
	array_push($errors, "Password is required");

}

if($password_1 != $password_2){
	array_push($errors, "The two passwords do not match");

}

// if there are no errors, save user to database
if (count($errors) == 0){
	$password = md5($password_1); // encrypt password before storing in database(security)
	$sql = "INSERT INTO users (fname,lname,email,password,contactno) VALUES ('$fname' '$lname', '$email', '$password','$contactno')";

	mysqli_query($db, $sql);

	$_SESSION['fname'] = $fname;
	$_SESSION['success'] = "You are now logged in";
	header('location: add.php'); // redirect to home page
}

}
// log user in from login page
if(isset($_POST['login'])) {

$username =$db -> real_escape_string($_POST['username']);
	
$password = $db -> real_escape_string($_POST['password']);


	// ensure that form fields are filled properly
if(empty($username)){
	array_push($errors, "Username is required");

}

if(empty($password)){
	array_push($errors, "Password is required");

}

if (count($errors) == 0) {
	$password = md5($password); // encrypt password before comparing
	$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
	$result = mysqli_query($db, $query);
	if (mysqli_num_rows($result) == 1) {
      //log user in
	$_SESSION['username'] = $username;
	$_SESSION['success'] = "You are now logged in";
	header('location: index.php'); // redirect to home page

	}else {
		array_push($errors, "wrong username/password combination");
		header('location:login.php');
	}
}

} 


//logout
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header('location: login.php');
}



 ?>