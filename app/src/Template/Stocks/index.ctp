<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock[]|\Cake\Collection\CollectionInterface $stocks
 */
?>
<div class="stocks index large-9 medium-8 columns content">
    <h3><?= __('在庫一覧') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id','ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('productions_id','名称') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stock_quantity','在庫数') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created','作成日') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified','変更日') ?></th>
                <th scope="col" class="actions"><?= __('操作メニュー') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stocks as $stock): ?>
            <tr>
                <td><?= $this->Number->format($stock->id) ?></td>
                <td><?= $stock->has('production') ? $this->Html->link($stock->production->name, ['controller' => 'Productions', 'action' => 'view', $stock->production->id]) : '' ?></td>
                <td><?= $this->Number->format($stock->stock_quantity) ?></td>
                <td><?= h($stock->created) ?></td>
                <td><?= h($stock->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('閲覧'), ['action' => 'view', $stock->id]) ?>
                    <?= $this->Html->link(__('変更'), ['action' => 'edit', $stock->id]) ?>
                    <?= $this->Form->postlink(__('削除'), ['action' => 'delete', $stock->id], ['confirm' => __('本当に削除しますか？ # {0}?', $stock->id)]) ?>
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
