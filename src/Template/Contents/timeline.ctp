<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content[]|\Cake\Collection\CollectionInterface $contents
 */
?>

<?php $this->extend('../Layout/BlogBootstrap/dashboard'); ?>
<?= $this->Html->css('Action'); ?>

<?= $this->element('myaccount'); ?>

<nav class="sidebar" id="actions-sidebar">
    <ul class="side-nav">
        <?= __('操作') ?>
        <li><?= $this->Html->link(__('ホーム'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('新規作成'), ['action' => 'add']) ?></li>
    </ul>
</nav>

<div class="contents index large-9 medium-8 columns content">

        <?php foreach ($contents as $content): ?>
            <div class="panel panel-default">
                <div class="panel-heading"><?= h($content->title) ?></div>
                <div class="panel-body"><?= nl2br(h($content->body)) ?></div>
                <div class="ContentAction">
                    <?= $this->Html->link(__('詳細'), ['action' => 'view', $content->id]) ?>
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $content->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $content->id], ['confirm' => __( "消しちゃいますよ...?", $content->id)]) ?>
                </div>
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
        <p><?= $this->Paginator->counter(['format' => __('{{page}}/{{pages}}ページ　全{{count}}件')]) ?></p>
    </div>
</div>
