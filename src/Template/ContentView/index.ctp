<?php $this->extend('../Layout/BlogBootstrap/dashboard'); ?>
<?= $this->Html->css('Action'); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <a href="<?= $this->Url->build(['controller' => 'UserPage', $content->userid]) ?>">
        <?= $usericon . $username . "さんの投稿" ?></a>
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('タイムライン'), ['controller' => 'timeline']) ?> </li>
        <?php if($content->userid === $Authid){
             echo "<li>" .  $this->Html->link(__('編集'), ['controller' => 'ContentEdit', $content->id])  . "</li>" .
        "<li>" .  $this->Form->postLink(__('削除'), ['action' => 'delete', $content->id], ['confirm' => __('{0}を削除してもよろしいですか？', h($content->title))]) . "</li>" ;
            }
        ?>
    </ul>
</nav>

<div class="contents view large-9 medium-8 columns content">
    <h3><?= h($content->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <td><?= nl2br(h($content->body)) ?></td>
        </tr>
        <tr>
            <td><?= $img ?></td>
        </tr>
        <tr>
            <td><?= h("カテゴリ：".$content->category) ?></td>
        </tr>
    </table>
</div>
