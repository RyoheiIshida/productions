<h1><?php echo $prefectures->name; ?></h1>
<h1>市区町村 一覧</h1>

<table>
    <tr>
        <th>市区町村</th>
        <th>市区町村コード</th>
    </tr>

    <!-- ここで、$articles クエリーオブジェクトを繰り返して、記事の情報を出力します -->
    <?php foreach ($prefectures->cities as $cities) : ?>
        <tr>
            <td>
                <?= h($cities->name) ?>
            </td>
            <td>
                <?= h($cities->citycode) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
