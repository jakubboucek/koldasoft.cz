<?php
  if(!$db = mysqli_connect('localhost', 'koldatest', 'koldatest', 'koldatest')) {
    header('HTTP/1.0 503 Service unavailable');
    header('Content-Type: text/plain; charset=utf-8');
    die("Lituji, ale MySQL server se nepodařilo připojit.\n\t" . mysqli_connect_error());
  }
  mysqli_query($db, 'SET CHARACTER SET UTF8;');
?>
