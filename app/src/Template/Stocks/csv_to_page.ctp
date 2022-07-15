<h2>CSV出力</h2>
<h5><?php echo 'id,名称,価格,在庫数,作成日,変更日'?></h5>
<?php foreach($stocks as $stock): ?>
<?PHP echo $stock['id'].','.$stock['production']['name'].','.$stock['production']['price'].','.$stock['stock_quantity'].','.$stock['created'].','.$stock['modified'].'<br>'?>
<?php endforeach; ?>