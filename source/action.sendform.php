<?php

/**
 * Koldasoft webpage
 *
 * Copyright (c) 2007, 2009 Koldasoft, s.r.o. (http://koldasoft.cz/)
 *
 * @copyright  Copyright (c) 2007, 2009 Koldasoft, .s.r.o.
 * @link       http://koldasoft.cz/
 */


/** 
 * Soubor obsahuje zaváděcí procedury společné pro všechny stránky.
 * Jeho účelem je tvořit loader při využití některých služeb nabízených projektem
 */

$form = App::createForm(getRequest('formid'));

//Načtení proměnných
$form->loadRequests(split(',','name,mail,phone,message,subject,reference'));
 
//Otestování proměnných 
if($form->isEmpty(split(',','name')))
  $form->addError('Jméno musí být vyplněno!');

if($form->isEmpty('mail'))
  $form->addError('E-mail musí být vyplněn!');

if($form->isEmpty('message'))
  $form->addError('Text zprávy musí být vyplněn!');

if(!preg_match('/^.+@.+\..+$/',$form->getField('mail')))
  $form->addError('E-mail není platný!');

if((!$form->isEmpty('phone')) && !preg_match('#^[-0-9 /+()]+$#',$form->getField('phone')))
  $form->addError('Telefon není platný!');

if(!$form->isError()) {
  $mailer = new PHPMailer();
  
  $mailer->AddAddress('info@koldasoft.cz');
  
  $host = $_SERVER['HTTP_HOST'];
  $referer = $_SERVER['HTTP_REFERER'];
  
  $mailer->Subject = "Odeslaný formulář z webu $host";
  $mailer->Body = "Ze stránky $referer byl odeslán následující formulář:\n\n";
  
  foreach($form->getFields() as $fieldKey => $fieldValue)
    $mailer->Body .= "   $fieldKey: $fieldValue\n";
  
  $mailer->Body .= "\n-----------------------------------------------------\nOdesláno z IP: {$_SERVER['REMOTE_ADDR']} v " . date('d.m.Y H:i:s') . ".";
  
  if(!$mailer->Send())
    $form->addError('Při pokusu o odeslání zprávy došlo k technickému problému.');
  
  $mailer->ClearAddresses();
  $mailer->AddAddress(trim($form->getField('mail')));
  $mailer->Subject = "Potvrzení zaslání Vašeho dotazu společnosti Koldasoft, s.r.o.";
  
  $mailer->Body = "Dobrý den,
  děkujeme Vám za zaslání dotazu. Tímto potvrzujeme, že Váš požadavek byl předán do společnosti.
  
  Text Vašeho dotazu:
  {$form->getField('message')}
  
  Koldasoft, s.r.o.";

  if(!$mailer->Send())
    $form->addError('Při pokusu o odeslání potvrzení došlo k technickému problému.');
}

if(!$form->isError()) {
  header("Location: /odeslany-formular/", TRUE, 303);
}







