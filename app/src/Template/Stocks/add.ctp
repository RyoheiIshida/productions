<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('編集メニュー') ?></li>
        <li><?= $this->Html->link(__('商品一覧'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="stocks form large-9 medium-8 columns content">
    <?= $this->Form->create($stock) ?>
    <fieldset>
        <legend><?= __('新規商品') ?></legend>
        <?php
        echo $this->Form->control('name',['label'=>['text'=>'名称']]);
        echo $this->Form->control('stock_quantity',['label'=>['text'=>'在庫数']]);
        echo $this->Form->control('order_quantity',['label'=>['text'=>'発注数']]);
        echo $this->Form->control('price',['label'=>['text'=>'価格']]);
        echo $this->Form->control('status',['label'=>['text'=>'ステータス'],'default'=>'初期ステータス','disabled'=>true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('送信')) ?>
    <?= $this->Form->end() ?>
</div>