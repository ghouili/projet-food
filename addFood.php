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
  <div class="title">
    <h2>ADD FOOD</h2>
    <?php if($_SESSION["img"]!= null){?>
  <img src="<?= $_SESSION["img"];   ?>" class="profilPic"> <?php ;} ?>
    <a href="">Dashboard <?=$_SESSION['name'] ;?> !</a>
  </div>

  <article class="larg">
    <div>
      <h3>Project 1 <span class="entypo-down-open"></span></h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus iste quia incidunt ad provident ullam quo assumenda expedita quae sapiente ipsa qui esse similique! Modi obcaecati natus sapiente quaerat omnis.</p>
    </div>
    <div>
      <h3>Project 2 <span class="entypo-down-open"></span></h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus iste quia incidunt ad provident ullam quo assumenda expedita quae sapiente ipsa qui esse similique! Modi obcaecati natus sapiente quaerat omnis.</p>
    </div>
    <div>
      <h3>Project 3 <span class="entypo-down-open"></span></h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus iste quia incidunt ad provident ullam quo assumenda expedita quae sapiente ipsa qui esse similique! Modi obcaecati natus sapiente quaerat omnis.</p>
    </div>
  </article>
</main>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="js/script.js"></script>

</body>
</html>
  <?php }else {header('location:login-emp.php?try_to_log_in');} ?>