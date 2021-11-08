<?php

$arr1 = ['1a' => 'aa1', '1b' => 'aa2'];
$arr2 = ['2a' => 'bb1', '2b' => 'bb2'];

$arr3 = array_combine($arr1, $arr2);

var_dump($arr3);