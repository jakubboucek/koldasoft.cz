<?php // stemax

          echo("
           <div class=\"text_box\">
              <div class=\"reference_text\">
                <h1>$page_name</h1>
                <p class=\"short\">Projekt nebyl spuštěn.</p>
                <p class=\"short\"><strong>Grafický návrh</strong>, červen&nbsp;2008</p>
                <p class=\"long\">Grafický návrh s&nbsp;tématikou pasivníc a nízkoenergetických domů. Důraz byl kladen na přehlednost a příjemně působící vzhled stránek. Grafický návrh také v&nbsp;oranžové barvě (náhled se připravuje).</p>
              </div>
              <div class=\"foto\">
                <p><a href=\"".$cesta."reference/stemax_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/stemax_detail.png\" alt=\"Náhled: projekt Stemax\" height=\"310\" width=\"310\" /></a></p>
              </div>
              <div class=\"cleaner\"></div>
              <h2>Fotogalerie</h2>
              <p><a href=\"".$cesta."reference/stemax/cerveny_original.png\" title=\"Zobrazit velký náhled\"><img src=\"".$cesta."reference/stemax/cerveny.png\" alt =\"Náhled: projekt Stemax\" width=\"195\" height=\"195\" /></a></p>
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