<?php



session_start();
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } 
include'dbconnection.php';  


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/heroic-features.css" rel="stylesheet">
    
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="welcome.php">Home !</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#"><?php echo $_SESSION['name'];?></a>
                    </li>

                    <li>
                        <a href="status.php">Loan_Status</a>
                    </li>

                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                  
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <header class="jumbotron hero-spacer">
            <h1>Loan Status</h1>
            <p></p>
            <p><a  href="logout.php" class="btn btn-primary btn-large">Logout </a>
            </p>
        </header>

        <hr>

         <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Loan Status</h3>
        <div class="row">
        
                  
                    
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> All Loan Details </h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  
                                  <th> Loan Amount</th>
                                   <th> payable</th>
                                    <th> status</th>
                                 
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
                                //$customerid =$_GET['id'];

                              $id=$_SESSION['id'];
                              //select all customers where user_id equals session id;
                              $ret=mysqli_query($con,"select * from loan where user_id ='$id'");

                $cnt=1;
                while($row=mysqli_fetch_array($ret))
                {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  
                                  <td><?php echo $row['lamount'];?></td>
                                  <td><?php echo $row['payable'];?></td>
                                  <td><?php if($row['status']==0){echo 'pending';}elseif($row['status']==1){
                                    echo 'Approved';
                                  }elseif($row['status']==2) {
                                    echo'Rejected';
                                  }else{
                                    echo'Consult admin';
                                  };?></td>

                                 
                                 
                              </tr>

                              
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
    </section>
      </section

        
         
              
         
       
      
                                       
              </div>

           </div>

      


        </div>

        <hr>

          
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php  ?>