<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 */
?>
<?php $this->extend('../Layout/BlogBootstrap/dashboard'); ?>
<?= $this->Html->css('Action'); ?>

<nav class="sidebar" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('タイムライン'), ['action' => 'timeline']) ?></li>
    </ul>
</nav>

<div class="contents form large-9 medium-8 columns content">
    <?= $this->Form->create($content) ?>
    <fieldset>
        <legend><?= __('新規作成') ?></legend>
        <?php
            echo $this->Form->control('title',['label'=>'タイトル']);
            echo $this->Form->control('body', ['label' => '本文','type'=>'textarea','rows'=>'5']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('送信')) ?>
    <?= $this->Form->end() ?>
</div>
