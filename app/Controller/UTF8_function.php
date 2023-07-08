<?php

//this function helps avoiding utf8 encoding errors when returning the json, use it on the php array before json_encoding it!
    
    function utf8ize($d) {
        if (is_array($d)) {
            foreach ($d as $k => $v) {
                $d[$k] = utf8ize($v);
            }
        } else if (is_string ($d)) {
            return mb_convert_encoding($d, 'UTF-8', 'ISO-8859-1');
        }
        return $d;
    }