<?php 
include '../class/employer.class.php';
$eid = $_GET['id'];
$e = new employer;
$e->DeleteEmp($eid);
header('Location:../listemp.php');
?>