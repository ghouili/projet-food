<?php
session_start();
session_destroy();
unset($_SESSION['email']);
unset($_SESSION['name']);
unset($_SESSION['eid']); 
unset($_SESSION['img']); 

header('location:../login-emp.php');
?>