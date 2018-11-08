<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content[]|\Cake\Collection\CollectionInterface $contents
 */
?>

<?php $this->extend('../Layout/BlogBootstrap/dashboard'); ?>
<nav class="sidebar" id="actions-sidebar">
    <ul class="side-nav">
        <li class="head"><?= __('操作') ?></li>
        <li><?= $this->Html->link(__('ホーム'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('新規作成'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contents index large-9 medium-8 columns content">
    <h3><?= __('Contents') ?></h3>


        <?php foreach ($contents as $content): ?>
            <div class="panel panel-default">
                <div class="panel-heading"><?= h($content->title) ?></div>
                <div class="panel-body"><?= h($content->body) ?></div>

                    <?= $this->Html->link(__('View'), ['action' => 'view', $content->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $content->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $content->id], ['confirm' => __('Are you sure you want to delete # {0}?', $content->id)]) ?>
            </div>

        <?php endforeach; ?>


    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('最初')) ?>
            <?= $this->Paginator->prev('< ' . __('前')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('次') . ' >') ?>
            <?= $this->Paginator->last(__('最後') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
