<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8' />
    <title>結果セット</title>
</head>

<body>
    <h1>課題12_02</h1>
    <h2>usersテーブルから20名表示</h2>
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
        $dbh = getDb();
        $s = $dbh->prepare('select * from users limit 20;');
        $s->execute();
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
    </table>
    <h2>SQLを渡して結果を返す関数</h2>
    <table class='table'>
        <thead>
            <tr>
                <th>name</th>
                <th>annotation_id</th>
                <th>user_id</th>
                <th>created_timestamp</th>
                <th>update_timestamp</th>
            </tr>
        </thead>
        <?php
        $user_annotations = sql_exec('select * from user_annotation limit 20;');
        foreach ($user_annotations as $user_annotation) {
            echo "<tr>";
            echo "<td>" . $user_annotation['name'] . "</td>";
            echo "<td>" . $user_annotation['annotation_id'] . "</td>";
            echo "<td>" . $user_annotation['user_id'] . "</td>";
            echo "<td>" . $user_annotation['create_datetime'] . "</td>";
            echo "<td>" . $user_annotation['update_datetime'] . "</td>";
            echo "<tr>";
        }

        ?>

</html>