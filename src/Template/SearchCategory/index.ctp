
<?php //$this->extend('../Layout/BlogBootstrap/dashboard'); ?>
<?= $this->Html->css('Action'); ?>

<?= $this->element('header'); ?>

<nav class="navbar-collapse sidebar" id="actions-sidebar">
    <div id="nav">
        <ul class="side-nav">
            <li>
                <a href="<?= $this->Url->build(['controller' => 'mypage']) ?>">
                    <span class="usericon"><?= $myicon ?></span>
                    <span><?= "ようこそ" . $myname . "さん" ?></span>
                </a>
            </li>
            <li><a href="<?= $this->Url->build(['controller' => 'logout']) ?>">ログアウト</a></li>
            <li><?= $this->Html->link(__('ツイー○'), ['controller' => 'NewContent']) ?></li>
        </ul>
    </div>
</nav>

<div class="contents form large-9 medium-8 columns content">
    <?= $this->Form->create($contents) ?>
    <?= $this->Form->control('category', ['label' => 'カテゴリー']) ?>
    <?= $this->Form->button(__('検索')) ?>
    <?= $this->Form->end() ?>
</div>


<div class="contents index large-9 medium-8 columns content">

        <?php foreach ($contents as $content) : ?>
            <div class="panel panel-default">
                <a href="<?= $this->Url->build(['controller' => 'UserPage',$content->postid]) ?>">
                <span class="usericon"> <?= $content->posticon ?> </span>
                <?= $content->postname . "さんの投稿" ?></a>
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
