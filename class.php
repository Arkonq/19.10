<?php

class Person{

    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    function getName(){
        return $this->name;
    }

    function setName($name){
        $this->name = $name;
        return $this;
    }

}