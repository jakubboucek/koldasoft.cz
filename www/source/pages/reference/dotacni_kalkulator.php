<?php  //Dotacni kalkulator (ZOO a BZ mesta Plzne)

    echo(" <div class=\"text_box\">
              <div class=\"reference_text\">
                <h1>$page_name</h1>
                <p class=\"short\"><strong>Kompletní realizace</strong></p>
                <p class=\"long\">Tento projekt, realizovaný pro potřeby Zoologické a botanické zahrady města Plzně, zaměstnal spíše programátory našeho týmu.</p>
                <p class=\"long\">Jedná se o dotační kalkulátor, ve kterém se evidují všechny potřebné informace z&nbsp;provozu zoologické zahrady, jako jsou například spotřeby energií nebo přehled zvířat.</p>
                <p class=\"long\">Důraz projektu byl kladen na přehlednost dat a jednoduché ovládání. Celý systém skrývá mnoho variant pro zobrazení, lze zobrazit/skrýt každý box obsahující údaje, menu na levé i nápovědu na pravé straně, ale také hlavičku stránky.</p>
              </div>
              <div class=\"foto\">
                <p><a href=\"".$cesta."reference/dotacni_kalkulator/seznam_jedincu_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/zoo_detail.png\" alt=\"Náhled: projekt Dotační kalkulátor\" height=\"310\" width=\"310\" /></a></p>
              </div>
            <div class=\"cleaner\"></div>
              <p> Samozřejmostí tohoto interního systému je nutnost autorizace pomocí přihlášení a následná práce se systémem podle administrátorem přidělených práv.</p>
              <p>Jelikož systém uchovává důležitá data o provozu zoologické zahrady je také možné pracovat s&nbsp;údaji jiných roků, než je právě aktuální a získat tak rychle a snadno přehled o&nbsp;hospodaření Plzeňské ZOO.</p>
              <h2>Fotogalerie</h2>
              <p>
              <a href=\"".$cesta."reference/dotacni_kalkulator/seznam_druhu_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/dotacni_kalkulator/seznam_druhu.png\" alt =\"Náhled: projekt Dotační kalkulátor\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/dotacni_kalkulator/detail_druhu_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/dotacni_kalkulator/detail_druhu.png\" alt =\"Náhled: projekt Dotační kalkulátor\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/dotacni_kalkulator/editace_druhu_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/dotacni_kalkulator/editace_druhu.png\" alt =\"Náhled: projekt Dotační kalkulátor\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/dotacni_kalkulator/detail_jedince_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/dotacni_kalkulator/detail_jedince.png\" alt =\"Náhled: projekt Dotační kalkulátor\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/dotacni_kalkulator/prehledy_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/dotacni_kalkulator/prehledy.png\" alt =\"Náhled: projekt Dotační kalkulátor\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/dotacni_kalkulator/spotreba_energii_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/dotacni_kalkulator/spotreba_energii.png\" alt =\"Náhled: projekt Dotační kalkulátor\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/dotacni_kalkulator/spotreba_krmiv_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/dotacni_kalkulator/spotreba_krmiv.png\" alt =\"Náhled: projekt Dotační kalkulátor\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/dotacni_kalkulator/dotacni_tituly_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/dotacni_kalkulator/dotacni_tituly.png\" alt =\"Náhled: projekt Dotační kalkulátor\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/dotacni_kalkulator/login_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/dotacni_kalkulator/login.png\" alt =\"Náhled: projekt Dotační kalkulátor\" width=\"195\" height=\"195\" /></a>
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