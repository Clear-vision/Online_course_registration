<?php
session_start();
error_reporting(0);
include("admin/includes/config.php");

if(strlen($_SESSION['login'])==1){

    header('location:enroll-history.php');
}


if(isset($_POST['submit'])){

    $regno = mysqli_real_escape_string($con,$_POST['regno']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

$query = mysqli_query($con,"SELECT * FROM students WHERE StudentRegno='$regno'");
$row = mysqli_fetch_array($query);
if(password_verify($password, $row["password"]))
{
$extra = "enroll-history.php";
$_SESSION['login'] = $_POST['regno'];
$_SESSION['id'] = $row['studentRegno'];
$_SESSION['sname'] = $row['studentName'];
$uip = $_SERVER['REMOTE_ADDR'];
$status = 1;
$log = mysqli_query($con,"INSERT INTO userlog(studentRegno,userip,status) 
VALUES ('".$_SESSION['login']."','$uip','$status')");
$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();

}else {

$message = "<span class='alert alert-danger'>Invalid Reg no or Password</span>";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="online course registration for student" />
    <meta name="author" content="John Lukondo" />

    <title>Student Login</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <?php include('includes/header.php');?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Student Login </h4>

                </div>

            </div>
            <?php if (isset($message)){echo $message;} ?>
            <?php if (isset($_SESSION["logout_message"])){echo $_SESSION["logout_message"];} ?>

            <form name="admin" method="post">
            <div class="row">
                <div class="col-md-6">
                     <label>Enter Registration number </label>
                        <input type="text" name="regno" class="form-control" required />
                        <label>Enter Password   </label>
                        <input type="password" name="password" class="form-control" required  />
                        <hr />
                        <button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </button>&nbsp;
                </div>
                </form>


            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
