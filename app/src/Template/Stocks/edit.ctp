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
            echo $this->Form->control('name');
            echo $this->Form->control('num');
            echo $this->Form->control('price');
            echo $this->Form->radio('status',
            [['text'=>'発注確認','value'=>'発注確認'],
            ['text'=>'発注状態','value'=>'発注状態'],
            ['text'=>'発注済み','value'=>'発注済み'],
            ['text'=>'発注受け取り済み','value'=>'発注受け取り済み']]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
