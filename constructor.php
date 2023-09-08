<?php
class Fruit {
  public $name;
  public $color;

  function __construct($name) {
    print "entre a constructor de Fruit";
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}

$apple = new Fruit("Apple");
echo $apple->get_name();
?>