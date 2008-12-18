<?php  //Vertikalni menu

  $all_page_info = my_db_read_all("source/page.db");  //Nacteni informaci o vsech strankach
  $found_i = 0;  //Nulovani pom. prom., urcuje, zda byla nalezena polozka 
  $found_j = 0;  //Nulovani pom. prom., urcuje, zda byla nalezena polozka 
  For($i = 0; $i < count($all_page_info); $i++)  //Cyklus projde vsechny stranky
  {
    If($page_info[4] == "/")  //Pokud se jedna o hlavni stranku (v rootu)
    {
      If($all_page_info[$i][4][0] == $page_info[0] && !isset($all_page_info[$i][4][1]))  //Pokud je prave prochazena stranka "sousedni" a nema dalsi zanoreni
      {
        If(!$found_i)  //Pokud dosud nebylo nalezeno
        {
          echo("          <div class=\"box\">
            <h4>".$page_info[1]."</h4>
            <ul class=\"link_farm\">".nl);
          $found_i++;  //Nalezeno   
        }
        If($all_page_info[$i][0] != $open)  //Pokud neni tato stranka prave otevrena (bude odkazem)
          echo("<li>".mylink($all_page_info[$i][0])."</li>".nl);  //Vytvoreni odkazu
        Else  //Pokud je tato stranka otevrena (bude zvyraznena)
          echo("<li><strong>".$all_page_info[$i][1]."</strong></li>".nl);  //Vytvoreni odkazu
      }  
    }
    Else  //Pokud se NEjedna o hlavni stranku (v rootu) ale o zanorenou
    {
      If($all_page_info[$i][4][0] == $page_info[4][0] && !isset($all_page_info[$i][4][1]))  //Pokud je prave prochazena stranka "sousedni" a nema dalsi zanoreni
      {
        If(!$found_i)  //Pokud dosud nebylo nalezeno
        {
          $titulek = my_db_read_line("source/page.db", $page_info[4][0]);  //Nacteni informaci o hlavni nadrizene sekci
          echo("          <div class=\"box\">
            <h4>".$titulek[1]."</h4>
            <ul class=\"link_farm\">".nl);
          $found_i++;  //Nalezeno   
        }
        If($all_page_info[$i][0] != $open)  //Pokud neni tato stranka prave otevrena (bude odkazem)
          echo("            <li>".mylink($all_page_info[$i][0])."".nl);  //Vytvoreni odkazu
        Else  //Pokud je tato stranka otevrena (bude zvyraznena)
          echo("            <li><strong>".$all_page_info[$i][1]."</strong>".nl);  //Vytvoreni odkazu
        $found_j = 0;  //Nulovani pom. prom.  
        For($j = 0; $j < count($all_page_info); $j++)  //Cyklus projde vsechny stranky (hleda se "potomek")
        {
          If($all_page_info[$j][4][0] == $page_info[4][0] && isset($all_page_info[$j][4][1]) && $all_page_info[$i][0] == $all_page_info[$j][4][1] && ($all_page_info[$j][4][1] == $page_info[0] || $all_page_info[$j][4][1] == $page_info[4][1]))  //Pokud se potomek nasel (cesta zanoreni je shodna)
          {
            If(!$found_j)  //Pokud dosud nebylo nalezeno
            {
              echo("              <ul class=\"link_farm\">".nl);
              $found_j++;  //Nalezeno   
            }
            If($all_page_info[$j][0] != $open)  //Pokud neni tato stranka prave otevrena (bude odkazem)
              echo("                <li>".mylink($all_page_info[$j][0])."</li>".nl);  //Vytvoreni odkazu
            Else  //Pokud je tato stranka otevrena (bude zvyraznena)
              echo("                <li><strong>".$all_page_info[$j][2]."</strong></li>".nl);  //Vytvoreni odkazu
          }  
        }
        If($found_j)  //Pokud nalezeno
          echo("              </ul></li>".nl);
        Else
          echo("              </li>".nl);
      }  
    }
  }
  If($found_i)  //Pokud nalezeno
   echo("            </ul>
          </div>".nl);

?>
