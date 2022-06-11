<?php
function getDb($dbname):PDO{
    $dsn = 'mysql:dbname='.$dbname.';host=localhost;port=3366';
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