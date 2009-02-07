<?php  //Domovska stranka

  define ('SYSTEM_ROOT', './');                                   //Cesta k rootu webu (z pohledu PHP)
  define ('INCLUDE_ROOT', SYSTEM_ROOT . 'source/');               //Cesta k adr. ve kterém je ukryt systém
  define ('CLASS_PATH', INCLUDE_ROOT . 'class/');                 //Cesta k adr. s třídami
  define ('INCLUDE_PATH', INCLUDE_ROOT . '');                     //Cesta k adr. s obecnými knihovnami systému
  define ('INCLUDE_SECTIONS_PATH', INCLUDE_ROOT . 'pages/');   //Cesta k adr. se stránkami
  define ('TEMPLATE_PATH', INCLUDE_ROOT . 'tmpls/');              //Cesta k adr. se šablonami
  define ('CONFIG_FILE', SYSTEM_ROOT . 'config.php');             //Soubor config.php 

  
  require_once(CONFIG_FILE);
  include INCLUDE_PATH . "init.php";  //Spouštění globálních inicializačních procesů
  include INCLUDE_PATH . "functions.php";  //Nacteni zakladnich funkci
  include INCLUDE_PATH . "my_db_functions.php";  //Nacteni zakladnich fci pro praci s databazi
  include INCLUDE_PATH . "create_page_info.php";  //Nacteni zakladnich fci pro praci s databazi

  //Domovska stranka - vlastni obsah
  echo('<'.'?xml version="1.0" encoding="utf-8"?'.'>'.nl);  //XML
  echo('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'.nl);  //DOCTYPE
  echo("<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"cs\" lang=\"cs\">
  <head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    <meta http-equiv=\"Content-language\" content=\"cs\" />
    <meta name=\"generator\" content=\"Human factor in PSPad [http://www.pspad.com/]\" />
    <meta name=\"author\" content=\"Koldasoft - snadná cesta k vlastnímu webu [http://www.koldasoft.cz/]; mailto:info@koldasoft.cz\" />
    <meta name=\"copyright\" content=\"&copy; 2007".(date('Y') > 2007 ? " - ".date('Y') : "")." Koldasoft, Všechna práva vyhrazena.\" />    
    <meta name=\"description\" content=\"Koldasoft - webdesign studio nabízející komplexní služby pro Vaše webové stránky.\" />
    <meta name=\"keywords\" content=\"Koldasoft, webdesign, webové stránky, internetové stránky\" />
    <title>".(isset($page_ph) ? "" : $page_name." | ")."Koldasoft".(isset($page_ph) ? " - ".$page_ph : "")."</title>
    <link rel=\"shortcut icon\" href=\"favicon.ico\" />
    <style type=\"text/css\" media=\"print\">
      @import \"".$cesta."pstyle.css\";
    </style>
    <style type=\"text/css\" media=\"screen\">
      @import \"".$cesta."style.css\";
    </style>
  </head>
  <body> 
    <div id=\"pre_header\" class=\"background\">
      <div class=\"page\">
        <div class=\"empty\"></div>
      </div>
    </div>  
    <div id=\"header\">
      <div class=\"page\">
        <a href=\"$cesta\" title=\"Koldasoft - snadná cesta k vlastnímu webu\"><img class=\"logo\" src=\"".$cesta."pictures/logo.png\" alt=\"Koldasoft - snadná cesta k vlastnímu webu\" width=\"190\" height=\"60\" /></a>
        <p class=\"hidden\">Koldasoft - snadná cesta k vlastnímu webu</p>
        <a id=\"skip_menu\" href=\"#middle\" title=\"Přeskočit na obsah\">Přeskočit na obsah</a>
      </div>  
    </div>  
    <hr />
    <div id=\"menu\" class=\"background\">
      <div class=\"page\">
        <h4>Hlavní nabídka</h4>
        <a".($open == "uvod" ? " class = \"active\"" : "")." href=\"$cesta\" title=\"Úvodní stránka\">Úvod</a><span class=\"hidden\"> | </span>
        ".mylink("nabidka-sluzeb", "Služby", "", "", (($open == "nabidka-sluzeb" || $page_info[4][0] == "nabidka-sluzeb") ? "active" : ""))."<span class=\"hidden\"> | </span>
        ".mylink("informace", "", "", "", (($open == "informace" || $page_info[4][0] == "informace") ? "active" : ""))."<span class=\"hidden\"> | </span>
        ".mylink("znalosti", "", "", "", (($open == "znalosti" || $page_info[4][0] == "znalosti") ? "active" : ""))."<span class=\"hidden\"> | </span>
        ".mylink("reference", "", "", "", (($open == "reference" || $page_info[4][0] == "reference") ? "active" : ""))."<span class=\"hidden\"> | </span>
        ".mylink("cenik", "", "", "", (($open == "cenik" || $page_info[4][0] == "cenik") ? "active" : ""))."<span class=\"hidden\"> | </span>
        ".mylink("o-nas", "", "", "", (($open == "o-nas" || $page_info[4][0] == "o-nas") ? "active" : ""))."<span class=\"hidden\"> | </span>
        ".mylink("kontakt", "", "", "", (($open == "kontakt" || $page_info[4][0] == "kontakt") ? "last active" : "last"))."
        <div class=\"cleaner\"></div>
      </div>
    </div>  
    <div id=\"navbar\" class=\"background\">
      <div class=\"page\">
        <h4>Nacházíte se zde</h4>
        <div class=\"mcontent\">
          <p><a href=\"$cesta\" title=\"Koldasoft - úvodní stránka\">Koldasoft</a> > ");
  include INCLUDE_PATH . "navbar.php";  //Nacteni navigacni listy, vytvoreni zanoreni 
  echo("        </div>
        <div class=\"cleaner\"></div> 
      </div>
    </div>  
    <hr />
    <div id=\"middle\" class=\"background\">
      <div class=\"page\">
        <div class=\"mcontent\">".nl);
  // Vlastni nacetni obsahu \\ 
  If(file_exists($page_source))  //Pokud extistuje stranka, ktera se ma otevrit
    include $page_source;  //Nacteni poazdovane stranky
  Else  //Pokud stranka neexistuje
    include INCLUDE_SECTIONS_PATH . "not-found.php";  //Nacteni chybove stranky 

  echo("        </div>
        <div class=\"panel\">
          <hr />".nl);
  include INCLUDE_PATH . "vertical_menu.php";  //Nacteni vertikalniho menu
  If($open != "kontakt")  //Pro vsechny krome kontaktu        
    echo("          <div class=\"box\">
            <h4>Rychlé kontakty</h4>
            <p><strong>E-mail:</strong> <a href=\"mailto:info@koldasoft.cz\" title=\"Poslat E-mail\">info@koldasoft.cz</a></p>
            <p><strong>Tel.:</strong> 724059012, 775770178</p>
            <p class=\"read_next\">".mylink("kontakt", "Další kontakty&hellip;")."</p>          
          </div>".nl);
  // Hledame externisty \\
  If($open != "job")  //Pro vsechny krome job (hledame externisty)        
    echo("          <div class=\"box\">
            <h4>Hledáme externisty</h4>
            <p>Do našeho týmu hledáme:</p>
            <ul>
              <li><strong>programátora</strong> PHP</li>
              <li><strong>grafika</strong></li>
            </ul>
            <p class=\"read_next\">".mylink("job", "Více informací&hellip;")."</p>          
          </div>".nl);
  If($open == "uvod")  //Pouze pro uvodni stranu
  { 
    echo("          <div class=\"box minireference\">
            <h4>Poslední reference</h4>
            <p>".mylink("reference", "<img src=\"".$cesta."reference/psa_170.png\" alt=\"Náhled: projekt Pro Sport Activities\" width=\"170\" height=\"170\" />", "ref_psa", "Pro Sport Activities")."</p>
            <p>Pro Sport Activities, 2008<br /><a href=\"http://www.pro-sport.cz/\" title=\"Přejít na stránky Pro Sport Activities\">www.pro-sport.cz</a></p>
            <p class=\"read_next\">".mylink("reference", "Další reference&hellip;")."</p>          
          </div>".nl);
/*    echo("          <div class=\"box\">
            <h4>O nás</h4>
            <p>Jsme mladý tým odborníků, který se zabývá prezentací na internetu. Chceme se podílet na vývoji, zlepšování a kultivaci prostředí českého i zahraničního internetu.</p>
            <p class=\"read_next\">".mylink("o-nas", "Více o nás&hellip;")."</p>          
          </div>".nl);*/
  }        
  echo("        </div> 
        <div class=\"cleaner\"></div>
        <div id=\"iniciala\"></div> 
      </div>
    </div>  
    <hr />
    <div id=\"footer\" class=\"background\">
      <div class=\"page\">
        <div class=\"main\">
          <p><span class=\"odr\">&copy; 2007".(date('Y') > 2007 ? " - ".date('Y') : "")." ".mylink("kontakt", "Koldasoft")."</span><span class=\"hidden\"> | </span><span class=\"odr full\">E-mail: <a href=\"mailto:info@koldasoft.cz\" title=\"Poslat E-mail\">info@koldasoft.cz</a></span><span class=\"hidden\"> | </span><span class=\"odr full\">Created by <a href=\"http://www.koldasoft.cz/\" title=\"Koldasoft - snadná cesta k vlastnímu webu\">Koldasoft</a></span> <span class=\"hidden\"> (www.koldasoft.cz)</span></p>
        </div>
        <div class=\"second\">
          <p>".mylink("mapa-webu")."</p>  
        </div> 
        <div class=\"cleaner\"></div> 
      </div>
    </div>
  <script src=\"http://www.google-analytics.com/ga.js\" type=\"text/javascript\"></script>
  <script src=\"/_gat/UA-5969628-1-UA-5969628-2-go.js\" type=\"text/javascript\"></script>
  </body>
</html>".nl);

?>
<?php

  unlink ("source/page.db");
  my_db_add_line("source/page.db", array("Page", "Full name",  "Short name", "Title", "Uroven"));

  my_db_add_line("source/page.db", array("uvod", "Úvod", "Úvod", "Title Úvodní stránka", "/"));
  my_db_add_line("source/page.db", array("nabidka-sluzeb", "Nabídka služeb", "Nabídka služeb", "Title Nabídka služeb", "/"));
  my_db_add_line("source/page.db", array("informace", "Informace", "Informace", "Title Info o firmě", "/"));
  my_db_add_line("source/page.db", array("znalosti", "Znalosti", "Znalosti", "Title Znalosti", "/"));
  my_db_add_line("source/page.db", array("reference", "Reference", "Reference", "Title Referenční práce", "/"));
  my_db_add_line("source/page.db", array("cenik", "Ceník", "Ceník", "Title Ceník práce", "/"));
  my_db_add_line("source/page.db", array("o-nas", "O nás", "O nás", "Title Informace o nás", "/"));
  my_db_add_line("source/page.db", array("kontakt", "Kontakt", "Kontakt", "Title Kontaktní informace", "/"));
  my_db_add_line("source/page.db", array("mapa-webu", "Mapa webu", "Mapa webu", "Title Mapa webu", "/"));

  //Nabidka sluzeb
  my_db_add_line("source/page.db", array("tvorba", "Tvorba webových stránek",  "Tvorba webových stránek", "Title Tvorba webových stránek", array("nabidka-sluzeb")));

  //Nabidka sluzeb/Tvorba webovych stranek
  my_db_add_line("source/page.db", array("optimalizace-pro-vyhledavace", "Optimalizace pro vyhledávače (SEO)", "Optimalizace pro vyhledávače", "Title Optimalizace pro vyhledávače (SEO)", array("nabidka-sluzeb", "tvorba")));
  my_db_add_line("source/page.db", array("registrace-do-katalogu", "Registrace do katalogů", "Registrace do katalogů", "Title Registrace do katalogů", array("nabidka-sluzeb", "tvorba")));
  my_db_add_line("source/page.db", array("domeny-hosting", "Domény a hosting", "Domény a hosting", "Title Domény a hosting", array("nabidka-sluzeb", "tvorba")));
  my_db_add_line("source/page.db", array("nasledna-sprava", "Následná správa webových stránek", "Následná správa", "Title Následná správa webových stránek", array("nabidka-sluzeb", "tvorba")));
  my_db_add_line("source/page.db", array("redesign", "Přepracování (redesign) webových stránek", "Přepracování (redesign)", "Title Přepracování (redesign) webových stránek", array("nabidka-sluzeb", "tvorba")));

  //Graficke prace
  my_db_add_line("source/page.db", array("graficke-prace", "Grafické práce", "Grafické práce", "Title Grafické práce", array("nabidka-sluzeb")));

  //Znalosti
  my_db_add_line("source/page.db", array("pouzitelnost-pristupnost", "Použitelnost a přístupnost webových stránek", "Použitelnost a přístupnost", "Title Použitelnost a přístupnost webových stránek", array("znalosti")));
  my_db_add_line("source/page.db", array("domeny", "Domény", "Domény", "Title Domény", array("znalosti")));
  my_db_add_line("source/page.db", array("hosting", "Hosting", "Hosting", "Title Hosting", array("znalosti")));
  my_db_add_line("source/page.db", array("metody-seo", "Metody optimalizace pro vyhledávače (SEO)", "Metody optimalizace pro vyhledávače (SEO)", "Title Metody optimalizace pro vyhledávače (SEO)", array("znalosti")));

  //Informace
  my_db_add_line("source/page.db", array("prubeh-tvorby", "Průběh tvorby webových stránek", "Průběh tvorby", "Title Průběh tvorby webových stránek", array("informace")));
  my_db_add_line("source/page.db", array("proc-mit-stranky", "Proč mít webové stránky?", "Proč mít webové stránky?", "Title Proč mít webové stránky?", array("informace")));
  my_db_add_line("source/page.db", array("proc-nechat-delat", "Proč si webové stránky nechat udělat?", "Proč si webové stránky nechat udělat?", "Title Proč si webové stránky nechat udělat?", array("informace")));
  my_db_add_line("source/page.db", array("co-si-pripravit", "Co si připravit před zahájením tvorby?", "Co si připravit (pro webové stránky)?", "Title Co si připravit (pro webové stránky)?", array("informace")));
  my_db_add_line("source/page.db", array("pozadavky-kvalitni-stranky", "Jak by měla vypadat kvalitní webová stránka?", "Kvalitní webová stránka", "Title Jak by měla vypadat kvalitní webová stránka?", array("informace")));
  my_db_add_line("source/page.db", array("naklady-na-provoz", "Jak je drahý provoz webových stránek?", "Náklady na provoz", "Title Jak je drahý provoz webových stránek?", array("informace")));
  my_db_add_line("source/page.db", array("vyhody-nevyhody", "Výhody a nevýhody webových stránek", "Výhody a nevýhody webových stránek", "Title Výhody a nevýhody webových stránek", array("informace")));
  my_db_add_line("source/page.db", array("slovnicek-pojmu", "Slovníček pojmů", "Slovníček pojmů", "Title Slovníček pojmů", array("informace")));
  my_db_add_line("source/page.db", array("faq", "Často kladené otázky a odpovědi (FAQ)", "Často kladené otázky a odpovědi (FAQ)", "Title Často kladené otázky a odpovědi (FAQ)", array("informace")));

  //Reference
  my_db_add_line("source/page.db", array("pro-sport-activities", "Pro Sport Activities", "P.S.A.", "Title Pro Sport Actvities", array("reference")));
  my_db_add_line("source/page.db", array("airnet", "Airnet Group o.s.", "Airnet", "Title Airnet Group o.s.", array("reference")));
  my_db_add_line("source/page.db", array("airnet-public", "ANG-Network - Public", "ANG-Network - Public", "Title ANG-Network - Public", array("reference")));
  my_db_add_line("source/page.db", array("airnet-interni", "ANG-Network - Interní web", "ANG-Network - Interní web", "Title ANG-Network - Interní web", array("reference")));
  my_db_add_line("source/page.db", array("airnet-hotspot", "ANG-Network - Hotspot", "ANG-Network - Hotspot", "Title ANG-Network - Hotspot", array("reference")));
  my_db_add_line("source/page.db", array("auta-mira", "Auta Míra", "Auta Míra", "Title Auta Míra", array("reference")));
  my_db_add_line("source/page.db", array("autoservis-sk", "Autoservis S+K", "Autoservis S+K", "Title Autoservis S+K", array("reference")));
  my_db_add_line("source/page.db", array("databaze-kupcu", "Databáze kupců", "Databáze kupců", "Title Databáze kupců", array("reference")));
  my_db_add_line("source/page.db", array("h-moda", "H-móda", "H-móda", "Title H-móda", array("reference")));
  my_db_add_line("source/page.db", array("hrackydomino", "Hračky Domino - eshop", "Hračky Domino - eshop", "Title Hračky Domino - eshop", array("reference")));
  my_db_add_line("source/page.db", array("hrackydomino-kasa", "Hračky Domino - pokladna", "Hračky Domino - pokladna", "Title Hračky Domino - pokladna", array("reference")));
  my_db_add_line("source/page.db", array("krtkuv-raj", "Krtkův ráj", "Krtkův ráj", "Title Krtkův ráj", array("reference")));
  my_db_add_line("source/page.db", array("krystal", "Krystal", "Krystal", "Title Krystal", array("reference")));
  my_db_add_line("source/page.db", array("lakikincl", "Fa. LAKI", "Fa. LAKI", "Title Fa. LAKI", array("reference")));
  my_db_add_line("source/page.db", array("mathis", "Mathis", "Mathis", "Title Mathis", array("reference")));
  my_db_add_line("source/page.db", array("nizozemsko-ceska-obchodni-komora", "Nizozemsko-česká obchodní komora", "Nizozemsko-česká obchodní komora", "Title Nizozemsko-česká obchodní komora", array("reference")));
  my_db_add_line("source/page.db", array("pdprojekce", "PDProjekce", "PDProjekce", "Title PDProjekce", array("reference")));
  my_db_add_line("source/page.db", array("plzenske-ohynky", "Plzeňské ohýnky", "Plzeňské ohýnky", "Title Plzeňské ohýnky", array("reference")));
  my_db_add_line("source/page.db", array("smsrealitni", "smsRealitni.cz", "smsRealitni.cz", "Title smsRealitni.cz", array("reference")));
  my_db_add_line("source/page.db", array("stemax", "Stemax", "Stemax", "Title Stemax", array("reference")));
  my_db_add_line("source/page.db", array("vrata-brany", "Vrata a brány", "Vrata a brány", "Title Vrata a brány", array("reference")));
  my_db_add_line("source/page.db", array("zdravotni-poradenstvi", "Zdravotní poradenství", "Zdravotní poradenství", "Title Zdravotní poradenství", array("reference")));
  //O nas
  my_db_add_line("source/page.db", array("nas-tym", "Náš tým", "Náš tým", "Title Náš tým", array("o-nas")));
  my_db_add_line("source/page.db", array("proc-zvolit-koldasoft", "Proč zvolit Koldasoft?", "Proč zvolit Koldasoft?", "Title Proč zvolit Koldasoft?", array("o-nas")));
  my_db_add_line("source/page.db", array("nase-znacka", "Naše značka", "Naše značka", "Title Naše značka", array("o-nas")));



?>