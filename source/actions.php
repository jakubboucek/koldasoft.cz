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
 
$action = getRequest('action');

switch($action) {
  case "sendform":
    include INCLUDE_PATH . "action.sendform.php";
    
  break;
}
  