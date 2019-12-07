<?php
  session_start();
  if(isset($_SESSION['eid']))
  {
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.css" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

</head>
<body>
<!-- partial:index.partial.html -->
<span class="bckg"></span>
<header>
  <h1>Dashboard</h1>
  <nav>
    <ul>
      <li>
        <a href="checkf.php" >check orders</a>
      </li>
      <li>
        <a href="addFood.php" >ADD FOOD</a>
      </li>
      <li>
        <a href="listemp.php" >employer list</a>
      </li>
      
    
      <li>
        <a href="include/logout.php" >Logout</a>
      </li>
    </ul>
  </nav>
</header>
<main>
  <div id="ch" class="title">
    <h2>liste des employer</h2>
    <?php if($_SESSION["img"]!= null){?>
  <img src="<?= $_SESSION["img"];   ?>" class="profilPic"> <?php ;} ?>
    <a id="a" href="">Dashboard <?=$_SESSION['name'] ;?> !</a>
  </div>

  <article class="larg">  
    <?php if($_SESSION['eid']!=1) 
    {
    echo '<p class="alert alert-danger text-center" style="margin-top:20%">espace admin</p>';
  }
    
     else { ?>
     
<a href="ajoutEmp.php" style="width:40px;"> <input type="button" value="AJOUT" class="btn btn-success"> </a>


      <div class="container py3">
        <table class="table" style="margin-top:20px;">
          <thead class="thead-dark">
            <tr>
              <th>eid</th>
              <th>name</th>
              <th>email</th>
              <th>phone</th>
              <th>OPTION</th>

            </tr>
          </thead>
          <tbody>
            <?php 
              include 'class/employer.class.php';
              $e = new employer;
              $aff = $e->getNoAdmin();
              while($row = $aff->fetch())
              {
                echo '<tr>';
                echo '<td>'.$row['eid'].'</td>';
                echo '<td>'.$row['name'].'</td>';
                echo '<td>'.$row['email'].'</td>';
                echo '<td>'.$row['phone'].'</td>';
                echo '<td><a style="text-decoration:none;" href="include/deletEmp.php?id='.$row['eid'].'">DELETE</a> </td>';
                
                echo '</tr>';
              }
            ?>
          </tbody>
          
        </table>
      
    </div>
            <?php } ?>
            
  </article>
</main>
<!-- partial -->
<script>
function verifP(){
pass1 = document.getElementById('pass1');
pass2 = document.getElementById('pass2');
bouton  = document.getElementById('bouton');

if(pass1.value != pass2.value){
window.alert('verifer la repetition de votre mot de passe');
}else {
bouton.type='submit';
}
}
</script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="js/script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
</body>
</html>
<?php }else {header('location:login-emp.php?try_to_log_in');} ?>