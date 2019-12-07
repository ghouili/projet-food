<?php
  include 'connect.class.php';
  class employer{
      private $cnx;
      public function __construct(){
            $bd = new connect;
            $this->cnx = $bd->ConDb();
      }

      public function verifier($email){
        $req="SELECT * From employer where email = :email";
        $res = $this->cnx->prepare($req);
        $res->bindParam(':email',$email);
        $res->execute();
        return $res;
      }

      //affiche les employer sauf que l'admin

      public function getNoAdmin(){
       try {
         $req="SELECT * FROM employer where eid != 1";
         $res = $this->cnx->prepare($req);
         $res->execute();
         return $res;
       } catch (Exception $e) {
         echo $e->getMessage();
       }
      }

      public function DeleteEmp($eid){

          try {
            $req= "DELETE FROM employer where eid = :eid";
            $res = $this->cnx->prepare($req);
            $res->bindParam(':eid',$eid);
            $res->execute();
            return $res; 
          } catch (Exception $e) {
             echo $e->getMessage();
          }

      }

      public function insertEmp($name,$phone,$email,$password,$img){
        try {
          $req = "INSERT into employer(name, phone, email, password,img) VALUES (:name, :phone, :email, :password,:img) ";
          $res = $this->cnx->prepare($req);
          $res->bindParam(':name',$name);
          $res->bindParam(':phone',$phone);
          $res->bindParam(':email',$email);
          $passHashed=password_hash($password, PASSWORD_DEFAULT);
          $res->bindParam(':password',$passHashed);
          $res->bindParam(':img',$img);
          $res->execute();
          return $res;
        } catch (Exception $e) {
          echo $e->getMessage();
        }
      }
  }
?>