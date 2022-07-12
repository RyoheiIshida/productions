<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
 */
?>
<div class="stocks view large-9 medium-8 columns content">
    <h3><?= h($stock->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('名称') ?></th>
            <td><?= h($stock->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ステータス') ?></th>
            <td><?= h($stock->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($stock->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('在庫数') ?></th>
            <td><?= $this->Number->format($stock->stock_quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('発注数') ?></th>
            <td><?= $this->Number->format($stock->order_quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('価格') ?></th>
            <td><?= $this->Number->format($stock->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('作成日') ?></th>
            <td><?= h($stock->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('変更日') ?></th>
            <td><?= h($stock->modified) ?></td>
        </tr>
    </table>
</div>
