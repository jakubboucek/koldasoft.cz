<?php  //Vytvoreni zakladnich promennych a jmen pro danou stranku

  // Osetreni pro domovskou stranku \\
  If(isset($_GET['open']))  //Pokud je promenna ziskana pres GET
    $open = $_GET['open'];  //Ziskani promenne z adresove radky
  Else  //Pokud neexistuje promenna open (pozadavek na otevreni domovske stranky)
  {
    $open = "uvod";  //Nastaveni vychozi stranky pro otevreni
    $page_ph = "snadná cesta k vlastnímu webu"; //Ulozeni pridane hodnoty
  }    

  $page_source = "source/pages/";  //Ulozeni zacatku adresy pro danou stranku

  // Nacteni informaci o dane strance \\
  If(!$page_info = my_db_read_line("source/page.db", $open))  //Pokud NElze nacist informace o pozadovane strance
  {
    unset($page_info);  //Odstraneni puvodni promenne  
    $page_info[0] = "not-found";  //Ulozeni nazvu 
    $page_info[1] = "Stránka nenalezena";  //Ulozeni jmena 
    $page_info[4] = "/";  //Stranka je v rootu
  }

  // Vytvoreni jmena stranky \\
  $page_name = $page_info[1];  //Ulozeni jmena stranky

?>
