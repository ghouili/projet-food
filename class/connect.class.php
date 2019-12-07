<?php
class connect{
    private $host ='localhost';
    private $dbname= 'food';
    private $user = 'root';
    private $pass = 'toor';
    public $pdo = null;
    public function ConDb(){
        try {
            $this->pdo = new PDO ('mysql:host='.$this->host.';dbname='.$this->dbname,$this->user,$this->pass);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $this->pdo;
    }

}


?>