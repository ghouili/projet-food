<?php
session_start();
include '../class/employer.class.php';
$email = $_POST['email'];
$pass = $_POST['pass'];
$emp=new employer;
$ep = $emp->verifier($email);
$row = $ep->fetch();
if($ep->rowCount()>0){
    if(!password_verify($pass,$row['password'])){
        header('location:../login-emp.php?er='.$email);
}else{ if (password_verify($pass,$row['password'])){
    
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $row['name'];
    $_SESSION['eid'] = $row['eid'];
    $_SESSION['img'] = $row['img'];
    header('location:../addFood.php');}
}
}else {header('location:../login-emp.php?erro=log_and_pass_invalide');}
?>