<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Production $production
 */
?>
<div class="productions view large-9 medium-8 columns content">
    <h3><?= h($production->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('名称') ?></th>
            <td><?= h($production->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('在庫数') ?></th>
            <td><?= $production->has('stock') ? $production->stock->stock_quantity: '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($production->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('価格') ?></th>
            <td><?= $this->Number->format($production->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('作成日') ?></th>
            <td><?= h($production->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('変更日') ?></th>
            <td><?= h($production->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('関連発注') ?></h4>
        <?php if (!empty($production->orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('ID') ?></th>
                <th scope="col"><?= __('Stocks ID') ?></th>
                <th scope="col"><?= __('Productions ID') ?></th>
                <th scope="col"><?= __('発注数') ?></th>
                <th scope="col"><?= __('ステータス') ?></th>
                <th scope="col"><?= __('作成日') ?></th>
                <th scope="col"><?= __('変更日') ?></th>
                <th scope="col" class="actions"><?= __('操作メニュー') ?></th>
            </tr>
            <?php foreach ($production->orders as $orders): ?>
            <tr>
                <td><?= h($orders->id) ?></td>
                <td><?= h($orders->stocks_id) ?></td>
                <td><?= h($orders->productions_id) ?></td>
                <td><?= h($orders->order_quantity) ?></td>
                <td><?= h($orders->status) ?></td>
                <td><?= h($orders->created) ?></td>
                <td><?= h($orders->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('閲覧'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
                    <?= $this->Html->link(__('変更'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
