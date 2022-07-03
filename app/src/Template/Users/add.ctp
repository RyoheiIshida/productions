<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('編集メニュー') ?></li>
        <li><?= $this->Html->link(__('ユーザー一覧'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('ユーザー新規登録') ?></legend>
        <?php
        echo $this->Form->control('email');
        echo $this->Form->control('password', ['label' => ['text' => 'パスワード']]);
        echo $this->Form->control(
            'authority',
            [
                'options' => [
                    ['text' => '在庫発注管理者', 'value' => '在庫発注管理者'],
                    ['text' => '在庫発注社員', 'value' => '在庫発注社員'],
                    ['text' => '在庫受注社員', 'value' => '在庫受注社員']
                ],
                'label' => ['text' => '権限']
            ]
        );
        ?>
    </fieldset>
    <?= $this->Form->button(__('送信')) ?>
    <?= $this->Form->end() ?>
</div>