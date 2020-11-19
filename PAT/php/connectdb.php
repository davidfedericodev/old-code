<?php
  $db_host = 'localhost';
  $db_login = 'admin';
  $db_pass = 'admin';
  $database = 'pat';

  // Mi collego al dbms
  $link=mysqli_connect("$db_host", "$db_login", "$db_pass")
  or die ('Non riesco a connettermi a <b>$db_host</b>');

  // Mi collego al db
  mysqli_select_db ($link, $database)
  or die ('Non riesco a selezionare il db $database');

?>