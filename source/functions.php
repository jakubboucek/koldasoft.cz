<?php  //Soubor zakladnich funkci

  $cesta = BASEPATH;  //Absolutni cesta k souboru
  
  function mylink($target, $text = "", $sharp = "", $sharp_title = "", $class = "")  //Fce vytvori odkaz na pozadovanou stranku, Target = cil odkazu, Text = text zobrazeny jako odkaz, Sharp = text za #, titulek #, class = trida, ktera se aplikuje do tagu <a>
  {
    global $cesta;  //Ziskani globalni promenne
    If($page_info = my_db_read_line(INCLUDE_PATH."page.db", $target))  //Pokud lze nacist informace o pozadovane strance
      return("<a".($class != "" ? " class=\"$class\"" : "")." href=\"$cesta".$page_info[0]."/".($sharp == "" ? "" : "#".$sharp)."\" title=\"$page_info[3]".($sharp_title != "" ? " -&gt; ".$sharp_title : "")."\">".($text == "" ? $page_info[1] : $text)."</a>");  //Navratova hodnota - Odkaz na dane umisteni, pokud neni zadany text, pouzije se vychozi
    Else  //Pokud nelze nacist informace o pozadovane strance
      return("<a href=\"/koldasoft/\" title=\"Odkaz nelze najít\">".($text == "" ? "???" : $text)."</a>");  //Navratova hodnota - Odkaz na domovskou adresu - odkaz nebyl nalezen
  }



?>
