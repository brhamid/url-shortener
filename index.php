<?php
include './short.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>qısalink</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

<nav class="navbar">
  <div class="logo">qısalink</div>
  <div>
    <div class="dropdown">
      
      <div class="dropdown-content">
        <a href="#">Bizimlə Əlaqə</a>
        <a href="#">Haqqımızda</a> 
      </div>
    </div>
  </div>
</nav>

  <form action="" method="post">
  <label for="link">Qısaltmaq üçün uzun bir link daxil et:</label><br>
  <input type="text" id="link" name="link" placeholder="https://qisalink.com"><br>
  <input type="submit" value="Qısalt">
  <?php 
    echo "<p>".$message."</p>";
    echo $message0 . "<a target='_blank' class='mylink' href='". $link."'>".$shortLink."</a>"
    ?> 
    <br>
    <br>
    <?php echo $message1 . $link ?>
</form>

	<script src="index.js"></script>
  </body>
</html>


