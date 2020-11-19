<?php
// Start the session
  session_start();
  require("php/connectdb.php"); 
  $_SESSION['nrCart'] = 0;
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
  <title>Home Page - PAT</title>
</head>
<body></body>
  <?php require("includes/cart.php"); ?>
  <?php require("includes/header.php"); ?>

  <?php if(isset($_SESSION['cart-message'])): ?>
    <p id="alert"><?php echo $_SESSION['cart-message']; ?></p>
    <?php unset($_SESSION['cart-message']); ?>
  <?php endif; ?>
  
  
  

  <header id="header">
    <img src="img/LOGO.png" alt="Logo">
    <h1 class="main-heading">Parkour Athletics Training</h1>
    <a href="#cards" class="btn btn-primary">Scopri i nostri corsi</a>
  </header>
  <main>

    <section id="info" class="info u-margin-top-big">
      <div class="info-container">
        <div>
          <h2 class="secondary-heading color-primary u-margin-bottom-medium">Chi siamo</h2>
          <div class="content">
            <p class="content-text u-margin-bottom-small">
            PAT, acronimo di Parkour Athletic Training, è una start-up che pratica attività in ambito sportivo.
Più precisamente crea corsi a pagamento di atletica e parkour, rivolti sia ad atleti agonisti che non agonisti, per il miglioramento delle proprie capacità di esplosività, coordinazione motoria, rapidità, forza e molti atri aspetti che caratterizzano queste due specialità unite insieme.
            </p>
            <a href="#cards" class="link">Iscriviti a un nostro corso!</a>
          </div>
        </div>

        <div>
            <h2 class="secondary-heading color-primary u-margin-bottom-medium">Chi siamo</h2>
            <div class="content">
              <p class="content-text u-margin-bottom-small">
              La nostra società offre coaching assistito, assistenza medica e alimentare all’interno di qualunque tipo di pacchetto l’atleta decida di acquistare.
I nostri coach, medici e dietisti sono dotati di certificazioni che attestano la loro competenza in ogni singolo settore essi lavorino.

              </p>
              <a href="#cards" class="link">Iscriviti a un nostro corso!</a>
            </div>
          </div>

          <div>
              <h2 class="secondary-heading color-primary u-margin-bottom-medium">Chi siamo</h2>
              <div class="content">
                <p class="content-text u-margin-bottom-small">
                Le lezioni sono svolte a seconda del meteo, o internamente palestre convenzionate o altrimenti presso il campo di atletica leggera della città dell’Aquila.
