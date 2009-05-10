<?php

//Zaslání hlaviček tvářácách se jako JS + zapnuté cachování
header('Cache-Control: max-age=604800, public');
header('Content-Type: text/javascript');

//Načtení vstupu
$uri = $_SERVER['REQUEST_URI'];
$matches = array();
$tracker = NULL;
$stdtracker = NULL;
$newtracker = NULL;
$timebreakpoint = mktime(0, 0, 0, 1, 1, 2009);
$params = array();

//Parsování URL
if(preg_match('#/(UA-[0-9]+-[0-9]+)?(?:-(UA-[0-9]+-[0-9]+)?)?(?:-([^/]*))?\.js$#', $uri, $matches)) {
  if(isset($matches[1]))
    $stdtracker = $matches[1];
  if(isset($matches[2]))
    $newtracker = $matches[2];
  if(isset($matches[3]))
    $params = array_filter(explode('-', $matches[3]));
}

$tracker = ($newtracker && (time() >= $timebreakpoint)) ? $newtracker : $stdtracker;


?>
//-- Set params for Google Analytics (c) Koldasoft, s.r.o (originaly from H1 s.r.o.)
//-- v0.9.3-breakingpoint

//-- Standard tracker: <?php echo ($stdtracker ? $stdtracker : '--nothing--'); ?>

//-- New tracker: <?php echo ($newtracker ? $newtracker : '--nothing--'); ?>

//-- Used tracker: <?php echo ($tracker ? $tracker : '--nothing--'); ?>

//-- Params:  <?php echo (count($params) ? implode(', ', $params) : '--nothing--');?>


<?php
  if($tracker)
    echo "var pageTracker = _gat._getTracker(\"$tracker\");\n";
?>

pageTracker._setAllowHash(false);
pageTracker._setAllowAnchor(true);
pageTracker._clearOrganic();

// Set Organics
pageTracker._addOrganic("seznamzbozi.cz", "st");
pageTracker._addOrganic("hledejceny.cz", "search");
pageTracker._addOrganic("zalevno.cz", "q");
pageTracker._addOrganic("shopy.cz", "s");
pageTracker._addOrganic("srovname.cz", "hledat");
pageTracker._addOrganic("nejlepsiceny.cz", "t");
pageTracker._addOrganic("nejnakup.cz", "q");
pageTracker._addOrganic("naakup.cz", "hledat");
pageTracker._addOrganic("mojse.cz", "search_text");
pageTracker._addOrganic("levnenakupy.cz", "searchword");
pageTracker._addOrganic("cenyzbozi.cz", "q");
pageTracker._addOrganic("dobra-koupe.cz", "searchtext");
pageTracker._addOrganic("eshop-katalog.cz", "hledej");
pageTracker._addOrganic("heureka.cz", "h[fraze]");
pageTracker._addOrganic("hledam-zbozi.cz", "q");
pageTracker._addOrganic("koupis.cz", "q");
pageTracker._addOrganic("lepsiceny.cz", "q");
pageTracker._addOrganic("b2bc.cz", "XSearching");
pageTracker._addOrganic("zbozi.cz", "q");
pageTracker._addOrganic("akcni-cena.cz", "search");
pageTracker._addOrganic("najisto.cz", "what");

pageTracker._addOrganic("google", "q");
pageTracker._addOrganic("seznam", "q");
pageTracker._addOrganic("seznam", "w");
pageTracker._addOrganic("centrum", "q");
pageTracker._addOrganic("atlas", "q");
pageTracker._addOrganic("volny", "search");
pageTracker._addOrganic("jyxo.1188.cz", "q");
pageTracker._addOrganic("1188.cz", "q");
pageTracker._addOrganic("jyxo.cz", "q");
pageTracker._addOrganic("tiscali.cz", "query");
pageTracker._addOrganic("zoohoo.cz", "q");
pageTracker._addOrganic("mapy.cz", "ssq");
pageTracker._addOrganic("1.cz", "q");
pageTracker._addOrganic("najdi.si", "q");

// Init
pageTracker._initData();

<?php
  if(in_array('go', $params))
    echo "
// Go it
pageTracker._trackPageview();
";
?>