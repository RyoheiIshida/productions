<!-- File: src/Template/Articles/index.ctp -->

<h1>都道府県一覧</h1>
<table>
    <tr>
        <th>地方</th>
        <th>都道府県ナンバー</th>
        <th>都道府県名</th>
    </tr>

    <!-- ここで、$articles クエリーオブジェクトを繰り返して、記事の情報を出力します -->

    <?php foreach ($large_areas as $large_area) : ?>
        <tr>
            <td>
                <?= $large_area->name ?>
            </td>

            <td>
                <?= $large_area->prefecture_id ?>
            </td>
            <td>
                <?= $this->Html->link($large_area->prefecture_name, ['action' => 'view', $large_area->prefecture_id]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?= $this->Paginator->first('<<最初へ'); ?>
<?= $this->Paginator->prev('<前へ'); ?>
<?= $this->Paginator->numbers(); ?>
<?= $this->Paginator->next('次へ>'); ?>
<?= $this->Paginator->last('最後へ>>'); ?>
