<?PHP
require_once 'dbConnect.php';
class produit {

    private $connection;
    public function __construct()
    {
        $db = new Database;
        $connect = $db->connectDB();
        $this->cnct = $connect;
    }

    private function ExecutionReq($sql)
    {
        $stmt = $this->cnct->prepare($sql);
        return $stmt;
    }

    public function readProd()
    {
      try {
          $sql = 'SELECT * FROM products';
          $result = $this->ExecutionReq($sql);
          $result->execute();
          return $result;
      } catch (PDOException $exception) {
          echo $exception->getMessage();
      }
    }
    public function readPanier()
    {
      try {
          $sql = 'SELECT * FROM product,cart WHERE products.pid = cart.products';
          $result = $this->ExecutionReq($sql);
          $result->execute();
          return $result;
      } catch (PDOException $exception) {
          echo $exception->getMessage();
      }
    }
    public function deletePanier($id)
    {
      try {
          $sql = 'DELETE FROM `cart` WHERE Produit = :x';
          $result = $this->ExecutionReq($sql);
          $result-> bindparam(":x",$id);
          $result->execute();
          return $result;
      } catch (PDOException $exception) {
          echo $exception->getMessage();
      }
    }
    public function ModifierPanier($id,$Quant)
    {
      try {
          $sql = 'UPDATE `cart` SET `Quantity`=:x WHERE Produit = :y';
          $result = $this->ExecutionReq($sql);
          $result-> bindparam(":y",$id);
          $result-> bindparam(":x",$Quant);
          $result->execute();
          return $result;
      } catch (PDOException $exception) {
          echo $exception->getMessage();
      }
    }

    


}