<?php

//Definice stavu aplikace
define('APP_STATUS_LIVE', 0); //Živý provoz 
define('APP_STATUS_DEV', 1);  //Vývojový (nejméně nebezpečný)
define('APP_STATUS_ALFA', 2);
define('APP_STATUS_BETA', 4);
define('APP_STATUS_RC', 8);   //Release Candidat


/// ZDE NASTAVTE stav aplikace (viz seznam výše) 

define('APP_STATUS', APP_STATUS_DEV); //Podle této kontanty aplikace rozpoznává své nasazení
//                   ^---- Konstanta stavu aplikace
 

//Soubor udržuje lokální připojovací informace, které se však mohou na různých provozech měnit

//Blokování přímého volání souboru
if(stripos($_SERVER['SCRIPT_FILENAME'], basename(__FILE__)) !== FALSE) {
  header('HTTP/1.x 403 Forbidden');
  header('Content-Type: text/plain; charset=utf-8');
  die("SECURITY ALERT: Přímý přístup k souboru zamítnut z bezpečnostních důvodů.");
}

//Nastavení cest
define('BASEPATH', '/');

//Nastavení mailů

//Připojení k DB

