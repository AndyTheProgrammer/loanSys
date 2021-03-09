


<?php
session_start();
include'dbconnection.php';
// checking session is valid for not 


// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from users where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}

// Code for adding Customers
if(isset($_POST['signup']))
{
  $username=$_POST['username'];
  //$lname=$_POST['lname'];
  ///$email=$_POST['email'];
  $password=$_POST['password'];
  //$contact=$_POST['contact'];
  //$max_amount=$_POST['max_amount'];
  //$min_amount=$_POST['min_amount'];
  $enc_password=$password;
$sql=mysqli_query($con,"select id from admin where username='$username'");
$row=mysqli_num_rows($sql);
if($row>0)
{
  echo "<script>alert('That username already exists');</script>";
} else{
  $msg=mysqli_query($con,"insert into admin(username, password) values('$username', '$password')");

if($msg)
{
  echo "<script>alert('Register successfully');</script>";
  //header('location: index.php');
}
}
}

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Manage Users</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="style.css">
    <link rel="stylesheet" type="text/css" href=" style2.css">
    
  </head>

  <body>

      <section id="main-content">
          <section class="wrapper">
          	

			       <div class="header2">
              <h2><i class="fa fa-angle-admin"></i>Create Admin</h2>
            </div>

           <form name="registration" method="post" action="" enctype="multipart/form-data">

              <div class="input-group">
                <p>username </p>
                <input type="text" class="text" value="" name="username"  required >
              </div>
              
              <div class="input-group">
                <p>Password </p>
                <input type="password" value="" name="password" required>
              </div>
             

                 
              <br />
              
                <div class="sign-up">
                  <input type="reset" value="Reset">
                  <input type="submit" name="signup"  value="Sign Up" >
                  <div class="clear"> </div>
                  <br />
                 <div><a href="index.php"><p> Login</p></a> </div>
              </form>
				      
           
  <div class="register">

             

            </div>
          </div>
        </div>    
       <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
            <div class="facts">
               <div class="login">
              <div class="buttons">
                
                
              </div>
                 
              </div>
		</section>
      </section
  ></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php  ?>
