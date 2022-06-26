<h1>都道府県一覧</h1>
<table>
    <tr>
        <th>地方</th>
    </tr>

    <!-- ここで、$articles クエリーオブジェクトを繰り返して、記事の情報を出力します -->
    <?php foreach ($large_areas->prefectures as $prefectures) : ?>
        <tr>
            <td>
                <?= $prefectures ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?= $this->Paginator->first('<<最初へ'); ?>
<?= $this->Paginator->prev('<前へ'); ?>
<?= $this->Paginator->numbers(); ?>
<?= $this->Paginator->next('次へ>'); ?>
<?= $this->Paginator->last('最後へ>>'); ?>
