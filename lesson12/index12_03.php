<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8' />
    <title>結果セット</title>
</head>

<body>
    <h1>課題12_03</h1>
    <h2>地域の各都道府県リスト</h2>
    <table class='table'>

        <?php
        require_once __DIR__ . '/DbManager.php';
        $data = sql_exec('SELECT * FROM large_area');
        foreach($data as $row) {
            echo "<tr>";
            echo "<td>" . $row['prefecture_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['prefecture_name'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>市区町村の県別数</h2>
    <table class='table'>
        <?php
        $dbh=getDb();
        $stt=$dbh->prepare('SELECT * FROM prefecture');
        $stt->execute();
        while ($row = $stt->fetch(pdo::FETCH_ASSOC)) {
            $stt_count = $dbh->prepare('select count(*) from city where prefecture_id=' . $row["prefecture_id"]);
            $stt_count->execute();
            echo "<tr>";
            echo "<td>" . $row["prefecture_id"]."</td>";
            echo "<td>" . $row["name"]."</td>";
            echo "<td>".$stt_count->fetchColumn() . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</html>