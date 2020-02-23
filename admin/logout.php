<?php
session_start();
$_SESSION['alogin']=="";
session_unset();
//session_destroy();
$_SESSION['msg'] = "<span class='alert alert-success'>You have successfully logout</span>";
?>
<script language="javascript">
document.location="index.php";
</script>
