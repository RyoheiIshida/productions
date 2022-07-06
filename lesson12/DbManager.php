<?php

/*
* @info get new PDO object
* @parameter nothing
* @return PDO object
*/
function getDb(): PDO
{
    $dsn = 'mysql:dbname=mzn;host=mzn_db;port=3306';
    $user = 'user';
    $password = 'pass';
    try {
        $dbh = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        print('Error:' . $e->getMessage());
        die();
    }
    return $dbh;
}

/*
* @info get new PDO, prepare, execute and fetchall
* @parameter SQL statement
* @return data by fetchall
*/
function sql_exec($str)
{
    $dbh = getDb();
    $s = $dbh->prepare($str);
    $s->execute();
    $data = $s->fetchall();
    return $data;
}