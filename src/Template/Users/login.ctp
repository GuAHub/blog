
<?php $this->extend('../Layout/BlogBootstrap/signin') ?>
<?= $this->Html->css('Action') ?>

<div class="users form">
  <?= $this->Flash->render() ?>
  <?= $this->Form->create() ?>
  <fieldset>
    <legend><?= __('ユーザ名とパスワードを入力してください') ?></legend>
    <?= $this->Form->control('email',['label'=>'メールアドレス']) ?>
    <?= $this->Form->control('password', ['label' => 'パスワード']) ?>
  </fieldset>
  <?= $this->Form->button(__('ログイン')); ?>
  <?= $this->Form->end() ?>
  <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'add']) ?>">新しくアカウントを作成する</a>
</div>
