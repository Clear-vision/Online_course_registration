<?php 
require_once("includes/config.php");
if(!empty($_POST["regno"])) {
	$regno = mysqli_real_escape_string($con,$_POST["regno"]);
	
		$result = mysqli_query($con,"SELECT StudentRegno FROM students WHERE StudentRegno='$regno'");
		$count = mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Student with this Regno Already Registered.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	

}
}


?>