I programmi saranno personalizzati dai nostri coach per ogni singolo atleta.
Ogni atleta riceverà il proprio programma settimanalmente o mensilmente tramite e-mail così da poter eseguire gli esercizi anche a casa seguito a problemi per il raggiungimento delle strutture usate per l’attività.

                </p>
                <a href="#cards" class="link">Iscriviti a un nostro corso!</a>
              </div>
            </div>
      
      </div>
    </section>

    <section id="approfondisci" class="pk">
      <a href="parkour.php" class="pk-link secondary-heading color-white">Parkour<br>
        <p class="link color-white">Approfondisci la disciplina</p>
      </a>
    </section>

   


    <section id="cards" class="services u-margin-bottom-big">
        <h2 class="secondary-heading color-tertiary u-margin-bottom-medium">Our Services</h2>
        <div class="services-container">
          
          <?php 
            $dbProducts = 'SELECT * FROM products';
            $dbProductsQuery = mysqli_query($link, $dbProducts) or die ("Non riesco a fare query per i prodotti nel db");
            
            $nrProducts = mysqli_num_rows($dbProductsQuery);
            $product = array();
            for($i = 0; $i < $nrProducts; $i++){
              $products = mysqli_fetch_assoc($dbProductsQuery); 
              array_push($product, $products);
            }
          
          ?>
          <div class="card card--1">
            <p class="card-title"><?php echo $product[0]['nome']; ?></p>
            <ul class="card-list">
              <li class="card-list-item">Allenamento salti</li>
              <li class="card-list-item">Allenamento atterraggi da altezza</li>
              <li class="card-list-item">Allenamento acrobatica di base</li>
              <li class="card-list-item">Allenamento acrobatica avanzata</li>
              <li class="card-list-item">Come affrontare le proprie paure</li>
            </ul>
            <p class="price price--1"><?php echo $product[0]['prezzo']; ?>€ / Mese</p>
            <?php if($_SESSION['logged'] == true): ?>
              <form action="php/cart.php" method="post">
                <input type="number" name="product" value="<?php echo $product[0]['id_product'] ?>" style="display: none">
                <input type="text" name="product-name" value="Parkour" style="display: none">
                <input type="text" name="product-price" value="<?php echo $product[0]['prezzo'] ?>" style="display: none">
                <button type="submit" name="add_to_cart" class="btn btn-primary btn-notification">Compra corso <i class="fas fa-shopping-cart"></i></button>
              </form>
            <?php else:?>
              <a href="#registrati" class="btn btn-primary">Compra Corso</a>
            <?php endif; ?>
          </div>
  
          <div class="card card--2">
            <p class="card-title"><?php echo $product[1]['nome']; ?></p>
            <ul class="card-list">
              <li class="card-list-item">Allenamento esplosività da fermo </li>
              <li class="card-list-item">Allenamento esplosività in corsa</li>
              <li class="card-list-item">Allenamento tecnica salto</li>
              <li class="card-list-item">Allenamento tecnica corsa </li>
              <li class="card-list-item">Allenamento coordinazione motoria</li>
            </ul>
            <p class="price price--2"><?php echo $product[1]['prezzo']; ?>€ / Mese</p>
            <?php if($_SESSION['logged'] == true): ?>
              <form action="php/cart.php" method="post">
                <input type="number" name="product" value="<?php echo $product[1]['id_product'] ?>" style="display: none">
                <input type="text" name="product-name" value="Atletica" style="display: none">
                <input type="text" name="product-price" value="<?php echo $product[1]['prezzo'] ?>" style="display: none">
                <button  type="submit" name="add_to_cart" class="btn btn-secondary btn-notification">Compra corso <i class="fas fa-shopping-cart"></i></button>
              </form>
            <?php else:?>
              <a href="#registrati" class="btn btn-secondary">Compra Corso</a>
            <?php endif; ?>
          </div>
          <div class="card card--3">
            <p class="card-title"><?php echo $product[2]['nome']; ?></p>
            <ul class="card-list">
              <li class="card-list-item">Allenamento salti </li>
              <li class="card-list-item">Allenamento atterraggi</li>
              <li class="card-list-item">Allenamento corsa</li>
              <li class="card-list-item">Allenamento esplosività </li>
              <li class="card-list-item">Allenamento acrobazie </li>
            </ul>
            <p class="price price--3"><?php echo $product[2]['prezzo']; ?>€ / Mese</p>
            <?php if($_SESSION['logged'] == true): ?>
              <form action="php/cart.php" method="post">
                <input type="number" name="product" value="<?php echo $product[2]['id_product'] ?>" style="display: none">
                <input type="text" name="product-name" value="Misto" style="display: none">
                <input type="text" name="product-price" value="<?php echo $product[2]['prezzo'] ?>" style="display: none">
                <button  type="submit" name="add_to_cart" class="btn btn-tertiary btn-notification">Compra corso <i class="fas fa-shopping-cart"></i></button>
              </form>
            <?php else:?>
              <a href="#registrati" class="btn btn-tertiary">Compra Corso</a>
            <?php endif; ?>
          </div>
        </div>
      </section>

      <section class="athletics">
      <a href="athletics.php" class="pk-link secondary-heading color-white">Atletica<br>
        <p class="link color-white">Approfondisci la disciplina</p>
      </a>
    </section>
    
    <section class="coach u-margin-bottom-big">
      <h2 class="secondary-heading color-tertiary u-margin-bottom-medium">I nostri coach</h2>
      <div class="coach-container">

        <div class="card">
          <!-- <img src="img/Visage-du-monde-Angola-photo-de-John-Kenny.svg" alt="" class="coach-img"> -->
          <img src="img/david.png" alt="" class="coach-img">
          <p class="coach-name">David Rosca</p>
          <p class="coach-info">Parkour Trainer</p>
          <a href="https://www.instagram.com/davidfederico_/"><i class="fab fa-instagram"></i></a>
          <a href="https://www.facebook.com/david.rosca.3"><i class="fab fa-facebook"></i></a>
        </div>

        <div class="card">
          <!-- <img src="img/Visage-du-monde-Angola-photo-de-John-Kenny.svg" alt="" class="coach-img"> -->
          <img src="img/mauro.jpeg" alt="" class="coach-img">
          <p class="coach-name">Mauro Colantoni</p>
          <p class="coach-info">Athletics Trainer</p>
          <a href="https://www.instagram.com/mauro_colantoni00/"><i class="fab fa-instagram"></i></a>
          <a href="https://www.facebook.com/profile.php?id=100004816506665"><i class="fab fa-facebook"></i></a>
        </div>

        <div class="card">
          <!-- <img src="img/5f1eb9e7df762aca5c23a5e34e1ce942.svg" alt="" class="coach-img"> -->
          <img src="img/pasha.jpg" alt="" class="coach-img">
          <p class="coach-name">Pasha The Boss</p>
          <p class="coach-info">Mixed Trainer</p>
          <p class="coach-info"></p>
          <a href="https://www.instagram.com/pashatheboss/"><i class="fab fa-instagram"></i></a>
          <a href="https://www.facebook.com/PavelPetkuns/"><i class="fab fa-facebook"></i></a>
        </div>
      </div>
    </section>

   
    <section class="call-to-login u-margin-bottom-big" id="registrati">
      <div class="container">
        <p class="description">Per comprare uno dei nostri corsi è necessario registrarsi. Se sei pronto ad iniziare questa grande avventura insieme, clicca subito qui sotto!</p>
        <a href="loginForm.php" class="btn btn-tertiary">Registrati</a>
      </div>
     
    </section>


    
    <section class="contact u-margin-bottom-big">
      <div class="contact-container">
        <div class="contact-image">&nbsp;</div>
        <div class="contact-content">
          <h2 class="secondary-heading color-tertiary u-margin-bottom-medium">Contatti & Supporto</h2>
          <a href="mailto:rosca.david43@gmail.com" class="btn btn-primary">Invia un'Email <i class="fas fa-envelope"></i></a>
          <a href="tel:+393381079957" class="btn btn-secondary">Chiamaci <i class="fas fa-phone"></i></a>
          <!-- <form action=""> -->
            <!-- <label for="email">Email</label> -->
            <!-- <input type="email" name="email" placeholder="Email"> -->
            <!-- <label for="msg">Message</label><br> -->
            <!-- <textarea name="msg" id="" cols="30" rows="10" placeholder="Message"></textarea> -->
            <!-- <button type="button" class="btn btn-primary">Invia</button> -->
          <!-- </form>  -->
        </div>
      </div>
    </section>

  </main>

  <footer></footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="js/slick.js"></script>
  <script src="js/cart.js"></script>
  <script src="js/notification.js"></script>
</body>
</html>