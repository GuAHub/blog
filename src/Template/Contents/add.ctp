<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 */
?>
<?php $this->extend('../Layout/BlogBootstrap/dashboard'); ?>
<?= $this->Html->css('Action'); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('タイムライン'), ['action' => 'timeline']) ?></li>
    </ul>
</nav>
<div class="contents form large-9 medium-8 columns content">
    <?= $this->Form->create($content,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Content') ?></legend>
        <?php
            echo $this->Form->control('title',['label'=>'タイトル']);
            echo $this->Form->control('body',['label'=>'本文','rows'=>5]);
            echo $this->Form->control('img',['type'=>'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
