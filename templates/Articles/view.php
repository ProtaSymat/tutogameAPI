<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->articles_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->articles_id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->articles_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Articles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Article'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="articles view content">
            <h3><?= h($article->articles_titre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Articles Titre') ?></th>
                    <td><?= h($article->articles_titre) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $article->has('user') ? $this->Html->link($article->user->username, ['controller' => 'Users', 'action' => 'view', $article->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Articles Img') ?></th>
                    <td><?= h($article->articles_img) ?></td>
                </tr>
                <tr>
                    <th><?= __('Articles Id') ?></th>
                    <td><?= $this->Number->format($article->articles_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Articles Created') ?></th>
                    <td><?= h($article->articles_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Articles Modified') ?></th>
                    <td><?= h($article->articles_modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Articles Content') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($article->articles_content)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Articles Excerpt') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($article->articles_excerpt)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
