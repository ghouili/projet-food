<?php
$id= $_GET['id'];
$quant = $_POST['NVQ'];
echo $_POST['NVQ'];
include 'Produit.class.php';
$Produit= new produit;
$Produit->ModifierPanier($id,$quant);
header('Location: ../afficherpanier.php');