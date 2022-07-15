<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Production $production
 */
?>
<div class="productions form large-9 medium-8 columns content">
    <?= $this->Form->create($production) ?>
    <fieldset>
        <legend><?= __('商品変更') ?></legend>
        <?php
            echo $this->Form->control('name',['label'=>'名称']);
            echo $this->Form->control('price',['label'=>'価格']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('送信')) ?>
    <?= $this->Form->end() ?>
</div>
