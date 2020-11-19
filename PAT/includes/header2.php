<nav id="main-nav">
  <ul>
    <li><a href="index.php">Home <i class="fas fa-home"></i></a></li>
      <?php if($_SESSION['logged'] == true): ?>
        <li><a href="userprofile.php"><?php echo $_SESSION['name']; ?> <i class="fas fa-user"></i></a></li>
      <?php else: ?>
        <li><a href="loginForm.php">Accedi <i class="fas fa-user"></i></a></li>
      <?php endif; ?>
  </ul>
</nav>