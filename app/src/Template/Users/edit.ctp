<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('ユーザー編集') ?></legend>
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
