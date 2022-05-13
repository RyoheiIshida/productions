<?php
$rand_num = rand(1, 10);
echo $rand_num;
echo $rand_num % 2 == 0 ? "偶数\n" : "奇数\n";

$score = rand(0, 100);
echo $score;
switch ($score) {
    case $score <= 49:
        echo "不可\n";
        break;
    case $score <= 69;
        echo "可\n";
        break;
    case $score <= 79;
        echo "良\n";
        break;
    case $score <= 99;
        echo "優\n";
        break;
    default:
        echo "満点\n";
        break;
}

$math = rand(0, 100);
$eng = rand(0, 100);
//echo $math . " " . $eng . " ";  
echo "math:{$math} English:{$eng} ";
if ($math >= 60 && $eng >= 60) {
    echo "合格";
} elseif ($math + $eng >= 130) {
    echo "合格";
} elseif ($math + $eng >= 100 && ($math >= 90 || $eng >= 90)) {
    echo "合格";
} else {
    echo "不合格";
}
