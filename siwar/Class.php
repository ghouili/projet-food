<?PHP
require_once 'DBconnect.php';
class product {

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

    public function Insertproduit($name,$description,$price,$file)
    {
      try {
          $sql = 'INSERT INTO products (name, description, price, file) VALUES (:name, :description, :price, :file)';
          $result = $this->ExecutionReq($sql);
          $result->bindParam(":name",$name);
          $result->bindParam(":description",$description);
          $result->bindParam(":price",$price);
          $result->bindParam(":file",$file);
          $result->execute();
          return $result;
      } catch (PDOException $exception) {
          echo $exception->getMessage();
      }
    }

    public function delProd($pid)
    {
      try {
          $sql = 'DELETE FROM products WHERE pid = :pid';
          $result = $this->ExecutionReq($sql);
          $result-> bindparam(":pid",$pid);
          $result->execute();
          return $result;
      } catch (PDOException $exception) {
          echo $exception->getMessage();
      }
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

    public function readProduct($pid)
    {
      try {
          $sql = 'SELECT * FROM products WHERE pid =:pid';
          $result = $this->ExecutionReq($sql);
          $result-> bindparam(":pid",$pid);
          $result->execute();
          return $result;
      } catch (PDOException $exception) {
          echo $exception->getMessage();
      }
    }
}