
<?php
session_start();
include('admin/includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0){
header('location:index.php');
}else{

date_default_timezone_set('UTC');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit'])){

$password = mysqli_real_escape_string($con,$_POST["cpass"]);
$new_password  = mysqli_real_escape_string($con, $_POST["newpass"]);

$sql = mysqli_query($con,"SELECT password FROM  students WHERE  studentRegno='".$_SESSION['login']."'");
$row = mysqli_fetch_array($sql);

if(password_verify($password, $row["password"])){

    $hashpassword = password_hash($new_password,PASSWORD_DEFAULT);

 mysqli_query($con,"UPDATE students SET password='$hashpassword', 
          updationDate='$currentTime' WHERE studentRegno='".$_SESSION['login']."'");

 $message = "<span class='alert alert-success'>Password Changed Successfully</span>";

}else{

    $message = "<span class='alert alert-danger'>Current Password not match</span>";

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="online course registration" />
    <meta name="author" content="John Lukondo" />
    <title>Student Password</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.cpass.value=="")
{
alert("Current Password Field is Empty !!");
document.chngpwd.cpass.focus();
return false;
}
else if(document.chngpwd.newpass.value=="")
{
alert("New Password Field is Empty !!");
document.chngpwd.newpass.focus();
return false;
}
else if(document.chngpwd.cnfpass.value=="")
{
alert("Confirm Password Field is Empty !!");
document.chngpwd.cnfpass.focus();
return false;
}
else if(document.chngpwd.newpass.value!= document.chngpwd.cnfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cnfpass.focus();
return false;
}
return true;
}
</script>
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
                        <h1 class="page-head-line">Student Change Password </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Change Password
                        </div>

                          <?php if (isset($message)){echo $message;} ?>
                        <div class="panel-body">
                       <form name="chngpwd" method="post" onSubmit="return valid();">
   <div class="form-group">
    <label for="exampleInputPassword1">Current Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="cpass" placeholder="Password" />
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" class="form-control" id="exampleInputPassword2" name="newpass" placeholder="Password" />
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword3" name="cnfpass" placeholder="Password" />
  </div>
 
  <button type="submit" name="submit" class="btn btn-default">Submit</button>
                           <hr />
   



</form>
                            </div>
                            </div>
                    </div>
                  
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
<?php } ?>
