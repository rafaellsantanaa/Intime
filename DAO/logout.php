<?php 
session_start();
SESSION_DESTROY();
header ('Location:../index.php');
exit();
?>