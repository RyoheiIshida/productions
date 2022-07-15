<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="orders form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('新規発注') ?></legend>
        <?php
        echo $this->Form->control('stocks_id', ['options' => $stocks, 'type' => 'hidden']);
        echo $this->Form->control('productions_id', ['options' => $productions, 'label' => '名称']);
        echo $this->Form->control('order_quantity', ['label' => '発注数']);
        echo $this->Form->control('status', [
            'options' => [
                ['text' => '発注確認', 'value' => '発注確認'],
                ['text' => '発注状態', 'value' => '発注状態'],
                ['text' => '発注済み', 'value' => '発注済み'],
                ['text' => '発注受け取り済み', 'value' => '発注受け取り済み']
            ],
            'label' => 'ステータス',
            'disabled'=>false
        ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>