<?php
$arr=array();

#一人目
$Tanaka["info"]=array_merge(array("name"=>"田中","division"=>"1","age"=>"25"));
$Tanaka["skill"]["lang"]=array();
array_push($Tanaka["skill"]["lang"],"PHP","Ruby");
$Tanaka["skill"]["fw"]=array();
array_push($Tanaka["skill"]["fw"],"Laravel","CakePHP","Rails");
$Tanaka["description"]="バックエンドエンジニア";
array_push($arr,$Tanaka);

#二人目
$Yamada["info"]=array_merge(array("name"=>"山田","division"=>"2","age"=>"23"));
$Yamada["skill"]["lang"]=array();
array_push($Yamada["skill"]["lang"],"HTML","CSS","JS");
$Yamada["skill"]["fw"]=array();
array_push($Yamada["skill"]["fw"],"Vue.js");
$Yamada["description"]="フロントエンジニア";
array_push($arr,$Yamada);

#三人目
$Satou["info"]=array_merge(array("name"=>"佐藤","division"=>"2","age"=>"20"));
$Satou["skill"]["lang"]=array();
array_push($Satou["skill"]["lang"],"PHP");
$Satou["skill"]["fw"]=array();
$Satou["description"]="PHP初学者";
array_push($arr,$Satou);

var_dump($arr);
