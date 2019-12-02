<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Simple Login Form Template</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/log.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="log-form">
  <h2>Login to your account</h2>
  <form action="include/check.php" method="post">
  <?php
    if(isset($_GET['er']))
    echo '<p style="color:red">password incorrect</p>';
    if(isset($_GET['erro']))
    echo '<p style="color:red">compte non valide </p>';
   
  ?>
    <input type="email"  name="email" placeholder="email"  <?php if(isset($_GET['er'])) echo'value='.$_GET['er']; ?>  required />
    <input type="password"  name="pass" placeholder="password" required />
    <button type="submit" class="btn">Login</button>
 
  </form>
</div><!--end log form -->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.msin.js'></script>
</body>
</html>