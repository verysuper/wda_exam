<?php
    $array = array(0 => "a", 1 => "b", 2 => "c");
    print_r($array);
    echo '<br>';
    unset($array[1]);
    print_r($array);
    echo '<br>';
    $array=array_values($array);
    print_r($array);

    $array = array(0 => "a", 1 => "b", 2 => "c");
    array_splice($array, 1, 1);
    print_r($array);
?>
