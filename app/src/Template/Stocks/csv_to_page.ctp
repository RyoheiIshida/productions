<h2>CSV出力</h2>
<h5><?php echo 'id,名称,価格,在庫数,作成日,変更日' ?></h5>
<?php foreach ($stocks as $stock) : ?>
    <?PHP echo $stock['id'] . ','
            . h($stock['production']['name']) . ','
            . h($stock['production']['price']) . ','
            . h($stock['stock_quantity']) . ','
            . h($stock['created']) . ','
            . h($stock['modified']) . '<br>' ?>
<?php endforeach; ?>