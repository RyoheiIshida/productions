<?php
$_GET["message"] = htmlspecialchars($_GET['message'], ENT_QUOTES, "UTF-8");
$message = $_GET['message'];
echo $message;
print_r($_GET);
