<?php  //Kontakt

  echo("          <div class=\"text_box\">

          <div class=\"float_box tip more\">
            <p class=\"title\"><strong>".mylink("nas-tym", "Lidé v týmu")."</strong></p>
            <p>Hledáte někoho konkrétního? Potřebujete číslo nebo mailovou adresu? Rádi byste mluvili přímo s grafikem?</p>
            <div class=\"bottom\"><p class=\"read_next\">".mylink("nas-tym", "Koukněte na náš tým")."</p></div>
          </div>  


            <h1>$page_name</h1>
            <p>Fakturační a kontaktní údaje obchodní společnosti Koldasoft,&nbsp;s.r.o.</p>  
          </div>
          
            
          <div class=\"text_box\">
            <h2>Koldasoft,&nbsp;s.r.o.</h2>
            <p>sady&nbsp;Pětatřicátníků&nbsp;48/33 (<a href=\"http://www.mapy.cz/#x=130647296@y=134780992@z=14@mm=ZP@sa=s@st=s@ssq=sady%20P%C4%9Btat%C5%99ic%C3%A1tn%C3%ADk%C5%AF%2048/33,%20Plze%C5%88@sss=1@ssp=130642112_134773584_130671232_134798656\" title=\"Najít adresu na Mapy.cz\">mapa</a>)</p>
            <p>301&nbsp;00 Plzeň &ndash; Jižní Předměstí</p>
            <p><strong>IČ:</strong> <a href=\"http://www.rzp.cz/cgi-bin/aps_cacheWEB.sh?Action=Search&amp;VSS_SERV=ZVWSBJFND&amp;ICO=28009703\" title=\"Zobrazit výpis ze živnostenského rejstříku\">28009703</a>
            <p><strong>DIČ:</strong> <a href=\"http://adisreg.mfcr.cz/adistc/DphReg?ZPRAC=RDPHI1&amp;id=1&amp;pocet=1&amp;fu=&amp;dic=28009703&amp;OK=+Hledej+\" title=\"Zobrazit výpis z rejstříku pláctů DPH\">CZ28009703</a>, jsme plátci DPH</p>
            <p><strong>č.ú.:</strong> 43-1580080207/0100 (KB)</p>
            <p><strong>IBAN:</strong> CZ4501000000431580080207</p>
            <p>Obchodní společnost s ručením omezeným je zapsána u Krajského soudu v Plzni,<br />oddíl&nbsp;C, vložka&nbsp;21277 (<a href=\"http://wwwinfo.mfcr.cz/cgi-bin/ares/ares_es.cgi?jazyk=cz&amp;ico=28009703&amp;cestina=cestina&amp;maxpoc=200&amp;setrid=ZADNE&amp;xml=1\" title=\"Zobrazit výpis z obchodního rejstříku\">ARES</a>).</p>
            
            <img style=\"float: right;\" src=\"".$cesta."pictures/img.png\" alt=\"foto magnum\" width=\"200\" height=\"150\" />
            
            <h3>Pobočka Pardubice</h3>
            <p>třída&nbsp;Míru&nbsp;2800 (<a href=\"http://www.mapy.cz/#x=136163648@y=135773312@z=14@mm=ZP@ax=136165888@ay=135774592@at=Pal%C3%A1c%20Magnum@ad=Koldasoft,%20s.r.o\" title=\"Najít adresu na Mapy.cz\">mapa</a>)</p>
            <p>530&nbsp;02 Pardubice &ndash; Zelené Předměstí</p>
            <p>Budova MAGNUM, 6. patro</p>
            <h3>Další kontaktní informace</h3>
            <p><strong>Telefon:</strong> 775&nbsp;77&nbsp;15&nbsp;00&nbsp;(".mylink("nas-tym", "Jiří Kolařík", "kolda", "Jiří Kolařík").", ředitel) a 775&nbsp;77&nbsp;15&nbsp;10&nbsp;(".mylink("nas-tym", "Lucie Brandýská", "lucka", "Lucie Brandýská").", asistentka)</p>
            <p><strong>E-mail:</strong> <a href=\"mailto:info@koldasoft.cz\" title=\"Poslat E-mail\">info@koldasoft.cz</a></p>
            <p>Webové stránky: <a href=\"http://www.koldasoft.cz/\" title=\"Přejít na webové stránky společnosti Koldasoft, s.r.o.\">www.koldasoft.cz</a></p>
            <p>Neváhejte také kontaktovat kohokoliv z&nbsp;".mylink("nas-tym", "našeho týmu").".</p>
            <h3></h3>

          <div class=\"float_box left mail more\" id=\"contactform_float_box\">
            <p class=\"title\"><strong>Kontaktní formulář, aneb napište nám</strong></p>
            <p>Chcete si domluvit nezávaznou schůzku? Rádi byste kalkulaci projektu? Nebo si jen potřebujete promluvit s&nbsp;někým, kdo Vám bude rozumět?</p>
            <p>Neváhejte se na nás obrátit v&nbsp;jakékoliv záležitosti. Rádi Vám odpovíme a poradíme.</p>
");          
  if($form = App::getForm('contactform')) {            
    if($form->isError()) {              
      echo "
      <div class=\"errorbox\">Formulář nebyl odeslán, protože došlo k těmto chybám:<ul><li>";              
      echo implode('</li><li>', $form->getErrors());              
      echo "</li></ul></div>";                          
    }          
  }
  else
    $form = new Form;
  
  //Zde prosím nastylovat formulář
echo ("     <div id=\"contactform_form_box\">
              <form action=\"\" method=\"post\" />  
                <table class=\"formular\">
                  <tr><td colspan=\"2\"><input type=\"hidden\" name=\"action\" value=\"sendform\" /></td></tr>
                  <tr><td colspan=\"2\"><input type=\"hidden\" name=\"formid\" value=\"contactform\"/></td></tr>
                  <tr><th colspan=\"2\">Předmět:</th></tr>
                  <tr><td colspan=\"2\"><input type=\"input\" name=\"subject\" size=\"30\" value=\"{$form->getHtml('subject')}\" /></td></tr>
                  <tr><th colspan=\"2\">Zpráva:</th></tr>
                  <tr><td colspan=\"2\"><textarea name=\"message\" cols=\"40\" rows=\"8\">{$form->getHtml('message')}</textarea></td></tr>
                  <tr><th colspan=\"2\">Jméno:</th></tr>
                  <tr><td colspan=\"2\"><input type=\"input\" name=\"name\" size=\"49\" value=\"{$form->getHtml('name')}\" /></td></tr>
                  <tr><th>E-mail:</th><th>Telefon:</th></tr>
                  <tr><td><input type=\"input\" name=\"mail\" size=\"20\" value=\"{$form->getHtml('mail')}\" /></td>
                  <td><input type=\"input\" name=\"phone\" size=\"20\" value=\"{$form->getHtml('phone')}\" /></td></tr>
                  <tr><th colspan=\"2\"><input type=\"submit\" value=\"Odeslat\" /></th></tr>
                </table>
              </form>
            </div>
            <div class=\"bottom\"><p class=\"read_next fakelink\" id=\"contactform_form_box\"><span class=\"\">zaslat dotaz</span></p></div>
          </div>  
          </div>  
          <div class=\"text_box\">            
          <div class=\"cleaner\"></div>
          </div>".nl);
//if(!                 
?>
<script type="text/javascript">
  
</script>