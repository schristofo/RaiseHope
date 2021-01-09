<?php
session_start();
session_unset();
$_SESSION['User'] = "";
header("Location:index.php");
?>
