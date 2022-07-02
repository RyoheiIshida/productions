<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $stock->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $stock->id)]
            )
            ?></li>
        <li><?= $this->Html->link(__('List Stocks'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="stocks form large-9 medium-8 columns content">
    <?= $this->Form->create($stock) ?>
    <fieldset>
        <legend><?= __('Edit Stock') ?></legend>
        <?php
        echo $this->Form->label('名称');
        echo $this->Form->select('name', [$stock['name']], ['disabled' => true]);
        echo $this->Form->label('在庫数');
        echo $this->Form->select('stock_quantity', [$stock['stock_quantity']], ['disabled' => true]);
        echo $this->Form->control('order_quantity');
        echo $this->Form->label('価格');
        echo $this->Form->select('price', [$stock['price']], ['disabled' => true]);
        echo $this->Form->label('ステータス');
        echo $this->Form->select(
            'status',
            [
                '発注受け取り済み' => '発注受け取り済み',
                '発注確認' => '発注確認',
                '発注状態' => '発注状態',
                '発注済み' => '発注済み',
            ],
            ['disabled' => true]
        )
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>