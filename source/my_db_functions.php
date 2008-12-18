<?php  //soubor zakladnich funkci pracujicich s databazi

  define('nl', "\n");  //definovani ukonceni radky

  function my_db_open($database, $rezim)  //fce otevre pozadovanou databazi v rezimu
  {
    global $db_file;  //globalni promenne
    If(@$db_file = fopen($database, $rezim))  //pokud se dana databaze podari otevrit
      return(1);  //databaze se podarila otevrit
    Else
      return(0);  //databaze se nepodarila otevrit
  }

  function my_db_close()  //fce uzavre otevrenou databazi(databaze, ketra se ma uzavrit musi byt otevrena!)
  {
    global $db_file;  //globalni promenne
    If(fclose($db_file))  //pokud se databazi podari uzavrit
      return(1);  //databaze se podarila uzavrit
    Else
      return(0);  //databaze se nepodarila uzavrit
  }

  function my_db_read_line($database, $key)  //fce vraci pole. Bud nadpisoveho radku, nebo vyhleda podle klice prislusne pole a vrati jej
  {
    global $db_file;  //globalni promenne
    If(my_db_open($database, 'r'))  //otevreni databaze pro cteni
    {
      If($key == "read_header" || $key == "read_lastline")  //Pokud chceme vratit bud prvni(nadpisovy) nebo posledni radek
      {
        If($key == "read_header")  //Pokud chceme vratit prvni(nadpisovy) radek
        {
          $line = fgets($db_file, 1000);
          my_db_close();  //uzavreni otevrene databaze
          return(unserialize(trim($line)));  //Navratova hodnota je pole unserializovane z nactene 0-te radky ze souboru
        }
        Else  //pokud chceme vratit posledni radek z databaze
        {
          while(!feof($db_file))  //cyklus - projede cely soubor do konce
            $line = fgets($db_file, 1000);  //nacte radku
          my_db_close();  //uzavreni otevrene databaze
          return(unserialize(trim($line)));  //posledni radku unserializuje a vrati
        }
      }
      If(is_string($key))  //Pokud je $key retezec - chceme najit a vratit pole s prislusnym klicem
      {
        while(!feof($db_file))  //cyklus - projede cely soubor do konce
        {
          $line = unserialize(trim(fgets($db_file, 1000)));  //nacte ze souboru radku, odstrani konec radky a unserializuje ji, ulozi do pole $line[]
          If($line[0] == $key)  //Pokud je klic akt. pole shodny s hledanym klicem
          {
            my_db_close();  //uzavreni otevrene databaze
            return($line);  //navratova hodnota je pole s hledanym klicem
          }
        }
        return(0);  //Pokud nebyl dany klic nalezen
      }
    }
    Else  //databazi se nepodarilo otevrit
      return(0);  //neuspesne otevreno
  }

  function my_db_read_all($database)  //fce vraci 2D pole vytvorene z databaze $database
  {
    global $db_file;  //globalni promenne
    If(my_db_open($database, 'r'))  //otevreni databaze pro cteni
    {
      $i = 0;  //nulovani promenne
      fgets($db_file, 1000);  //Vynechani prvni radky databaze
      while(!feof($db_file))  //cyklus - projede cely soubor do konce
      {
        $pole[$i] = unserialize(trim(fgets($db_file, 1000)));  //nacte ze souboru radku, odstrani konec radky a unserializuje ji, ulozi do pole $pole[$i], kde $i je cislo radku
        $i++;  //inkrementace radku
      }
      my_db_close();  //uzavreni databaze
      return($pole);  //navratova hodnota je 2D pole
    }
    Else  //databazi se nepodarilo otevrit
      return(0);  //neuspesne otevreno
  }

  function my_db_create($database, $pole)  //fce vytvori, popr. prepise databazi z pole $pole[]
  {
    global $db_file;  //globalni promenne
    If(my_db_open($database, 'w'))  //otevreni databaze pro zapis - puvodni soubor bude odstranen a prepsan!!!
    {
      If(!is_array($pole[0]))  //zjisteni, pokud je vstupni pole pouze jednorozmerne
      {
        fputs($db_file, serialize($pole));  //zapise prvni radku do noveho pole
        my_db_close();  //uzavreni databaze
        return(1);  //navratova hodnota - zapis uspesny
      }
      For($i = 0; $i < (count($pole) - 1); $i++)  //cyklus projde cele pole(krome posledni radky)
        fputs($db_file, serialize($pole[$i]).nl);  //zapise do souboru na radku serializovanou radku pole[] a ukonci radku
      fputs($db_file, serialize($pole[$i]));  //zapise posledni radku pole, bez ukonceni radky
      my_db_close();  //uzavreni databaze
      return(1);  //navratova hodnota - zapis uspesny
    }
    Else  //databazi se nepodarilo otevrit
      return(0);  //neuspesne otevreno
  }

  function my_db_add_line($database, $pole)  //fce zapise do $database posledni radku s obsahem $pole[] pokud radka s timto obsahem jiz zapsana
  {
    If(!$old_last_line = my_db_read_lastline($database))  //nacteni posledni radky z databaze, pokud nelze nacist, vytvori novou databazi
    {
      If(my_db_create($database, $pole))  //vytvoreni nove databaze
        return(1);  //databaze vytvorena
      Else  //nepodarilo se vytvorit novou databazi
        return(0);  //databaze nybla vytvorena
    }
    If($old_last_line != $pole)  //pokud neni puvodni pole nactene z databaze shodne s tim, co se ma zapsat
    {
      global $db_file;  //globalni promenne
      If(my_db_open($database, 'a'))  //otevreni databaze pro pridani na konec
      {
        fputs($db_file, nl.serialize($pole));  //na konec souboru dalsi radku
        my_db_close();  //uzavreni databaze
        return(1);  //navratova hodnota - zapis uspesny
      }
      Else  //databazi se nepodarilo otevrit
        return(0);  //neuspesne otevreno
    }
    return(1);  //pokud je tato rada jiz zapsana
  }

  function my_db_del_all($database)  //fce smaze celou databazi
  {
    If(file_exists($database))  //pokud dana databaze existuje
    {
      If(unlink($database))  //pokud se podarilo dany soubor smazat
        return(1);  //smazano
      Else
        return(0);  //nepodarilo se soubor smazat
    }
    Else
      return(1);  //soubor neexistuje, ale je tudiz smazan
  }

  function my_db_change_line($database, $key, $pole)  //fce zmeni obsah radky s klicem $key za novy $pole, popr. tuto radku odstrani uplne
  {
    If($old_pole = my_db_read_all($database))  //nacteni cele databaze do pole
    {
      If($old_header = my_db_read_header($database))  //nacteni prvni radky z databaze
      {
        If(my_db_del_all($database))  //smazani puvodni databaze
        {
          If(my_db_add_line($database, ($key == "change_header" ? $pole : $old_header)))  //zapsani prvni radky do nove databaze
          {
            For($i = 0; $i < count($old_pole); $i++)  //projde cele ziskane pole $old_pole
            {
              If($key == "change_header" || $old_pole[$i][0] != $key)  //pokud je klic celociselny(uprava hlavicky) nebo klic na akt. radce puvodniho pole neni shodny s hledanym
              {
                If(!my_db_add_line($database, $old_pole[$i]))  //zapsani puvodni radky zpet do databaze
                  return(0);  //nepodarilo se radku zapsat
              }
              Else  //klic na akt. radce je hledanym klicem
              {
                If(is_array($pole))  //pokud je zadano pole
                {
                  If(!my_db_add_line($database, $pole))  //zapsani nove radky(zmena) do databaze
                    return(0);  //nepodarilo se radku zapsat
                }
              }
            }
            return(1);  //zmena probehla v poradku
          }
          Else
            return(0);  //nezdarilo se zapsat prvni radku do database
        }
        Else
          return(0);  //databaze se nepodarila smazat
      }
    }
    Else  //databaze se nepodarila otevrit a nacist do pole
      return(0);  //nepodarilo se nacteni databaze
  }

  function my_db_read_header($database)  //fce precte a vrati pole z hlavicky dane databaze
  {
    return(my_db_read_line($database, "read_header"));  //volani fce se specifickym paramatrem
  }

  function my_db_change_header($database, $pole)  //fce zmeni hlavicku dane databaze
  {
    return(my_db_change_line($database, "change_header", $pole));  //volani fce se specifickym paramatrem
  }

  function my_db_del_line($database, $key)  //fce odstrani radku oznacenou identifikatorem
  {
    return(my_db_change_line($database, $key, 0));  //volani fce se specifickym paramatrem
  }

  function my_db_createH($database, $header, $body)  //fce vytvori novou databazi se zadanou hlavickou a obsahem
  {
    $pole[0] = $header;  //umisteni hlavicky
    For($i = 1; $i <= count($body); $i++)
      $pole[$i] = $body[$i - 1];  //vlozeni obsahu
    my_db_create($database, $pole);  //vytvoreni vlastni databaze
  }

  function my_db_read_lastline($database)  //fce precte a vrati posledni radku z dane databaze
  {
    return(my_db_read_line($database, "read_lastline"));  //volani fce se specifickym paramatrem
  }


?>
