<?php $this->extend('../Layout/BlogBootstrap/dashboard'); ?>
<?= $this->Html->css('Action'); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('退会'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('{0}さんのアカウントを削除しますか？', h($user->name))]
            )
            ?></li>
        <li><?= $this->Html->link(__('タイムライン'), ['controller'=>'timeline']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
        echo $this->Form->control('name',['label'=>'名前']);
        echo $this->Form->control('icon', ['label'=>'アイコン','type' => 'file']);
        echo $this->Form->control('header', ['label' => 'ヘッダー', 'type' => 'file']);
        echo $this->Form->control('color', ['label' => 'カラー', 'type' => 'text']);
        echo $this->Form->control('backicon', ['label' => 'バックアイコン', 'type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
