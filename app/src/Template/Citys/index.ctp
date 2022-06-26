<!-- File: src/Template/Articles/index.ctp -->

<h1>記事一覧</h1>
<table>
    <tr>
        <th>タイトル</th>
        <th>作成日時</th>
    </tr>

    <!-- ここで、$articles クエリーオブジェクトを繰り返して、記事の情報を出力します -->

    <?php foreach ($citys as $city): ?>
    <tr>
        <td>
            <?= $this->Html->link($city->name, ['action' => 'view', $city->slug]) ?>
        </td>
        <td>
            <?= $city->citycode ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>