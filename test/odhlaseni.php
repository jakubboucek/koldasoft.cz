<?php
  include './db.inc.php';
  header('Content-Type: text/html; charset=utf-8');
  
  session_start();
  
  //Proměnné pro info o formuláři
  
  if(isset($_GET['logout']))
    $_SESSION = array();
  
  $is_logged = isset($_SESSION['name']);
  $user = ($is_logged ? $_SESSION['name'] : FALSE);

  
?>
<?php echo '<'.'?xml version="1.0" encoding="utf-8"?' . '>' . "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-language" content="cs" />
    <meta name="generator" content="Human factor in PSPad [http://www.pspad.com/]" />
    <meta name="author" content="Koldasoft - Snadná cesta k vlastnímu webu [http://www.koldasoft.cz/]; mailto:info@koldasoft.cz" />
    <meta name="copyright" content="&copy; 2007 - 2008 Koldasoft, Všechna práva vyhrazena." />    
    <title>Koldasoft - Hledáme externisty - TEST [PHP/MySQL]</title>
    <link rel="stylesheet" type="text/css" href="./main.css">
  </head>
  <body>
    <h1>TEST [PHP/MySQL]</h1>
    <h2>4. část</h2>
    <ul>
      <li>Odhlášení (ukončení sezení)</li>
    </ul>
    <h2>Obsah testu</h2>
<?php
  if(!$is_logged)
    echo "Žádný uživatel není přihlášen.<br />\n";
  else {
    echo "Přihlášený uživatel: $user.<br />\n";
    echo "<a href=\"?logout\">Odhlásit</a><br />\n";
  }
?>
    <p><a href="./prihlaseni.php">&lt;-- Přejít na třetí část testu</a></p>
  </body>
</html>
