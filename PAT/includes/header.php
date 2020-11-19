<?php session_start(); ?>
<nav id="main-nav">
  <ul>
    <li><a href="index.php">Home <i class="fas fa-home"></i></a></li>
      <li><a href="#info">Chi Siamo <i class="fas fa-info"></i></a></li>
      <li><a href="#approfondisci">Approfondisci <i class="fas fa-university"></i></a></li>
      <li><a href="#cards">Services <i class="fas fa-boxes"></i></a></li>
      <?php if($_SESSION['logged'] == true): ?>
        <li><a id="cart-btn" href="#cards" ><?php echo $_SESSION['name'] ?> <i class="fas fa-shopping-cart"></i> <?php echo $_SESSION['nrCart']; ?></a></li>
      <?php else: ?>
        <li><a href="loginForm.php">Accedi <i class="fas fa-user"></i></a></li>
      <?php endif; ?>
      
  </ul>
</nav>