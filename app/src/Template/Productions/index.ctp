<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Production[]|\Cake\Collection\CollectionInterface $productions
 */
?>
<div class="productions index large-9 medium-8 columns content">
    <h3><?= __('商品一覧') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id','ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name','名称') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price','価格') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created','作成日') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified','変更日') ?></th>
                <th scope="col" class="actions"><?= __('操作メニュー') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productions as $production): ?>
            <tr>
                <td><?= $this->Number->format($production->id) ?></td>
                <td><?= h($production->name) ?></td>
                <td><?= $this->Number->format($production->price) ?></td>
                <td><?= h($production->created) ?></td>
                <td><?= h($production->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('閲覧'), ['action' => 'view', $production->id]) ?>
                    <?= $this->Html->link(__('変更'), ['action' => 'edit', $production->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $production->id], ['confirm' => __('本当に削除しますか？ # {0}?', $production->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
