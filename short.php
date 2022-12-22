<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "url_shortener";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['link'])){
  if(!str_starts_with($_POST['link'], "https://") && !str_starts_with($_POST['link'], "HTTPS://")){
    $message = "Linkiniz <strong>'https://'</strong> ilə başlamalıdır.";
  }elseif(!filter_var($_POST['link'], FILTER_VALIDATE_URL)){
    $message = 'Daxil etdiyiniz link uyğun deyil.';
  } elseif (preg_match(!'/[^A-Za-z0-9]/', $_POST['link'])){
    $message = "IDK";
  }
  else{
    $link = mysqli_real_escape_string($conn, $_POST['link']);
    $sql = "INSERT INTO links (short_link) VALUES (?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $link);
    function generateRandomWord() {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomWord = '';
      for ($i = 0; $i < 5; $i++) {
        $randomWord .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomWord;
    }
    if (mysqli_stmt_execute($stmt)){
      $message = "Yeni bir qısa link yaradıldı.";
      $message1 = "Sizin orijinal link: ";
      $message0 = "Sizin qısa link: ";
      $randomWord = generateRandomWord();
      $shortLink = "http://qisalink.com/$randomWord";
    }else{
      echo "Problem baş verdi. Yenidən yoxlayın.";
    }
  }
}elseif($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['link'])){
  $message = "Link daxil edin!";

}


mysqli_close($conn);

?>
