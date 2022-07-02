<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
        echo $this->Form->control('email');
        echo $this->Form->control('password');

        #echo $this->Form->radio('authority', ['在庫発注管理者', '在庫発注社員', '在庫受注社員']);
        echo $this->Form->radio(
            'authority',
            [
                ['text' => '在庫発注管理者', 'value' => '在庫発注管理者'],
                ['text' => '在庫発注社員', 'value' => '在庫発注社員'],
                ['text' => '在庫受注社員', 'value' => '在庫受注社員']
            ]
        );
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>