<?php

class App {
  static private $forms = array();
  
  //Vytvoření nového formuláře
  static public function createForm($id=NULL) {
    $newform = new Form();
    self::appendForm($newform, $id);
    return $newform;
  }
  
  static public function appendForm($form, $id=NULL) {
    if(empty($id))
      self::$forms[] = $form;
    else
      self::$forms[$id] = $form;
  } 
  
  static public function getForm($id=NULL) {
    if(empty($id))
      return next(self::$forms);
    elseif(isset(self::$forms[$id]))
      return self::$forms[$id];
    return NULL;
  }
}