<?php
  session_start();
  require("connectdb.php"); 

  header("location: ../loginForm.php");
  // header( "refresh:5;url=../registrationMessage.php" );
  // Acquisisco i dati del form e li salvo
  $nome = $_POST['nome'];
  $cognome = $_POST['cognome'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Faccio un check dell'email inserita dall'utente con le mail presenti nel db. Se presente, l'utente è già registrato
  $dbEmail = 'SELECT email FROM utenti';
  $dbEmailQuery = mysqli_query($link, $dbEmail) or die ("Non riesco a fare query per la mail utente");

  $nrMail = mysqli_num_rows($dbEmailQuery);
  for($i = 0; $i < $nrMail; $i++) {
    $mails = mysqli_fetch_assoc($dbEmailQuery);

    if($email == $mails['email']):
      $emailExist = true;
    endif;
  }


  if($emailExist == true):
    $_SESSION['registrationMessage'] = "La mail che hai inserito corrisponde già ad un'utente";
    $_SESSION['exist'] = true;
  else:
    // Salvo dentro una variabile i valori presi dal form
    // $dati = "INSERT INTO utenti VALUES ('$nome',
    // '$cognome',
    // '$email',
    // MD5('$password'));";
    $dati = "INSERT INTO utenti (nome, cognome, email, psswd) VALUES ('$nome',
    '$cognome',
    '$email',
    MD5('$password'));";

    // Eseguo la query
    mysqli_query($link, $dati)
    or die ('Non riesco ad eseguire la query $dati');
    $_SESSION['exist'] = false;
    $_SESSION['registrationMessage'] = "Utente aggiunto con successo!";
  endif;
  

  //Chiudo la connessione
  mysqli_close ($link);
?>
