
<?php $this->extend('../Layout/BlogBootstrap/dashboard'); ?>
<?= $this->Html->css('Action'); ?>

<nav class="navbar-collapse sidebar" id="actions-sidebar">
    <ul class="side-nav">
        <?= $myicon ?>
        <?= "ようこそ" . $myname . "さん" ?>
        <li><button>未来へ行く<button></li>
        <li><a href="<?= $this->Url->build(['controller' => 'mypage']) ?>">マイページ</a></li>
        <li><a href="<?= $this->Url->build(['controller' => 'logout']) ?>">ログアウト</a></li>
        <li><a href="<?= $this->Url->build(['controller' => 'ProfileEdit']) ?>">プロフィール編集</a></li>
        <li><?= $this->Html->link(__('ツイー○'), ['controller' => 'NewContent']) ?></li>
    </ul>
</nav>

<div class="contents index large-9 medium-8 columns content">

        <?php foreach ($contents as $content) : ?>
            <div class="panel panel-default">
                <?= $content->posticon . $content->postname . "さんの投稿" ?>
                <div class="panel-heading"><?= $this->Html->link(__(h($content->title)), ['controller' => 'ContentView', $content->id]) ?></div>
                <div class="panel-body"><?= nl2br(h($content->body)) ?></div>

                <div class="panelimg"><?= $content->icon ?></div>
                <div><?= $content->img ?></div>
                <div><?= $content->created ?></div>
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
