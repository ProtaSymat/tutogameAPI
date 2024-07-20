<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\News $news
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit News'), ['action' => 'edit', $news->news_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete News'), ['action' => 'delete', $news->news_id], ['confirm' => __('Are you sure you want to delete # {0}?', $news->news_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List News'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New News'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="news view content">
            <h3><?= h($news->news_titre) ?></h3>
            <table>
                <tr>
                    <th><?= __('News Titre') ?></th>
                    <td><?= h($news->news_titre) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $news->has('user') ? $this->Html->link($news->user->username, ['controller' => 'Users', 'action' => 'view', $news->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('News Img') ?></th>
                    <td><?= h($news->news_img) ?></td>
                </tr>
                <tr>
                    <th><?= __('News Id') ?></th>
                    <td><?= $this->Number->format($news->news_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('News Created') ?></th>
                    <td><?= h($news->news_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('News Modified') ?></th>
                    <td><?= h($news->news_modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('News Content') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($news->news_content)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('News Excerpt') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($news->news_excerpt)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
