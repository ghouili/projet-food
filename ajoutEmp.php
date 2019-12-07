<?php

include 'class/employer.class.php';
$cpass_er=$im_er=$pass_er=$email_er=$name_er = '';
$email=$name = $phone=$imgv= '';
$img=null;
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $repass = $_POST["repass"];
   
    if (!preg_match("/^[a-zA-Z ]+$/",$name)){
        $name_er = "Name must contain only letters and space";
        goto display;
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_er = "invalid email";    
        goto display;
    }
    
    //condition si l'email existe ou nn
         $verif=new employer;
         $ver = $verif->verifier($email);
         
         if($ver->rowCount()>0){
             $email_er="this email is in use";
             goto display;
         }
    //fin condition email
    

    if(strlen($pass)<6){
        $pass_er="password must be minimum of 6 characters";
        goto display;
    }
    if($pass != $repass){
        $cpass_er="Password and Confirm Password doesn't match";
        goto display;

    }
    
    if(!empty($_FILES['img']["name"])){
    
        //t9assem chaine de caractére el table 
       $tmp = explode('.',$_FILES["img"]["name"]);
       //ta5edh e5er case mel tableau tconvertiha chaine de caractére
       $end = strtolower(end($tmp));
       //tableau des extension
       $ext = array('jpg','png','jpeg');
       //testi el extension
       if(!in_array($end,$ext)){
           $im_er="extension non valide";
           goto display;
       } 
      $name_of_file=time().$_FILES["img"]["name"];
      move_uploaded_file($_FILES["img"]["tmp_name"],"img/".$name_of_file);
      
      $img = "img/".$name_of_file;
    
   }
        
    $e = new employer;
$e->insertEmp($name,$phone,$email,$pass,$img);
header('Location:listemp.php');
   
   }
   
  




display:
require 'include/ajoutEmp.phtml';
?>