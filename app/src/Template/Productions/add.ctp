<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Production $production
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Productions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="productions form large-9 medium-8 columns content">
    <?= $this->Form->create($production) ?>
    <fieldset>
        <legend><?= __('Add Production') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
