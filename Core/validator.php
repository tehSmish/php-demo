<?php

namespace Core;

class Validator{

    public static function string($val, $min = 1, $max = INF){

        $val = trim($val);

        return strlen($val) >= $min && strlen($val) <= $max;
    }

    public static function email($val){

        return filter_var($val, FILTER_VALIDATE_EMAIL);
    }
}