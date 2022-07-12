<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
 */
?>
<div class="stocks form large-9 medium-8 columns content">
    <?= $this->Form->create($stock) ?>
    <fieldset>
        <legend><?= __('編集') ?></legend>
        <?php
        echo $this->Form->control('name', ['label'=>['text'=>'名称'],'disabled' => true]);
        echo $this->Form->control('stock_quantity', ['label'=>['text'=>'在庫数'],'disabled' => true]);
        echo $this->Form->control('order_quantity', ['label'=>['text'=>'発注数']]);
        echo $this->Form->control('price', ['label'=>['text'=>'価格'], 'disabled' => true]);
        echo $this->Form->control('status', ['label'=>['text'=>'ステータス'], 'disabled' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('送信')) ?>
    <?= $this->Form->end() ?>
</div>