<?php

if(isset($_GET["pid"]) && !empty(trim($_GET["pid"]))){
    require_once "Class.php";
    
    $prod=new product;
        
        $data=$prod->readProduct(trim($_GET["pid"]));
               
            if($data->rowCount() == 1){
            
                $row = $data->fetch();
                
                
                $name = $row["name"];
                $description = $row["description"];
                $price = $row["price"];
                $file = $row["file"];
            } else{
                
                header("location: error.php");
                exit();
            }
            
        
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>description</label>
                        <p class="form-control-static"><?php echo $row["description"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>price</label>
                        <p class="form-control-static"><?php echo $row["price"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>file</label>
                        <p class="form-control-static"><?php echo $row["file"]; ?></p>
                    </div>















                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>