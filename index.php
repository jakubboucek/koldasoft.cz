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
    <meta http-equiv=\"cache-control\" content=\"no-cache, must-revalidate, no-store\" />
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
        <div class=\"main\">
          <p><a href=\"$cesta\" title=\"Koldasoft - úvodní stránka\">Koldasoft</a> > ");
  include INCLUDE_PATH . "navbar.php";  //Nacteni navigacni listy, vytvoreni zanoreni 
  echo("        </div>
        <div class=\"cleaner\"></div> 
      </div>
    </div>  
    <hr />
    <div id=\"middle\" class=\"background\">
      <div class=\"page\">
        <div class=\"main\">".nl);         
  // Vlastni nacetni obsahu \\ 
  If(file_exists($page_source))  //Pokud extistuje stranka, ktera se ma otevrit
    include $page_source;  //Nacteni poazdovane stranky
  Else  //Pokud stranka neexistuje
    include INCLUDE_SECTIONS_PATH . "not-found.php";  //Nacteni chybove stranky 

  echo("        </div>
        <div class=\"second\">
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
              <li><strong>kodéra</strong> (X)HTML a CSS</li>
              <li><strong>grafika</strong></li>
            </ul>
            <p class=\"read_next\">".mylink("job", "Více informací&hellip;")."</p>          
          </div>".nl);
  If($open == "uvod")  //Pouze pro uvodni stranu
  { 
    echo("          <div class=\"box minireference\">
            <h4>Poslední reference</h4>
            <p>".mylink("reference", "<img src=\"".$cesta."reference/hok_170.png\" alt=\"Náhled: projekt Nizozemsko-česká obchodní komora\" width=\"170\" height=\"170\" />", "ref_hok", "Nizozemsko-česká obchodní komora")."</p>
            <p>Nizozemsko-česká obchodní komora, 2008, <a href=\"http://www.nccc.cz/\" title=\"Přejít na stránky Nizozemsko-české obchodní komory\">www.nccc.cz</a></p>
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
