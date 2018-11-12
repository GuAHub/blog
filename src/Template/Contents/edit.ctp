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
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $content->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $content->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Contents'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="contents form large-9 medium-8 columns content">
    <?= $this->Form->create($content) ?>
    <fieldset>
        <legend><?= __('Edit Content') ?></legend>
        <?php
            echo $this->Form->control('title', ['label' => 'タイトル']);
            echo $this->Form->control('body', ['label' => '本文', 'type' => 'textarea', 'rows' => '5']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
