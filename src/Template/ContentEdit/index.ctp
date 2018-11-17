<?php $this->extend('../Layout/BlogBootstrap/dashboard'); ?>
<?= $this->Html->css('Action'); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('削除'),
                ['action' => 'delete', $content->id],
                ['confirm' => __('{0}を削除しますか？', h($content->title))]
            )
            ?></li>
        <li><?= $this->Html->link(__('タイムライン'), ['controller' => 'timeline']) ?> </li>
    </ul>
</nav>
<div class="contents form large-9 medium-8 columns content">
    <?= $this->Form->create($content, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit Content') ?></legend>
        <?php
        echo $this->Form->control('title');
        echo $this->Form->control('body', ['type' => 'textarea', 'rows' => '10']);
        echo $this->Form->control('img', ['type' => 'file']);
        echo $this->Form->control('category');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
