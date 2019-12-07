<?php 

$id= $_GET['id'];
$Quantite= $_POST['Quant3'];
include 'Classes/dbConnect.php';
$conn = new Database();
$pdo=$conn->connectDB();
$sql ='INSERT INTO cart (pid,qty)VALUES('.$id.','.$Quantite.')';
$pdo->exec($sql);
header('Location:panier.php');