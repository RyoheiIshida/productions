<?php
function getDb():PDO{
    $dsn = 'mysql:dbname=mzn;host=mzn_db;port=3306';
    $user = 'user';
    $password = 'pass';
    try{
        $dbh = new PDO($dsn, $user, $password);
    }catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }
    return $dbh;   
}

function sql_exec($dbh,$str):object{
    $s=$dbh->prepare($str);
    $s->execute();

    return $s;
}