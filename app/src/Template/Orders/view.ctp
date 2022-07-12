<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="orders view large-9 medium-8 columns content">
    <h3><?= h($order->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Stock') ?></th>
            <td><?= $order->has('stock') ? $this->Html->link($order->stock->name, ['controller' => 'Stocks', 'action' => 'view', $order->stock->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Production') ?></th>
            <td><?= $order->has('production') ? $this->Html->link($order->production->name, ['controller' => 'Productions', 'action' => 'view', $order->production->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($order->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($order->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Quantity') ?></th>
            <td><?= $this->Number->format($order->order_quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($order->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($order->modified) ?></td>
        </tr>
    </table>
</div>
