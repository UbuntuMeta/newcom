<?php

function existParam($param , $key) {
    if (isset($param[$key]) && !$param[$key]) {
        return true;
    } else {
        return false;
    }
}

$param = array('user' => 223);

var_dump(existParam($param, 'func'));