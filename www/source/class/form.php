<?php

class Form {
  private $values_post = array();
  private $errors = array();
  
  public function loadRequests($names) {
    if(is_array($names)){
      foreach($names as $key)
        $this->values_post[$key] = getRequest($key);
    }
    elseif(is_string($names) && strlen($names)) {
      $this->values_post[$names] = getRequest($names);
    }
  }
  
  //Vrací TRUE pokud jeden ze zaslaných prvků je NULL
  public function isEmpty($names) {
    if(is_array($names)){
      foreach($names as $item)
        if(empty($this->values_post[$item]))
          return TRUE;
    }
    elseif(empty($this->values_post[$names]))
      return TRUE;
    else
    return FALSE;
  }
  
  //Zapíše chybu
  public function addError($value) {
    $this->errors[] = $value;
  }
  
  public function isError() {
    return (bool) count($this->errors);
  }
  
  public function getErrors() {
    return $this->errors;
  }
  
  //Vrátí položku podlě klíče
  public function getField($key) {
    if(isset($this->values_post[$key]))
      return $this->values_post[$key];
    return NULL;
  }
  
  //Vrátí položku podlě klíče
  public function getHtml($key) {
    return htmlspecialchars($this->getField($key));
  }
  
  public function getFields($keys = NULL) {
    return $this->values_post;
  }
  
  public function getHtmls($keys = NULL) {
    return array_map('htmlspecialchars', $this->getFields($keys));
  }
  
}