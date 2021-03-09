
<?php
session_start();
include'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

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
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $contact=$_POST['contact'];
  $max_amount=$_POST['max_amount'];
  $min_amount=$_POST['min_amount'];
  $enc_password=$password;
$sql=mysqli_query($con,"select id from users where email='$email'");
$row=mysqli_num_rows($sql);
if($row>0)
{
  echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
} else{
  $msg=mysqli_query($con,"insert into users(fname,lname,email,password,contactno,min_amount,max_amount) values('$fname','$lname','$email','$enc_password','$contact', '$min_amount', '$max_amount')");

if($msg)
{
  echo "<script>alert('Register successfully');</script>";
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

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Admin Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	
                  <li class="mt">
                      <a href="change-password.php">
                          <i class="fa fa-file"></i>
                          <span>Change Password</span>
                      </a>
                  </li>

                  
                  </li>

                   

                   <li class="sub-menu">
                      <a href="add.php" >
                          <i class="fa fa-user"></i>
                          <span>Add Customers</span>
                      </a>
                   
                  </li>

                  <li class="sub-menu">
                      <a href="Loans.php" >
                          <i class="fa fa-money"></i>
                          <span>Loans</span>
                      </a>
                   
                  </li>

                   <li class="sub-menu">
                      <a href="customers.php" >
                          <i class="fa fa-money"></i>
                          <span>Customers</span>
                      </a>
                   
                  </li>
              
                 
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> add Users</h3>

			       <div class="header2">
              <h2>Add customer</h2>
            </div>

           <form name="registration" method="post" action="" enctype="multipart/form-data">
                <div class="input-group">
                <p>First Name </p>
                <input type="text" class="text" value=""  name="fname" required >
              </div>
              <div class="input-group">
                <p>Last Name </p>
                <input type="text" class="text" value="" name="lname"  required >
              </div>
              <div class="input-group">
                <p>Email Address </p>
                <input type="text" class="text" value="" name="email"  >
              </div>
              <div class="input-group">
                <p>Password </p>
                <input type="password" value="" name="password" required>
              </div>
              <div class="input-group">
                    <p>Contact No. </p>
                <input type="text" value="" name="contact"  required>
              </div>

                 <div class="input-group">
                    <p>Min_Loan_amount </p>
                <input type="number" value="" name="min_amount"  required>
              </div>

              <div class="input-group">
                    <p>Max_Loan_amount </p>
                <input type="number" value="" name="max_amount"  required>
              </div>

                <div class="sign-up">
                  <input type="reset" value="Reset">
                  <input type="submit" name="signup"  value="Sign Up" >
                  <div class="clear"> </div>
                
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
<?php } ?>