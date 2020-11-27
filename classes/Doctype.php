<?php

namespace kl\PHP;

class Doctype
{
    public static function get($type){
        return "<!DOCTYPE " . $type . ">";
    }
}