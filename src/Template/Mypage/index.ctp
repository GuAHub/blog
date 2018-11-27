<?php $this->extend('../Layout/BlogBootstrap/dashboard'); ?>
<?= $this->Html->css('Action'); ?>


<div><?= $myheader ?></div>
<div class='img'>
    <div class="myicon"><?= $myicon ?></div>
    <div class="myname"><?= $user->name ?></div>
    <div class="mymail"><?= $user->email ?></div>
    <div id="nav">
        <ul>
            <li><?= $this->Html->link(__('タイムライン'), ['controller' => 'timeline']) ?></li>
            <li><a href="<?= $this->Url->build(['controller' => 'ProfileEdit']) ?>">プロフィール編集</a></li>
            <li><?= $this->Html->link(__('ツイー○'), ['controller' => 'NewContent']) ?></li>
        </ul>
    </div>
</div>
<div class="pageblock">
    <div class="contents index large-9 medium-8 columns content">
        <div class="tweet">
            <?php foreach ($contents as $content) : ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><?= $this->Html->link(__(h($content->title)), ['controller' => 'ContentView', $content->id]) ?></div>
                    <div class="panel-body"><?= nl2br(h($content->body)) ?></div>
                    <div class="panelimg">
                        <?= $content->icon ?>
                    </div>
                    <div><?= $content->img ?></div>
                    <div><?= $content->created ?></div>
                </div>
            <?php endforeach ?>
    </div>
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
</div>


