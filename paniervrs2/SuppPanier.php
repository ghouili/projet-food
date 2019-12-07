<?php
$id= $_GET['id'];
include 'Produit.class.php';
$Produit= new produit;
$Produit->deletePanier($id);
header('Location: ../afficherpanier.php');