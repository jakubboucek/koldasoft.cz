<?php  //Jak je drahy provoz webovych stranek

  echo("          <div class=\"text_box\">
            <h1>$page_name</h1>
            <p>Dnes není nic zadarmo a ani provoz webových stránek není výjimkou. Zajímá Vás, jaké poplatky a v jaké výši je třeba platit? Jak často?</p>
            <p>Platby lze rozdělit na jednorázové (prvotní) a opakované (provozní).</p>
          </div>  
          <div class=\"text_box\">
            <h2 id=\"prvotni-naklady\">Prvotní náklady</h2>
            <p>Mezi jednorázové platby řadíme cenu za vytvoření webových stránek, následné aktualizace a případné úpravy. Cena za tyto služby je individuální a liší se v závislosti na rozsahu a náročnosti práce.</p>
            <p class=\"read_next\">".mylink("cenik")."</p>
            <h2 id=\"opakovane-naklady\">Opakované náklady</h2>
            <p>Mezi opakované platby pak řadíme cenu za ".mylink("domeny-hosting", "hosting a doménu")." (pokud není zvolen freehosting, kdy je služba zdarma). Ceny se pohybují do 2000,- Kč s DPH za rok, v závislosti na rozsahu webu, požadovaných službách a technologiích.</p>
          </div>".nl);

?>
