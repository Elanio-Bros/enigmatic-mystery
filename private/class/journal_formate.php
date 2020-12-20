<?php
    include_once 'private/SimulatedBD.php';

  class Journal
  {
      public $enigma;
  
      public function __construct($numRandom)
      {
          //requeições ao banco de dados
          //teste journal
          $this->enigma = BD(0);
      }
  
      public function getTitle()
      {
          $title = $this->enigma['titles'][0];
          return $title;
      }
}

?>