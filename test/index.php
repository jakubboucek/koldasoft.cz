<?php
  include './db.inc.php';
  header('Content-Type: text/html; charset=utf-8');
  
  //Proměnné pro info o formuláři
  $is_send = TRUE;
  $is_ok = TRUE;
  $errs = array();
  $vals = array();
  
  //Detekce odeslání formuláře
  $is_send = ($_SERVER['REQUEST_METHOD'] == 'POST') && $is_send;
  
  //Kontrola pouze pokud by odeslán
  $is_ok = $is_ok && $is_send;
  
  //Naplnění hodnot, ověření vyplnění všech  hodnot
  foreach(split(',','email,pass,name,birthdate') as $valname) {
    $vals[$valname] = '';
    //Pokud je pole odesláno
    if(isset($_POST[$valname]) && $_POST[$valname] != '')
      $vals[$valname] = trim($_POST[$valname]); //Uložit
    else
      $is_ok = FALSE; //Jinak ohlásit chybu
  }
  
  //Vypsání chyby
  if($is_send && !$is_ok) 
    $errs[] = "Nevyplnili jste všechna pole. Prosím zkontrolujte formulář a dopňte chybějící údaje.";
  
  //Kontrola polí
  if($is_ok) {
    //Kontrola e-mailu
    if(!preg_match('/[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}/', $vals['email'])) {
      $is_ok = FALSE;
      $errs[] = 'Zaslaný e-mail nemá platný formát. Prosím email zkontrolujte a opravte.';
    }
    
    //Kontrola datumu narození
    $match = array();
    if(preg_match('@([0-9]{1,2})\s*[.,/]\s*([0-9]{1,2})\s*[.,/]\s*([0-9]{4})@', $vals['birthdate'], $match)) {
      if(checkdate($match[2], $match[1], $match[3])) {
        $vals['birthdate'] = "$match[1]. $match[2]. $match[3]";
        $vals['birthdatesql'] = "$match[3]-$match[2]-$match[1]";
      } else {
        $is_ok = FALSE;
        $errs[] = 'Zaslané datum narození je chybné, prosím zkontrolujte jej. Je možné, že jste pouze zaměnili pořadí dne a měsíce.';
      }
    } else {
      $is_ok = FALSE;
      $errs[] = 'Zaslané datum narození nebylo rozpoznáno, prosím zkontrolujte formát.';
    }
  }
  
  //Ověření duplicity
  if($is_ok) {
    $sql = "SELECT COUNT(`email`) as `email_count` FROM `users` WHERE `email` = '" . addslashes($vals['email']) . "';";
    $row=mysqli_fetch_assoc(mysqli_query($db, $sql));
    if($row['email_count']) {
      $is_ok = FALSE;
      $errs[] = 'Tento e-mail je již v databázi registrován.';
    }
    unset($row);
  }
  //Uložení
  if($is_ok) {
    $sql = "INSERT INTO `users` SET";
    $sql .= " `email` = '" . addslashes($vals['email']) . "',";
    $sql .= " `pass` = '" . md5($vals['pass']) . "',";
    $sql .= " `name` = '" . addslashes($vals['name']) . "',";
    $sql .= " `birthdate` = '$vals[birthdatesql]',";
    $sql .= " `regdate` = NOW();";
    if(!$res = mysqli_query($db, $sql)) {
      $is_ok = FALSE;
      $errs[] = 'Při ukládání do SQL došlo k chybě:' . mysqli_error($db);
    }
    unset($res);
  }
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
    <h2>1. část</h2>
    <ul>
      <li>Zpracování vstupních dat,</li>
      <li>uložení dat</li>
    </ul>
    <h2>Obsah testu</h2>
<?php
  if($is_send && !$is_ok) {
    echo "<h3 class=\"err\">Byly zjištěny tyto chyby</h3>\n<ul class=\"err\">\n";
    foreach($errs as $err)
      echo "<li>$err</li>\n";
    echo "</ul>\n"; 
  }
  
  if($is_ok) {
    echo "<p>Uloženo.</p>\n";
    //Po odeslání smaž informace z formuláře
    foreach($vals as $key=>$val)
      $vals[$key] = '';
    
  }
  
?>
    <form action="./" method="post">
      <table class="form">
        <tr>
          <th>E-mail:</th>
          <td><input type="text" name="email" size="40" value="<?php echo htmlspecialchars($vals['email']); ?>"/><br />
              <small>Povinné. Bude ověřen správný formát e-mailu.</small></td>
        </tr>
        <tr>
          <th>Heslo:</th>
          <td><input type="password" name="pass" size="40" value="<?php echo htmlspecialchars($vals['pass']); ?>"/><br />
              <small>Povinné.</small></td>
        </tr>
        <tr>
          <th>Jméno:</th>
          <td><input type="text" name="name" size="40" value="<?php echo htmlspecialchars($vals['name']); ?>"/><br />
              <small>Povinné.</small></td>
        </tr>
        <tr>
          <th>Datum narození:</th>
          <td><input type="text" name="birthdate" size="40" value="<?php echo $vals['birthdate'] ?>"/><br />
              <small>Povinné. Formát data je např.: 18.12.1965.</small></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" value="Odeslat" /></td>
        </tr>
      </table>
    </form>
    <p><a href="./statistika.php">Přejít na druhou část testu --&gt;</a></p>
  </body>
</html>
