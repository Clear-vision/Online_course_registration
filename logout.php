<?php
session_start();
include("admin/includes/config.php");

$_SESSION['login']=="";

date_default_timezone_set('UTC');
$ldate = date( 'd-m-Y h:i:s A', time () );
mysqli_query($con,"UPDATE userlog  SET logout = '$ldate'
 WHERE studentRegno = '".$_SESSION['login']."' ORDER BY id DESC LIMIT 1");
session_unset();
$_SESSION["logout_message"] = "<span class='alert alert-success'>You have successfully logout</span>";
?>
<script language="javascript">
document.location="index.php";
</script>
