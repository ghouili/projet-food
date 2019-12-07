<?php
require_once "Class.php";
$prod = new product;
$name = $description = $price = $file = "";
$name_err = $description_err = $price_err = $file_err= "";
if(isset($_POST["pid"]) && !empty($_POST["pid"])){
    $pid = $_POST["pid"];
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s ]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;}
    }
    