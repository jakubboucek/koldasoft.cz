<?php  //prohlášení o přístupnosti

  echo("          <div class=\"text_box\">
            <h1>$page_name</h1>
          </div>  
          <div class=\"text_box\">
            <p>Tyto webové stránky byly připraveny s&nbsp;ohledem k&nbsp;přístupnosti a bezbariérovosti webu tak, aby splňovaly zásady přístupnosti podle metodik <a href=\"http://www.blindfriendly.cz/\" title=\"Přístupnost stránek pro nevidomé a slabozraké\">Blind Friendly Web</a>,  <a href=\"http://www.pristupnost.cz/wcag/\" title=\"Pravidla WCAG\">WCAG 1.0</a> a <a href=\"http://www.pravidla-pristupnosti.cz/\" title=\"Pravidla přístupného webu\">Pravidel tvorby přístupného webu</a>.</p>


          <div class=\"float_box question more\">
            <div class=\"title\"><strong>".mylink("pouzitelnost-pristupnost", "Co je přístupnost webu?", "pristupnost")."</strong></div>
            <p>Nevíte, co si představit pod pojmem přístupnost webové stránky? </p>
            <div class=\"bottom\"><p class=\"read_next\">".mylink("pouzitelnost-pristupnost", "Více informací o přístupnosti", "pristupnost")."</p></div>
          </div>  


            <p>Web je vytvořen podle specifikace <a href=\"http://www.w3.org/TR/xhtml1/\" title=\"Specifikace standardu XHTML 1.0\">XHTML&nbsp;1.0 Strict</a> a dodržuje syntaktickou a sémantickou správnost. Obsah je kompletně oddělen od stylu pomocí <a href=\"http://www.w3.org/TR/CSS21/\" title=\"Specifikace standardu CSS 2.1\">CSS</a>, díky tomu je možné web prezentovat na dalších výstupních zařízeních. Velikost písma je definovaná v&nbsp;relativních jednotkách, takže písmo se dá zvětšovat i zmenšovat pomocí nastavení prohlížeče.</p>
            <h2>Doporučená rozšíření prohlížeče</h2>
            <p>Ve <a href=\"http://cs.wikipedia.org/wiki/Portable_Document_Format\" title=\"Portable Document Format (přenosný formát dokumentu)\">formátu PDF</a> nabízíme některé doplňující informace, které jsou příliš rozsáhlé nebo graficky zpracované a je vhodné jejich stažení. Pro zobrazení těchto dokumentů je třeba mít nainstalovaný <a href=\"http://get.adobe.com/reader/\" title=\"Klepnutím stáhněte prohlížeč Adobe Reader\">prohlížeč Adobe Reader</a>, který je zdarma ke stažení na stránkách společnosti Adobe Systems, Inc..</p>
            <h2>Kontakt na správce webu</h2>
            <p>Vaše náměty, postřehy či informace o problémech se zobrazováním těchto stránek prosím zasílejte na adresu správce serveru <a href=\"mailto:info@koldasoft.cz\" title=\"Poslat e-mail na info@koldasoft.cz\">info@koldasoft.cz</a>. Využít můžete také ".(mylink("kontakt", "kontaktní formulář", "contactform_float_box")).".</p>
          </div>".nl);

?>
