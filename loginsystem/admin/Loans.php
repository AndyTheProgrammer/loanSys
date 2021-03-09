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
$customerid=$_GET['id'];
$msg=mysqli_query($con,"delete from loan where id='$customerid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}

if(isset($_POST['update']))
{ 
$customerid=$_GET['id'];

$status=$_POST['status'];   


$sql="update loan set status=:status where id=:customerid";

$msg="Leave updated Successfully";
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

                       <li class="sub-menu">
                      <a href="customers.php" >
                          <i class="fa fa-money"></i>
                          <span>Customers</span>
                      </a>
                   
                  </li>
                   
                  </li>
              
                 
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Loan Requests</h3>
        <div class="row">
        
                  
                    
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> All User Details </h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                      <th>Loanee ID</th>
                                  <th class="hidden-phone">First Name</th>

                                  <th>Loan Amount</th>
                                  <th>Loan Purpose</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
                               
                              $ret=mysqli_query($con,"select * from loan");
                $cnt=1;
                while($row=mysqli_fetch_array($ret))
                {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                 <td><?php echo $row['user_id'];?></td>

                                  <td><?php echo $row['fname'];?></td>

                                  <td><?php echo $row['lamount'];?></td>  
                                  <td><?php echo $row['lpurpose'];?></td>
                                  <!-- Display loan status, status code 0=pending, 1=approved, 2= Rejected-->
                                  <td><?php if($row['status']==0){echo 'pending';}elseif($row['status']==1){
                                    echo 'Approved';
                                  }elseif($row['status']==2) {
                                    echo'Rejected';
                                  }else{
                                    echo'Error';
                                  };?></td>

                                  <td> 
                                     <a href="updatestatus.php?uid=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a> 
                                     <a href="Loans.php?id=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>

                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
                             
                            <li>
                        <a href="export.php">Download Excel <i class="fa fa-download"></i></a>
                    </li>

                      </div>
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