<?php

namespace Math;

function fib($index){
    if ($index < 2){
        return $index;
    }

    return fib($index - 1) + fib($index + 2);
}