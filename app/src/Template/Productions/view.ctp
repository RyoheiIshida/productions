<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Production $production
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Production'), ['action' => 'edit', $production->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Production'), ['action' => 'delete', $production->id], ['confirm' => __('Are you sure you want to delete # {0}?', $production->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Productions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Production'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productions view large-9 medium-8 columns content">
    <h3><?= h($production->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($production->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($production->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($production->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($production->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($production->modified) ?></td>
        </tr>
    </table>
</div>
