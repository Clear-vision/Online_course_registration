<?php
session_start();
include('admin/includes/config.php');
error_reporting(0);

if(strlen($_SESSION['login'])==0){

header('location:index.php');

}else{

if(isset($_POST['submit'])) {

    $studentname = mysqli_real_escape_string($con, $_POST['studentname']);
    $photo = $_FILES["photo"]["name"];
    $photo_type = $_FILES["photo"]["type"];
   

    if ($_FILES["photo"]["name"]){

        $photo = $_FILES["photo"]["name"];
    }else{

        $photo = $_POST["photo"];
    }

if ($photo_type != 'jpeg' || $photo_type != 'png') {


    move_uploaded_file($_FILES["photo"]["tmp_name"], "studentphoto/" . $_FILES["photo"]["name"]);

    $query = mysqli_query($con, "UPDATE students SET studentName='$studentname',
                           studentPhoto='$photo' 
                    WHERE StudentRegno='" . $_SESSION['login'] . "'");

    if ($query) {

        $message = "<span class='alert alert-success'>Student Record updated Successfully</span>";

    } else {

        $message = "<span class='alert alert-danger'>Error : Student Record not update</span>";
    }

}else{

    $message = "<span class='alert alert-danger'>Only JPEG or PNG Format Required</span>";

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
    <title>Student Profile</title>
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
                        <h1 class="page-head-line">Student Profile </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Student Profile
                        </div>

                            <?php if (isset($message)){echo $message;} ?>

                    <?php

                     $sql = mysqli_query($con,"SELECT  * FROM students 
                              WHERE StudentRegno='".$_SESSION['login']."'");
                    $cnt = 1;
                    while($row = mysqli_fetch_array($sql))
                    { ?>

                        <div class="panel-body">
                       <form name="dept" method="post" enctype="multipart/form-data">
   <div class="form-group">
    <label for="studentname">Student Name  </label>
    <input type="text" class="form-control" id="studentname" name="studentname" value="<?php echo htmlentities($row['studentName']);?>"  />
  </div>

 <div class="form-group">
    <label for="studentregno">Student Reg No   </label>
    <input type="text" class="form-control" id="studentregno" name="studentregno" value="<?php echo htmlentities($row['StudentRegno']);?>"  placeholder="Student Reg no" readonly />
    
  </div>



<div class="form-group">
    <label for="Pincode">Pincode  </label>
    <input type="text" class="form-control" id="Pincode" name="Pincode" readonly value="<?php echo htmlentities($row['pincode']);?>" required />
  </div>   




<div class="form-group">
    <label for="Pincode">Student Photo  </label>
   <?php if($row['studentPhoto']==""){ ?>
   <img src="studentphoto/noimage.png" width="200" height="200"><?php } else {?>
   <img src="studentphoto/<?php echo htmlentities($row['studentPhoto']);?>" width="200" height="200">
   <?php } ?>
  </div>
<div class="form-group">
    <label for="Pincode">Upload New Photo  </label>
    <input type="hidden" name="photo" value="<?php echo htmlentities($row['studentPhoto']);?>">
    <input type="file" class="form-control" id="photo" name="photo"  value="<?php echo htmlentities($row['studentPhoto']);?>" />
  </div>


  <?php } ?>

 <button type="submit" name="submit" id="submit" class="btn btn-default">Update</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>

            </div>





        </div>
    </div>
  <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>


</body>
</html>
<?php } ?>
