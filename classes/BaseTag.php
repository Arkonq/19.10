<?php

namespace kl\PHP;

use kl\PHP\Tag\Body;
use kl\PHP\Tag\Name;
use kl\PHP\Tag\Attributes;

abstract class BaseTag {
    protected $name;
    protected $attributes;
    protected $body;

    public function __construct(string $name){

        $this->name = new Name($name);
        $this->attributes = new Attributes();
        $this->body = new Body();
    }

    function name(): Name{
        return $this->name;
    }

    function attributes():Attributes{
        return $this->attributes;
    }

    function setAttr(string $key, $value){
        $this->attributes()->set($key, $value);
        return $this;
    }

    function prependAttr(string $key, $value){
        $this->attributes()->prepend($key, $value);
        return $this;
    }


    function appendAttr(string $key, $value){
        $this->attributes()->append($key, $value);
        return $this;
    }


    function isSelfClosing(){
        return $this->name()->isSelfClosing();
    }

    function body(): Body{
        return $this->body;
    }

    function appendBody($value){
        $this->body()->append($value);
        return $this;
    }

    function prependBody($value){
        $this->body()->prepend($value);
        return $this;
    }

    function appendTo(BaseTag $tag){
        $tag->appendBody($this);
        return $this;
    }

    function prependTo(BaseTag $tag){
        $tag->appendBody($this);
        return $this;
    }

    function __call(string $name, array $arguments){
        return $this->setAttr($name, ... $arguments);
    }

    function __set($name, $value){
        $this->setAttr($name, $value);
    }

    function toString(){
        $tag = "<{$this->name()}{$this->attributes()}";

        if ($this->isSelfClosing())
            $tag .= '/>';
        else
            $tag .= ">{$this->body()}</{$this->name()}";

        return $tag;
    }

    function __toString()
    {
        return $this->toString();
    }
}