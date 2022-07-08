<?php

/*
* @info make htmlspecialchars string
* @param string $str string from $_GET
* @return string $str string throw htmlspecialchars
*/
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

echo h($_GET['message']).'<br>';

if ($_GET['hoby'] !== NULL) {
    foreach ($_GET['hoby'] as $hoby_name) {
        echo h($hoby_name).'<br>';
    }
}
