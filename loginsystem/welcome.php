<?php



session_start();
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{



include'dbconnection.php';	


                    
if(isset($_POST['signup']))
{
 // $fname=$_POST['fname'];
  //$lname=$_POST['lname'];
  //$email=$_POST['email'];
 // $id=$_SESSION['id'];
   $fname=$_SESSION['name'];
  //$lname=$_SESSION['lname'];
  $user_id=$_SESSION['id'];
 
  //$user_email=$_SESSION['email'] 
  //$password=$_POST['password'];
  $lamount=$_POST['lamount'];
  //Loan calculation. Variable payable is zero Once loan amount has been inputed the expression payable is calculated and assigned to $payable
  $payable = ($lamount * 0.15) + $lamount;

  $lpurpose = $_POST['lpurpose'];
  //$enc_password=$password;
 //$win=mysqli_query($con,"select * from users where id='$user_id'");
  //mysqli_query($con, $win);
  //$max_amount=$_GET['max_amount'];
  //$min_amount=$_GET['min_amount'];
//$a=mysqli_query($con,"select max_amount from users where user_id='$user_id'");
//$b=mysqli_query($con,"select min_amount from users where user_id='$user_id'");

   

$sql = "INSERT INTO loan (user_id, fname, lamount, lpurpose, payable) VALUES ('$user_id','$fname','$lamount', '$lpurpose', '$payable')";
mysqli_query($con, $sql);

echo "<script>alert('You have submitted your Loan request');</script>";

}

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
    <link rel="stylesheet" type="text/css" href="style.css">
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
                <a class="navbar-brand" href="welcome.php">Welcome !</a>
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
            <h1>Welcome to LOAN FORM REQUEST</h1>
            <p></p>
            <p><a  href="logout.php" class="btn btn-primary btn-large">Logout </a>
            </p>
        </header>

        <hr>

       
        <?php 
                               $user_id=$_SESSION['id'];

                              $ret=mysqli_query($con,"select * from users where id='$user_id' ");
                $cnt=1;
                while($row=mysqli_fetch_array($ret))
                {?>
                            
           <div>
               
               <form name="registration" method="post" action="" enctype="multipart/form-data">
                <div class="header">
                    Loan Registration
                </div>
                
                <div class="input-group">
                  <p>Loan amount </p>
                  <!-- Before lamount is submited it's value is checked against min and max lamount set by the Admin on registration-->
                <input type="number" class="text" value="" name="lamount" required="" min="<?php   echo $row['min_amount'];?>" max ="<?php   echo $row['max_amount'];?>">
                    </div>
                  
                    <div class="input-group"><p>Loan Purpose </p>
            
                <select name="lpurpose">
                  <option value="House Loan">
                    House Loan
                  </option>
                  <option value="Educational">
                    Educational
                  </option>
                  <option value="Vehicle">Car</option>

                </select>
            
                </div>
                


                  

            
                <div class="">
                  <input type="reset" value="Reset">
                  <input type="submit" name="signup"  value="Submit" >
                  <div class="clear"> </div>
                </div>
              </form>
<?php $cnt=$cnt+1; }?>
    
              
          
              
          </div>
              
         
       
      </form>
                                       
              </div>

           </div>

      


        </div>

        <hr>

          
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php } ?>