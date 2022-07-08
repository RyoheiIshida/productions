<!-- File: src/Template/Cities/index.ctp -->

<h1>市町村一覧</h1>
<table>
    <tr>
        <th>市町村名</th>
        <th>市町村番号</th>
    </tr>

    <!-- ここで、$cities クエリーオブジェクトを繰り返して、記事の情報を出力します -->

    <?php foreach ($cities as $city) : ?>
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
<?= $this->Paginator->first('<<最初へ'); ?>
<?= $this->Paginator->prev('<前へ'); ?>
<?= $this->Paginator->numbers(); ?>
<?= $this->Paginator->next('次へ>'); ?>
<?= $this->Paginator->last('最後へ>>'); ?>