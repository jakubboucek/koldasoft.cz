<?php  //Kam-pujdem.cz

    echo(" <div class=\"text_box\">
              <div class=\"reference_text\">
                <h1>$page_name</h1>
                <p class=\"link\"><a href=\"http://www.kam-pujdem.cz/\" title=\"Přejít na stránky Kam-půjdem.cz\">www.kam-pujdem.cz</a></p>
                <p class=\"short\"><strong>Kompletní realizace</strong></p>
                <p class=\"long\">Portál &bdquo;kam-půjdem.cz&rdquo; má snahu zaregistrovat co nejvíce podniků z&nbsp;oblasti gastronomie a stát se tak ideálním pomocníkem při hledání vhodného místa pro různé společenské akce, jako jsou například služební obědy, posezení s&nbsp;přáteli nebo romantické večeře.</p>
                <p class=\"long\">Moderní vzhled portálu v&nbsp;příjemných barvách je doplněn o různé grafické prvky znázorňující vlastnosti podniků.</p>
                <p class=\"long\">Portál využívá technologii AJAX, díky níž je jeho ovládání velice snadné a efektivní.  Pro jistotu byl však vytvořen podrobný průvodce popisující kompletní ovládání portálu i bez funkčnosti této technologie.</p>
              </div>
              <div class=\"foto\">
                <p><a href=\"http://www.kam-pujdem.cz/\" title=\"Přejít na stránky Kam-půjdem.cz\"><img src=\"".$cesta."reference/kam_pujdem_detail.png\" alt=\"Náhled: projekt Kam-půjdem.cz\" height=\"310\" width=\"310\" /></a></p>
              </div>
            <div class=\"cleaner\"></div>
                <p>Pro návštěvníky portálu je zde také možnost registrace a následná správa vlastního profilu, do něhož si lze ukládat oblíbené podniky, udělovat komentáře a hodnotit podniky. Přihlášení uživatelé mohou také využít služeb zasílání denních menu a speciálních akcí podniku přímo na svůj e-mail.</p>
              <p>Mimo kompletní realizace portálu bylo součástí projektu také vytvoření jednotného grafického stylu a jeho využití při návrhu vizitek, hlavičkových papírů, reklamních letáčků a desek určených k&nbsp;uložení prezentačních materiálů a dotazníků vytvořených pro získávání informací při registracích podniků.</p>
              <h2>Fotogalerie</h2>
              <p>
              <a href=\"".$cesta."reference/kam_pujdem/vyhledavani_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/kam_pujdem/vyhledavani.png\" alt =\"Náhled: projekt Kam-půjdem.cz\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/kam_pujdem/seznam_podniku_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/kam_pujdem/seznam_podniku.png\" alt =\"Náhled: projekt Kam-půjdem.cz\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/kam_pujdem/detail_podniku_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/kam_pujdem/detail_podniku.png\" alt =\"Náhled: projekt Kam-půjdem.cz\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/kam_pujdem/denni_menu_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/kam_pujdem/denni_menu.png\" alt =\"Náhled: projekt Kam-půjdem.cz\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/kam_pujdem/komentare_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/kam_pujdem/komentare.png\" alt =\"Náhled: projekt Kam-půjdem.cz\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/kam_pujdem/kontakt_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/kam_pujdem/kontakt.png\" alt =\"Náhled: projekt Kam-půjdem.cz\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/kam_pujdem/pridat_podnik_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/kam_pujdem/pridat_podnik.png\" alt =\"Náhled: projekt Kam-půjdem.cz\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/kam_pujdem/o_projektu_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/kam_pujdem/o_projektu.png\" alt =\"Náhled: projekt Kam-půjdem.cz\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/kam_pujdem/profil_uzivatele_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/kam_pujdem/profil_uzivatele.png\" alt =\"Náhled: projekt Kam-půjdem.cz\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/kam_pujdem/sprava_podniku_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/kam_pujdem/sprava_podniku.png\" alt =\"Náhled: projekt Kam-půjdem.cz\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/kam_pujdem/editace_podniku_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/kam_pujdem/editace_podniku.png\" alt =\"Náhled: projekt Kam-půjdem.cz\" width=\"195\" height=\"195\" /></a>
              </p>
          <div class=\"float_box left mail\" id=\"contactform_float_box\">
            <p class=\"title\"><strong>Chtěli byste také podobné řešení?</strong></p>
");

if(!($form = App::getForm('contactform'))) 
  $form = new Form;

if($form->isError()) {              
  echo "
  <div class=\"errorbox\">Formulář nebyl odeslán, neboť došlo k těmto chybám:<ul><li>";              
  echo implode('</li><li>', $form->getErrors());              
  echo "</li></ul></div>";                          
}          
else {
  echo ("
            <p>Zaujal Vás tento projekt a rádi byte měli podobné řešení?</p>
            <p>Napište nám, zeptejte se a nebo si s námi rovnou sjednejte schůzku a rádi Vám na Vaše dotazy odpovíme.</p>
");         
 
}  
  //Zde prosím nastylovat formulář
echo ("     <div id=\"contactform_form_box\">
              <form action=\"./#contactform_float_box\" method=\"post\" >  
                <table class=\"formular\">
                  <tr><td colspan=\"2\"><input type=\"hidden\" name=\"action\" value=\"sendform\" /></td></tr>
                  <tr><td colspan=\"2\"><input type=\"hidden\" name=\"formid\" value=\"contactform\"/></td></tr>
                  <tr><td colspan=\"2\"><input type=\"hidden\" name=\"referer\" value=\"reference-pro-sport-activities\"/></td></tr>
                  <tr><td colspan=\"2\"><input type=\"hidden\" name=\"reference\" value=\"$page_name\"/></td></tr>
                  <tr><th colspan=\"2\">Předmět:</th></tr>
                  <tr><td colspan=\"2\"><input type=\"text\" name=\"subject\" size=\"40\" value=\"{$form->getHtml('subject')}\" /></td></tr>
                  <tr><th colspan=\"2\">Zpráva:</th></tr>
                  <tr><td colspan=\"2\"><textarea name=\"message\" cols=\"48\" rows=\"8\">{$form->getHtml('message')}</textarea></td></tr>
                  <tr><th colspan=\"2\">Jméno:</th></tr>
                  <tr><td colspan=\"2\"><input type=\"text\" name=\"name\" size=\"40\" value=\"{$form->getHtml('name')}\" /></td></tr>
                  <tr><th>E-mail:</th><th>Telefon:</th></tr>
                  <tr><td><input type=\"text\" name=\"mail\" size=\"29\" value=\"{$form->getHtml('mail')}\" /></td>
                  <td><input type=\"text\" name=\"phone\" size=\"28\" value=\"{$form->getHtml('phone')}\" /></td></tr>
                  <tr><th class=\"send\" colspan=\"2\"><input type=\"submit\" value=\"Odeslat\" /></th></tr>
                </table>
              </form>
            </div>
");

echo ("
            <div class=\"bottom\" id=\"contactform_form_more\"></div>
          </div>
            </div>
              ".nl);

if(!App::getForm('contactform') && !issetRequest('nohidecontactform')) :                 
?>
<script type="text/javascript">
// <![CDATA[
  var contactform = {
    float: document.getElementById('contactform_float_box'),
    form: document.getElementById('contactform_form_box'),
    more: document.getElementById('contactform_form_more')
  }
  
  contactform.float.className += " more";
  contactform.form.className += " hidden";
  contactform.more.innerHTML = "<p class=\"read_next\" ><a href=\"?nohidecontactform\" onclick=\"show_contactform();return false;\">zaslat dotaz</a></p>";
  //contactform.more.onclick = show_contactform;
  
  function show_contactform() {
    contactform.float.className = contactform.float.className.replace(/(^| )more( |$)/, '$2');
    contactform.form.className = contactform.form.className.replace(/(^| )hidden( |$)/, '$2');
    contactform.more.innerHTML = "";
    contactform.more.onclick = null;
  }
// ]]>
</script>
<?php
endif;