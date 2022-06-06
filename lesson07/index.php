<?php
for ($i = 1; $i <= 9; $i++) {
    for ($j = 1; $j <= 9; $j++) {
        printf("%d*%d=%d\n", $i, $j, $i * $j);
    }
}
$emp = [
    '山田' => ['age' => '20', 'pref' => '東京'],
    '田中' => ['age' => '23', 'pref' => '神奈川'],
    '佐藤' => ['age' => '24', 'pref' => '埼玉'],
    '鈴木' => ['age' => '25', 'pref' => '千葉']
];

foreach ($emp as $emp_k => $emp_v) {
    printf("name:%s\nage:%s\npref:%s\n\n", $emp_k, $emp_v["age"], $emp_v["pref"]);
}

$arr = [];
for ($i = 1; $i <= 50; $i++) {
    if ($i % 3 == 0 || strstr((string)$i, "3")) {
        array_push($arr, $i);
    }
}
var_dump($arr);

foreach ($emp as $empk => $empv) {
    $name_pref[] = ["name" => $empk, "pref" => $empv["pref"]];
}
var_dump($name_pref);
