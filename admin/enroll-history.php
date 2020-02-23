<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0){

header('location:index.php');

}else{



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Enroll History</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['alogin']!="")
{
 include('includes/menubar.php');
}
 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Enroll History  </h1>
                    </div>
                </div>
                <div class="row" >
            
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Enroll History
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                                 <th>Student Name </th>
                                                    <th>Student Reg no </th>
                                            <th>Course Name </th>
                                            <th>Session </th>
                                            
                                                <th>Semester</th>
                                             <th>Enrollment Date</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                <?php
                $sql = mysqli_query($con,"SELECT courseenrolls.id AS enroll_id, courseenrolls.course AS cid, course.courseName AS courname,
                         session.session AS session,department.department AS dept,
                         courseenrolls.enrollDate AS edate ,semester.semester AS sem,
                         students.studentName as sname,students.StudentRegno as sregno 
                         FROM courseenrolls JOIN course ON course.id=courseenrolls.course 
                         JOIN session ON session.id=courseenrolls.session JOIN department 
                         ON department.id=courseenrolls.department JOIN semester 
                         ON semester.id=courseenrolls.semester JOIN students 
                         ON students.StudentRegno=courseenrolls.studentRegno ");
                $cnt = 1;
                while($row = mysqli_fetch_array($sql))
                {
                ?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                              <td><?php echo htmlentities($row['sname']);?></td>
                                            <td><?php echo htmlentities($row['sregno']);?></td>
                                            <td><?php echo htmlentities($row['courname']);?></td>
                                            <td><?php echo htmlentities($row['dept']);?></td>
                                          
                                            <td><?php echo htmlentities($row['sem']);?></td>
                                             <td><?php echo htmlentities(date('F d, Y',strtotime($row['edate'])));?></td>
                                            <td>
                                            <a href="print.php?id=<?php echo $row['enroll_id']?>" target="_blank">
<button class="btn btn-primary"><i class="fa fa-print "></i> Print</button> </a>                                        


                                            </td>
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!--  End  Bordered Table  -->
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
