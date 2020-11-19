<?php
// Start the session
session_start();
?>
<?php

  require("connectdb.php"); 

  

  // Acquisisco i dati del form e li salvo
  
  $email = $_POST['email'];
  $password = $_POST['password'];

  $_SESSION['email'] = $email;

  $_SESSION['logged'] = false;

  // Faccio il check della mail
  $dbEmail = 'SELECT email FROM utenti';
  $dbEmailQuery = mysqli_query($link, $dbEmail) or die ("Non riesco a fare query per la mail utente");

  $nrMail = mysqli_num_rows($dbEmailQuery);
  for($i = 0; $i < $nrMail; $i++) {
    $mails = mysqli_fetch_assoc($dbEmailQuery);

    if($email == $mails['email']):
      $emailExist = true;
    endif;
  }

  //trovo nome associato alla mail
  $userNameDB = "SELECT nome FROM utenti WHERE utenti.email = '$email'";
  $userName = mysqli_query($link, $userNameDB);

  $nrNames = mysqli_num_rows($userName);
  for($i = 0; $i < $nrNames; $i++) {
    $names = mysqli_fetch_assoc($userName);
  }

  // faccio query per id utente
  // $userIdDB = "SELECT id_utente FROM utenti WHERE utenti.email ='$email'";
  // $userID = mysqli_query($link, $userIdDB);

  // $idRows = mysqli_num_rows($userID);

  // for($i = 0; $i < $idRows; $i++) {
  //   $idUser = mysqli_fetch_assoc($idRows);
  // }

  // print_r($idRows);


  // Faccio il check della password
  $encryptedPassword = MD5($password);

  //query per avere la password
  $dbPassword = "SELECT psswd FROM utenti WHERE utenti.email = '$email'";
  $passwordQuery = mysqli_query($link, $dbPassword) or die ("Non riesco a recuperare la password");

  $passwordRows = mysqli_num_rows($passwordQuery);

  for($i = 0; $i < $passwordRows; $i++) {
    $passwordDb = mysqli_fetch_assoc($passwordQuery);
  }
  if($encryptedPassword == $passwordDb['psswd']):
    $passwordExist = true;
  endif;

  if($_SESSION['logged'] == false):
    
    if($passwordExist == true and $emailExist == true):
      header("location: ../index.php");
      $_SESSION['logged'] = true;
      $_SESSION['name'] = $names['nome'];
    else: 
      header("location: ../loginForm.php");
      $_SESSION['logged'] = false;
      $_SESSION['login-message'] = "Login fallito!";

    endif;

  else:
    header("location: ../loginForm.php");
    $_SESSION['logged'] = false;
    $_SESSION['login-message'] = "Login fallito!";
  endif;

  //Chiudo la connessione
  mysqli_close ($link);
?>