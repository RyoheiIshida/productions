<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <?php $login_user = $this->request->session()->read('Auth.User')?>
                <?php if(empty($login_user['email'])): ?>
                    <li><a href="/users/login">ログイン</a></li>
                    <li><a href="/users/add">ユーザー登録</a></li>
                <?php elseif(!empty($login_user['email'])): ?>
                    <li><a href="/users/logout">ログアウト</a></li>
                    <li>ログイン中のユーザー：<?php echo $login_user['email']." ".$login_user['authority'] ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <nav class="large-3 medium-4 columns" >
        <ul class="side-nav">
            <li class="heading"><?= __('--取り扱い商品--') ?></li>
            <li><?= $this->Html->link(__('新規商品'), ['controller' => 'productions', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('商品一覧'), ['controller' => 'productions', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('在庫一覧'), ['controller' => 'stocks', 'action' => 'index']) ?></li>
            <br>
            <li class="heading"><?= __('--発注--') ?></li>
            <li><?= $this->Html->link(__('新規発注'), ['controller' => 'orders', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('発注履歴'), ['controller' => 'orders', 'action' => 'index']) ?></li>
            <br>
            <li class="heading"><?= __('--CSV出力--') ?></li>
            <li><?= $this->Html->link(__('ページへ出力'), ['controller' => 'stocks', 'action' => 'csvToPage']) ?></li>
            <li><?= $this->Html->link(__('ファイルダウンロード'), ['controller' => 'stocks', 'action' => 'csvToFile']) ?></li>
        </ul>
    </nav>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
