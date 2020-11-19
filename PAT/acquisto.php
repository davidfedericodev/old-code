<?php
// Start the session
session_start();
require("php/connectdb.php"); 
// Faccio un check dell'email inserita dall'utente con le mail presenti nel db. Se presente, l'utente è già registrato
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
  <title>Acquisto - PAT</title>
</head>
<body>
  
  <?php require("includes/header.php"); ?>

  <div class="container-acquisto">
    <p>Stai per acquistare pacchetto <span><?php echo $_SESSION['nome_prodotto']; ?></span> </p>
    <p class="prezzo">€ <?php echo $_SESSION['prezzo']; ?></p>
    <script>paypal.Buttons().render('.container-acquisto');</script>
    <p class="">Oppure</p>
    <a href="index.php" class="btn btn-secondary">Torna indietro</a>

    
  </div>
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="js/slick.js"></script>
  <script src="js/cart.js"></script>
</body>
</html>
