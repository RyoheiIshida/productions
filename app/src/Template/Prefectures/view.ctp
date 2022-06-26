<h1><?php echo $prefectures->name; ?></h1>
<h1>市区町村 一覧</h1>

<table>
    <tr>
        <th>市区町村</th>
        <th>市区町村コード</th>
    </tr>

    <!-- ここで、$articles クエリーオブジェクトを繰り返して、記事の情報を出力します -->
    <?php foreach ($prefectures->citys as $citys) : ?>
        <tr>
            <td>
                <?= h($citys->name) ?>
            </td>
            <td>
                <?= h($citys->citycode) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
