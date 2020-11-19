<?php 
  session_start();

  require("connectdb.php"); 
 

  $nomeProdotto = $_REQUEST['product-name'];
  $idProdotto = (int)$_REQUEST['product'];
  $prezzoProdotto = $_REQUEST['product-price'];
  $emailUtente = $_SESSION['email'];

   // verifico se elemento aggiunto ha già un corrispettivo all'interno del db. 
   $productsSelect = "SELECT * FROM carrello WHERE email_utente = '$emailUtente'";
   $productQuery = mysqli_query($link, $productsSelect);
 
   $nrProductsCart = mysqli_num_rows($productQuery);
   for($i = 0; $i < $nrProductsCart; $i++){
     $productsCart = mysqli_fetch_assoc($productQuery);

     if($productsCart['id_prodotto_esterno'] == $idProdotto) {
       $isProduct = true;
     }
   }


  if($isProduct) {
    $_SESSION['cart-message'] = "Prodotto già inserito nel carrello!";
    header("location: ../index.php");
  } else {
    if(isset($_REQUEST['add_to_cart'])){ //add the element to cart
      $_SESSION['cart-message'] = "Elemento aggiunto al carrello!";
      $idProdotto = (int)$_REQUEST['product'];
      $nomeProdotto = $_REQUEST['product-name'];
      $insertProduct = "INSERT INTO carrello (id_prodotto_esterno, nome_prodotto, prezzo_prodotto, email_utente) VALUES ('$idProdotto', '$nomeProdotto', '$prezzoProdotto', '$emailUtente')";
      $queryProduct = mysqli_query($link, $insertProduct) or die ("Aggiunta fallita");
      
      header("location: ../index.php");
      
    } elseif(isset($_REQUEST['remove_from_cart'])){
      $_SESSION['cart-message'] = "Elemento rimosso dal carrello!";
      $deleteProduct = "DELETE FROM carrello WHERE carrello.nome_prodotto = '$nomeProdotto' and carrello.email_utente = '$emailUtente'";
      $queryProduct = mysqli_query($link, $deleteProduct) or die ("Rimozione fallita");
      
      header("location: ../index.php");
    }
  }  
?>