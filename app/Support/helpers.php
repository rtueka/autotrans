<?php

function date_plus($a, $b){
    $t1 = strtotime($a);
    $t2 = strtotime($b);
    $res = $t1 + $t2 - strtotime("00:00:00");
    return date('Y-m-d H:i:s',$res);
}
