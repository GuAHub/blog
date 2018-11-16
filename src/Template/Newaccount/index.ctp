
<?php $this->extend('../Layout/BlogBootstrap/signin') ?>
<?= $this->Html->css('Action') ?>

<a href="<?= $this->Url->build(['controller' => 'login']) ?>">ログインページ</a>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('新規アカウント作成') ?></legend>
        <?php
        echo $this->Form->control('name', ['label' => '名前']);
        echo $this->Form->control('email', ['label' => 'メールアドレス']);
        echo $this->Form->control('password', ['label' => 'パスワード']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('作成')) ?>
    <?= $this->Form->end() ?>
</div>
