<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<div class="orders index large-9 medium-8 columns content">
    <h3><?= __('発注一覧') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id','ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('productions_id','名称') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_quantity','発注数') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status','ステータス') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created','作成日') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified','変更日') ?></th>
                <th scope="col" class="actions"><?= __('操作メニュー') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $this->Number->format($order->id) ?></td>
                <td><?= $order->has('production') ? $this->Html->link($order->production->name, ['controller' => 'Productions', 'action' => 'view', $order->production->id]) : '' ?></td>
                <td><?= $this->Number->format($order->order_quantity) ?></td>
                <td><?= h($order->status) ?></td>
                <td><?= h($order->created) ?></td>
                <td><?= h($order->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('閲覧'), ['action' => 'view', $order->id]) ?>
                    <?= $this->Html->link(__('変更'), ['action' => 'edit', $order->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $order->id], ['confirm' => __('本当に削除しますか？ # {0}?', $order->id)]) ?>
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
