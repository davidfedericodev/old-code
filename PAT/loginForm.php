<?php
// Start the session
session_start();
?>

<?php if($_SESSION['logged'] == false): ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Login - PAT</title>
</head>
<body>
  <?php require("includes/header2.php"); ?>

  <div class="l-container">
    <?php if(isset($_SESSION['registrationMessage'])): ?>
      <?php if($_SESSION['exist'] == true): ?>
        <p class="alert-danger"><?php echo $_SESSION['registrationMessage']; ?></p>
        <?php unset($_SESSION['registrationMessage']); ?>
      <?php else: ?>
        <p class="alert-success"><?php echo $_SESSION['registrationMessage']; ?></p>
        <?php unset($_SESSION['registrationMessage']); ?>
      <?php endif; ?>
    <?php endif; ?>
    
    <?php if(isset($_SESSION['login-message'])): ?>
      <p class="alert-danger"><?php echo $_SESSION['login-message']; ?></p>
      <?php unset($_SESSION['login-message']); ?>
    <?php endif; ?>
    
    <div class="container" id="container">
      <div class="form-container sign-up-container">
        
        <form class="sign-up" action="php/registration.php" method="post">
          <h1>Crea Account</h1>
          
          <span>Usa la tua mail per la registrazione</span>
          <input type="text" placeholder="Name" name="nome" required>
          <input type="text" placeholder="Surname" name="cognome" required>
          <input type="email" placeholder="Email" name="email" required>
          <input type="password" placeholder="Password"  name="password" pattern=".{5,20}" required title="5 to 20 characters">
          <button type="submit">Registrati</button>
        </form>

      </div>
      <div class="form-container sign-in-container">
        <form  action="php/login.php" method="post">
          <h1>Login</h1>
          
          <input type="email" placeholder="Email" name="email" required>
          <input type="password" placeholder="Password" name="password" required>
          <!-- <a href="#">Forgot your password?</a> -->
          <button type="submit">Login</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Esegui login</h1>
            <p>Per acquistare uno dei nostri corsi esegui il login!</p>
            <button class="ghost" id="signIn">Login</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Registrati</h1>
            <p>E' necessario registrarsi per poter effettuare un'acquisto sul nostro sito</p>
            <button class="ghost" id="signUp">Registrati</button>
          </div>
        </div>
      </div>
    </div>

  </div>
  
  </main>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="js/slick.js"></script>
  <script src="js/app.js"></script>
  <script src="js/notification.js"></script>
</body>
</html>

<?php else: ?>

<?php header("location: ../index.php"); ?>

<?php endif; ?>