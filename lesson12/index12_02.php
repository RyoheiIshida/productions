<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8' />
    <title>結果セット</title>
</head>

<body>
    <table class='table'>
        <thead>
            <tr>
                <th>ID</th>
                <th>user_id</th>
                <th>create_timestamp</th>
                <th>update_timestamp</th>
            </tr>
        </thead>
        <?php
        require_once __DIR__ . '/DbManager.php';
        $dbh = getDb('mzn');

        #$s=$dbh->prepare('SELECT * FROM users limit 20');
        $s = sql_exec($dbh, 'SELECT * FROM users limit 20');
        $data = $s->fetchall();

        foreach ($data as $i) {
            echo "<tr>";
            echo "<td>" . $i['id'] . "</td>";
            echo "<td>" . $i['user_id'] . "</td>";
            echo "<td>" . $i['create_timestamp'] . "</td>";
            echo "<td>" . $i['update_timestamp'] . "</td>";
            echo "<tr>";
        }
        ?>

</html>