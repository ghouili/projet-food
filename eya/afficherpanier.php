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
    <title>Panier</title>
</head>
<body>
    <div class="container py-3">
        <div class="jumbotron">
            <h3>Panier :</h3>
        </div>
        <a class="btn btn-primary" href="Afficherprod.php" role="button">Continuer à mes achats</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>nom du produit : </th>
                    <th>Quantite: </th>
                    <th>le prix du produit : </th>
                    <th>le prix Totale: </th>
                    <th>Action</th>
                    <th>Somme Totale</th>

                </tr>
            </thead>
            <tbody>
                <?php

                    include 'Classes/Produit.class.php';
                    $Produit= new produit;
                    $rep=$Produit->readPanier();
                    $sum=0;
                    while($data = $rep->fetch())
                    { $sum+=$data['price']*$data['Quantite'];
                        echo '<tr>';
                        echo '<td>'.$data['name'].'</td>';
                        echo '<td>'.$data['Quantite'].'</td>';
                        echo '<td>'.$data['price'].' TND</td>';
                        echo '<td>'.$data['price']*$data['Quantite'].' TND</td>';
                        echo '<td><button type="button" class="btn btn-danger supprimer" data-prod="',$data['name'],'" data-id="',$data['pid'],'" data-toggle="modal" data-target="#myModal">
                        Supprimer
                      </button>
                      <button type="button" class="btn btn-primary modifier" data-prod="',$data['name'],'" data-id="',$data['pid'],'" data-toggle="modal" data-target="#myModal">
                        Modifier
                      </button>
                      </td>&nbsp;&nbsp;<td></td>';
                        
                        echo '</tr>';
                    }
                    echo'<tr><td></td><td></td><td></td><td></td><td></td>
                    <td>'.$sum.' TND</td>
                    </tr>';
                ?>
            </tbody>
        </table>
    </div>
</body>
<script>
$(document).on('click', '.supprimer', function() {
    $('#form').attr("action","Classes/SuppPanier.php?id="+$(this).data('id'));
    $('#Quant2').html('voulez vou vraiment Supprimer ce Produit : '+$(this).data('prod')+' ?');
    $('#myModal').modal('show');

});
$(document).on('click', '.modifier', function() {
    $('#form2').attr("action","Classes/ModPanier.php?id="+$(this).data('id'));
    $('#myModal2').modal('show');

});
</script>
<!-- --------------------------------------------------------MODAL-------------------------------------------------- -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
      <form id='form'action="" method="post">
        <p name='Quant2' id='Quant2'></p>
        <button class='btn btn-danger'type="submit">Supprimer</button>
        </form>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<!-- --------------------------------------------------------MODAL-------------------------------------------------- -->
<div class="modal" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
      <form id='form2'action="" method="post">
        <p name='Quant22' id='Quant22'>Entrer le nouveau Quantite</p>
        <input type="text" name="NVQ" class='form-control'>
        <button class='btn btn-danger'type="submit">Modifier</button>
        </form>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
</html>