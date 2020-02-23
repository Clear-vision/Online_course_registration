
<?php
session_start();
include('admin/includes/config.php');
error_reporting(0);

if(strlen($_SESSION['login'])==0) {

header('location:index.php');
}else{

date_default_timezone_set('UTC');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit'])) {

    $pincode = mysqli_real_escape_string($con,$_POST['pincode']);

    $sql = mysqli_query($con, "SELECT * FROM  students 
                   WHERE pincode = '$pincode' 
                   AND StudentRegno = '" . $_SESSION['login'] . "'");

    $row = mysqli_fetch_assoc($sql);

    if (mysqli_num_rows($sql) > 0) {

        $_SESSION['pcode'] = $pincode;
        header("location:enroll.php");

    } else {

        $message = "<span class='alert alert-danger'>Error :Wrong Pincode. Please Enter a Valid Pincode</span>";


    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pincode Verification</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['login']!="")
{
 include('includes/menubar.php');
}
 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Student Pincode Verification</h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Pincode Verification
                        </div>

                            <?php if (isset($message)){echo $message; }?>

                        <div class="panel-body">
                       <form name="pincodeverify" method="post">
   <div class="form-group">
    <label for="pincode">Enter Pincode</label>
    <input type="password" class="form-control" id="pincode" name="pincode" placeholder="Pincode" required />
  </div>
 
  <button type="submit" name="submit" class="btn btn-default">Verify</button>
                           <hr />
   



</form>
                            </div>
                            </div>
                    </div>
                  
                </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php'); ?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
<?php }

?>
