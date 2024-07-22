<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Article> $articles
 */
?>
<div class="articles index content">
    <?= $this->Html->link(__('New Article'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Articles') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('articles_id') ?></th>
                    <th><?= $this->Paginator->sort('articles_titre') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('articles_img') ?></th>
                    <th><?= $this->Paginator->sort('articles_created') ?></th>
                    <th><?= $this->Paginator->sort('articles_modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article): ?>
                <tr>
                    <td><?= $this->Number->format($article->articles_id) ?></td>
                    <td><?= h($article->articles_titre) ?></td>
                    <td><?= $article->has('user') ? $this->Html->link($article->user->username, ['controller' => 'Users', 'action' => 'view', $article->user->user_id]) : '' ?></td>
                    <td><?= h($article->articles_img) ?></td>
                    <td><?= h($article->articles_created) ?></td>
                    <td><?= h($article->articles_modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $article->articles_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->articles_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->articles_id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->articles_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
