<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <title>Products</title>
    
</head>
<body>
    <div class="container py-3">
        <div class="jumbotron">
        <div>
            <h3>Our Products :</h3>
            <a class="btn btn-primary" href="Afficherpanier.php" role="button">Cart</a>
           </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th> id of product :</th>
                    <th>name of product : </th>
                    <th>description of product : </th>
                    <th>price of product : </th>
                    <th>file of product : </th>

                </tr>
            </thead>
            <tbody>
                <?php

                    include 'Classes/Produit.class.php';
                    $Produit= new produit;
                    $rep=$Produit->readProd();
                   
                    while($data = $rep->fetch())
                    {
                        echo '<tr>';
                        echo '<td>'.$data['pid'].'</td>';
                        echo '<td>'.$data['name'].'</td>';
                        echo '<td>'.$data['description'].'</td>';
                        echo '<td>'.$data['price'].'</td>';
                        echo '<td>'.$data['file'].'</td>';
                        echo '<td><button type="button" class="btn btn-primary ajout" data-prod="',$data['name'],'" data-id="',$data['pid'],'" data-toggle="modal" data-target="#myModal">
                        Add to the cart
                      </button></td>&nbsp;&nbsp;';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script>
$(document).on('click', '.ajout', function() {
    $('#form').attr("action","Panier.php?id="+$(this).data('id'));
    $('#Quant2').html($(this).data('prod'));
    $('#myModal').modal('show');

});
 </script>

<!-- --------------------------------------------------------MODAL-------------------------------------------------- -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
      <form id='form'action="" method="post">
        <input type='Text'id='Quant' name='Quant'hidden>
        <p name='Quant2' id='Quant2'></p> Quantity : <input type="Number" id='Quant3' name='Quant3'>
        <button class='btn btn-success'type="submit">Add</button>
        </form>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</html>