<?php
include '../class/employer.class.php';
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pass1 = $_POST['pass1'];


$e = new employer;


$e->insertEmp($name,$phone,$email,$pass1);
header('Location:../listemp.php');


?>