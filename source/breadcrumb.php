<?php  //Nacteni navigacni listy, vytvoreni zanoreni 

  If($page_info[4] != "/")  //Pokud je stranka zanorena (tj. neni v rootu), bude se vytvaret zanoreni
  {
    
    For($i = 0; $i < count($page_info[4]); $i++)  //Cyklus projde cele zanoreni stranky
    {
      $zanoreni = my_db_read_line(INCLUDE_PATH."page.db", $page_info[4][$i]);  //Nacteni informaci o akt. prochazene strance zanoreni        
      echo("<span class=\"spacer\"><a href=\"".$cesta.$page_info[4][$i]."/\" title=\"$zanoreni[3]\">".$zanoreni[2]."</a></span><span class=\"hidden\"> &gt; </span>");  //Zobrazeni zanoreni vcetne odkazu
      $page_source .= $page_info[4][$i]."/";  //Pridani zanoreni do adresy stranky        
    }  
  }
  echo("<span class=\"spacer\"><strong>".$page_name."</strong></span></p>".nl);  //Aktualni stranka (neni odkazem)      
  $page_source .= $page_info[0].".php";  //Ukonceni adresy stranky
 
