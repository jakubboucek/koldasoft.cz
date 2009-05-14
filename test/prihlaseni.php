<?php
  include './db.inc.php';
  header('Content-Type: text/html; charset=utf-8');
  
  session_start();
  
  //Proměnné pro info o formuláři
  $is_logged = isset($_SESSION['name']);
  $user = ($is_logged ? $_SESSION['name'] : FALSE);
  $login_fail = FALSE;

  $is_ok = TRUE;
  $errs = array();
  $vals = array();
  
  //Detekce odeslání formuláře
  $is_send = $_SERVER['REQUEST_METHOD'] == 'POST';
  
  //Kontrola pouze pokud by odeslán
  $is_ok = $is_ok && $is_send;
  
  //Naplnění hodnot, ověření vyplnění všech  hodnot
  foreach(split(',','email,pass') as $valname) {
    $vals[$valname] = '';
    $vals["${valname}_sql"] = '';
    $vals["${valname}_html"] = '';
    //Pokud je pole odesláno
    if(isset($_POST[$valname]) && $_POST[$valname] != '') {
      $vals[$valname] = trim($_POST[$valname]); //Uložit
      $vals["${valname}_sql"] = addslashes(trim($_POST[$valname]));
      $vals["${valname}_html"] = htmlspecialchars(trim($_POST[$valname]));
    } else
      $is_ok = FALSE; //Jinak ohlásit chybu
  }
  if($vals['pass'] != '')
    $vals['pass_sql'] = md5($vals['pass']);
  
  if(!$is_logged && $is_ok) {
    $sql = "SELECT `email`, `name`, `birthdate` FROM `users` WHERE `email` = '$vals[email_sql]' AND `pass` = '$vals[pass_sql]';";
    if($row = mysqli_fetch_assoc(mysqli_query($db,$sql))) {
      $_SESSION = $row;
      $is_logged = TRUE;
      $user = $_SESSION['name'];
      foreach(split(',','email,pass') as $valname) {
        $vals[$valname] = '';
        $vals["${valname}_sql"] = '';
        $vals["${valname}_html"] = '';
      }
    } else {
      $login_fail = TRUE;
    }
      
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
    <h2>3. část</h2>
    <ul>
      <li>Autorizace,</li>
      <li>udržení sezení</li>
    </ul>
    <h2>Obsah testu</h2>
<?php
  if(!$is_logged)
    echo "Uživatel není přihlášen.<br />\n";
  else
    echo "Přihlášený uživatel: $user.<br />\n";
  if($login_fail)
    echo "<div class=\"err\">Zadali jste neplatné přihlašovací údaje.</div><br />\n";
  if(!$is_logged) {
?>
<form action="./prihlaseni.php" method="post">
  <p>Přihlašte se pomocí údajů zadaných při <a href="./">registraci</a>.</p>
      <table class="form">
        <tr>
          <th>E-mail:</th>
          <td><input type="text" name="email" size="40" value="<?php echo htmlspecialchars($vals['email']); ?>"/></td>
        </tr>
        <tr>
          <th>Heslo:</th>
          <td><input type="password" name="pass" size="40" value=""/></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" value="Přihlásit" /></td>
        </tr>
      </table>
    </form>
<?php
  }
?>
    <p><a href="./statistika.php">&lt;-- Přejít na druhou část testu</a>&nbsp;&nbsp;&nbsp;<a href="./odhlaseni.php">Přejít na poslední část testu --&gt;</a></p>
  </body>
</html>
