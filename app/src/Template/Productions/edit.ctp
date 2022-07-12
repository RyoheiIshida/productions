<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Production $production
 */
?>
<div class="productions form large-9 medium-8 columns content">
    <?= $this->Form->create($production) ?>
    <fieldset>
        <legend><?= __('Edit Production') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
