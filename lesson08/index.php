<?php
#課題1
function tax($v = null){
    if ($v == null) {
        return "引数を入力してください\n";
    } elseif (!is_int($v)) {
        return "引数には数値を入力してください。\n";
    }
    return floor($v + $v * 10 / 100);
}

for ($i = 1; $i <= 10; $i++) {
    $r = rand(100, 1000);
    echo $r . " " . tax($r, 5);
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
