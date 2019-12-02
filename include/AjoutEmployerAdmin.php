<?php
 
 try {
     $x = new PDO ('mysql:host=localhost;dbname=food','root','');
 } catch (Exception $e) {
     echo $e->getMessage();
 }
 $pass = password_hash('admin',PASSWORD_DEFAULT);
 $name ='ahmed';
 $phone = '197';
 $email = 'admin@yahoo.com';

 $req = 'INSERT into employer (name,phone,email,password) VALUES (:name,:phone,:email,:pass)';
 $res = $x->prepare($req);
 $res->bindParam(':pass',$pass);
 $res->bindParam(':name',$name);
 $res->bindParam(':phone',$phone);
 $res->bindParam(':email',$email);
 $res->execute();
 

?>