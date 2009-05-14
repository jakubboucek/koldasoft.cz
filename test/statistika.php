<?php
  include './db.inc.php';
  header('Content-Type: text/html; charset=utf-8');
  
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
    <div><img src="./logo.png" alt="Koldasoft" id="logo"/></div>
    <h1>TEST [PHP/MySQL]</h1>
    <h2>2. část</h2>
    <ul>
      <li>Načtení dat,</li>
      <li>zpracování dat,</li>
      <li>zobrazení dat.</li>
    </ul>
    <h2>Obsah testu</h2>
<?php
  echo "<h3>Seznam registrovaných uživatelů</h3>\n";
  $sql = "SELECT `name`,`email`,`birthdate`,TIMESTAMPDIFF(MINUTE, `regdate`, NOW()) as `regdate` FROM `users`;";
  if($res = mysqli_query($db, $sql)) {
    echo "<table class=\"users\">\n";
    echo "  <tr>\n";
    echo "    <th>Jméno</th>\n";
    echo "    <th>E-mail</th>\n";
    echo "    <th>Datum narození</th>\n";
    echo "    <th>Uplynulá doba od registrace</th>\n";
    echo "  </tr>\n";
    while($row = mysqli_fetch_assoc($res)) {
      echo "  <tr>\n";
      echo "    <td>" . htmlspecialchars($row['name']) . "</td>\n";
      echo "    <td><a href=\"mailto:" . htmlspecialchars($row['email']) . "\">" . htmlspecialchars($row['email']) . "</a></td>\n";
      echo "    <td>" . date('j. m. Y', strtotime($row['birthdate'])) . "</td>\n";
      echo "    <td>" . $row['regdate'] . " minut</td>\n";
      echo "  </tr>\n";
    }     
    echo "</table>\n"; 
  } else {
    echo "<p>Chyba při načítání dat z databáze: " . mysqli_error($db) . "</p>\n";
  }
  unset($row);
  mysqli_free_result($res);
  
  echo "<h3>Věk nejstaršího registrovaného člena (s přesností na 1 rok)</h3>\n";
  $sql = "SELECT TIMESTAMPDIFF(YEAR, MIN(`birthdate`), NOW()) as `vek` FROM `users`;";
  if($res = mysqli_query($db, $sql)) {
    $row = mysqli_fetch_assoc($res);
    if(!is_null($row['vek']))
      echo "<p>$row[vek] let.</p>";
    else 
      echo "Zatím není v databázi žádný záznam.";
  } else {
    echo "<p>Chyba při načítání dat z databáze: " . mysqli_error($db) . "</p>\n";
  }
  unset($row);
  mysqli_free_result($res);
   
  echo "<h3>Počet uživatelů s e-mailem vedeným na centrum.cz</h3>\n";
  $sql = "SELECT COUNT(`email`) `pocet` FROM `users` WHERE `email` LIKE '%@centrum.cz';";
  if($res = mysqli_query($db, $sql)) {
    $row = mysqli_fetch_assoc($res);
      echo "<p>$row[pocet] uživatelů.</p>";
  } else {
    echo "<p>Chyba při načítání dat z databáze: " . mysqli_error($db) . "</p>\n";
  }
  unset($row);
  mysqli_free_result($res);
  
  echo "<h3>Počet uživatelů celkem</h3>\n";
  $sql = "SELECT COUNT(`id`) `pocet` FROM `users`;";
  if($res = mysqli_query($db, $sql)) {
    $row = mysqli_fetch_assoc($res);
      echo "<p>$row[pocet] uživatelů.</p>";
  } else {
    echo "<p>Chyba při načítání dat z databáze: " . mysqli_error($db) . "</p>\n";
  }
  unset($row);
  mysqli_free_result($res);
   
?>
    <p><a href="./">&lt;-- Přejít na první část testu</a>&nbsp;&nbsp;&nbsp;<a href="./prihlaseni.php">Přejít na třetí část testu --&gt;</a></p>
  </body>
</html>
