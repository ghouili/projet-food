<?php 
include '../class/employer.class.php';
$eid = $_GET['id'];
$e = new employer;
$delete_pic=$e->deleteImg($eid);
var_dump($delete_pic);
$e->DeleteEmp($eid);

header('Location:../listemp.php');
?>