<?php
/*
@info To make tax-included price from non-included price.
@param int $value non-taxed price.
@return int tax-included price.
*/
function tax($value = null){
    if ($value == null) {
        return "引数を入力してください\n";
    } elseif (!is_int($value)) {
        return "引数には数値を入力してください。\n";
    }
    return floor($value + $value * 10 / 100);
}

for ($i = 1; $i <= 10; $i++) {
    $r = rand(100, 1000);
    echo $r . " " . tax($r);
    echo "\n";
}

echo tax();
echo tax("a");

#課題2
$emp_check = "a";
echo empty($emp_check) ? "OK\n" : "NG\n";
$emp_check = "";
echo empty($emp_check) ? "OK\n" : "NG\n";

#課題3
$arr_check = [1, 2, 3];
echo is_array($arr_check) ? "OK\n" : "NG\n";
$arr_check = 1;
echo is_array($arr_check) ? "OK\n" : "NG\n";
