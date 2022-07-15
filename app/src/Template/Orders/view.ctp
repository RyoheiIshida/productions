<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="orders view large-9 medium-8 columns content">
    <h3><?= h($order->production->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($order->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('在庫数') ?></th>
            <td><?= $order->has('stock') ? $order->stock->stock_quantity : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ステータス') ?></th>
            <td><?= h($order->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('発注数') ?></th>
            <td><?= $this->Number->format($order->order_quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('作成日') ?></th>
            <td><?= h($order->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('変更日') ?></th>
            <td><?= h($order->modified) ?></td>
        </tr>
    </table>
</div>
