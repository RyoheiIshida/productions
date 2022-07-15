<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
 */
?>
<div class="stocks view large-9 medium-8 columns content">
    <h3><?= h($stock->production->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('名称') ?></th>
            <td><?= $stock->has('production') ? $this->Html->link($stock->production->name, ['controller' => 'Productions', 'action' => 'view', $stock->production->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($stock->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('在庫数') ?></th>
            <td><?= $this->Number->format($stock->stock_quantity) ?></td>
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
