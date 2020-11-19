<div class="cart-container">
    
    <div class="elements-container">
      <a href="#cart" class="max-btn" id="maximise"><i class="fas fa-chevron-left"></i></a>
      <a href="#cart" class="min-btn" id="minimise"><i class="fas fa-times"></i></a>
      
      <div class="user-img">
      <img src="img/avatar.png" alt="user img">
    </div>  

    <div class="user-name"><?php echo $_SESSION['name']; ?></div>
    <div class="user-mail"><?php echo $_SESSION['email']; ?></div>

    <div class="cart">

      <?php 
        $email = $_SESSION['email'];
        $productsSelect = "SELECT * FROM carrello WHERE email_utente = '$email'";
        $productQuery = mysqli_query($link, $productsSelect);
        $nrProductsCart = mysqli_num_rows($productQuery); 
        for($i = 0; $i < $nrProductsCart; $i++){
          $productsCart = mysqli_fetch_assoc($productQuery);
      ?>
      
          <div class="cart-element">
            <p class="element"><?php echo $productsCart['nome_prodotto']; ?> <span><?php echo $productsCart['prezzo_prodotto']; ?> €</span></p>
            <div class="buttons-container">
              <form action="php/cart.php" method="post">
                <input type="text" name="product-name" value="<?php echo $productsCart['nome_prodotto']; ?>" style="display: none">
                <button type="submit" name="remove_from_cart" class="btn btn-remove"><i class="fas fa-trash-alt"></i></button>
              </form>
              
            </div>
          </div>
          <?php 
            $prezzoTotale = $prezzoTotale + $productsCart['prezzo_prodotto'];
            $_SESSION['nome_prodotto'] = $productsCart['nome_prodotto'];
            $_SESSION['prezzo'] = $productsCart['prezzo_prodotto'];
            $_SESSION['nrCart'] = $nrProductsCart;
          ?>
      <?php } //end for loop ?>
      
      

      <?php if($nrProductsCart > 1 or $nrProductsCart < 1): ?>
        <p class="avviso">Puoi acquistare un solo corso!</p>
      <?php elseif($nrProductsCart = 1): ?>
        <a href="acquisto.php" class="btn">Acquista <i class="fas fa-shopping-cart"></i></a>
      <?php endif; ?>
      
    </div>

    <form action="php/logout.php">
      <button type="submit" class="btn btn-primary btn-logout">Logout <i class="fas fa-sign-out-alt"></i></i></button>
    </form>
    </div>
  </div>