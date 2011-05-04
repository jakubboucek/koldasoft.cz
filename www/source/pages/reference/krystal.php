<?php // krystal

          echo("
            <div class=\"text_box\">
              <div class=\"reference_text\">
                <h1>$page_name</h1>
                <p class=\"link\"><a href=\"http://www.fa-krystal.cz/nase-sluzby/\" title=\"Přejít na stránky Krystal\">www.fa-krystal.cz</a></p>
                <p class=\"short\"><strong>Redesign, Kompletní realizace</strong></p>
                <p class=\"long\">Webové stránky středního rozsahu, poskytující informace o základní nabídce služeb, která je rozdělena na čtyři části oblasti působení.</p>
                <p class=\"long\">Cílem redesignu bylo maximalizovat prestiž firmy na internetu, čehož jsme dosáhli poutavým grafickým zpracováním a kvalitním technickým řešením.</p>
              </div>
              <div class=\"foto\">
                <p><a href=\"http://www.fa-krystal.cz/nase-sluzby/\" title=\"Přejít na stránky Krystal\"><img src=\"".$cesta."reference/fa-krystal_detail.png\" alt =\"Náhled: projekt Krystal\" width=\"310\" height=\"310\" /></a></p>
              </div>
              <div class=\"cleaner\"></div>
              <h2>Fotogalerie</h2>
              <p><a href=\"".$cesta."reference/krystal/cenik_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/krystal/cenik.png\" alt =\"Náhled: projekt Fa.Krystal\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/krystal/fotogalerie_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/krystal/fotogalerie.png\" alt =\"Náhled: projekt Fa.Krystal\" width=\"195\" height=\"195\" /></a>
              <a href=\"".$cesta."reference/krystal/kontakt_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/krystal/kontakt.png\" alt =\"Náhled: projekt Fa.Krystal\" width=\"195\" height=\"195\" /></a></p>
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