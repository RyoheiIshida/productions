<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8' />
    <title>結果セット</title>
</head>

<body>
    <h1>地域の各都道府県リスト</h1>
    <table class='table'>

        <?php
        require_once __DIR__ . '/DbManager.php';
        $dbh = getDb('japan');

        $s = sql_exec($dbh, 'SELECT * FROM large_area');
        while ($row = $s->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['prefecture_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['prefecture_name'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h1>市区町村の県別数</h1>
    <table class='table'>
        <?php

        $s = sql_exec($dbh, 'SELECT * FROM prefecture');
        while ($row = $s->fetch(pdo::FETCH_ASSOC)) {
            $stt_count = sql_exec($dbh, 'select count(*) from city where prefecture_id=' . $row["prefecture_id"]);
            echo "<tr>";
            echo "<td>" . $row["prefecture_id"]."</td>";
            echo "<td>" . $row["name"]."</td>";
            echo "<td>".$stt_count->fetchColumn() . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</html>