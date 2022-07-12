<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock[]|\Cake\Collection\CollectionInterface $stocks
 */
?>
<div class="stocks index large-9 medium-8 columns content">
    <h3><?= __('Stocks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('名称') ?></th>
                <th scope="col"><?= $this->Paginator->sort('在庫数') ?></th>
                <th scope="col"><?= $this->Paginator->sort('発注数') ?></th>
                <th scope="col"><?= $this->Paginator->sort('価格') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ステータス') ?></th>
                <th scope="col" class="actions"><?= __('編集メニュー') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stocks as $stock): ?>
            <tr>
                <td><?= $this->Number->format($stock->id) ?></td>
                <td><?= h($stock->name) ?></td>
                <td><?= $this->Number->format($stock->stock_quantity) ?></td>
                <td><?= $this->Number->format($stock->order_quantity) ?></td>
                <td><?= $this->Number->format($stock->price) ?></td>
                <td><?= h($stock->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('閲覧'), ['action' => 'view', $stock->id]) ?>
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $stock->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $stock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stock->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('最初へ')) ?>
            <?= $this->Paginator->prev('< ' . __('前へ')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('次へ') . ' >') ?>
            <?= $this->Paginator->last(__('最後へ') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
