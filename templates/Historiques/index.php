<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Historique> $historiques
 */
?>
<div class="historiques index content">
    <?= $this->Html->link(__('New Historique'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Historiques') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('historique_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('tutoriel_id') ?></th>
                    <th><?= $this->Paginator->sort('quiz_id') ?></th>
                    <th><?= $this->Paginator->sort('date_acces') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($historiques as $historique): ?>
                <tr>
                    <td><?= $this->Number->format($historique->historique_id) ?></td>
                    <td><?= $historique->has('user') ? $this->Html->link($historique->user->username, ['controller' => 'Users', 'action' => 'view', $historique->user->user_id]) : '' ?></td>
                    <td><?= $historique->has('tutoriel') ? $this->Html->link($historique->tutoriel->titre, ['controller' => 'Tutoriels', 'action' => 'view', $historique->tutoriel->tutoriel_id]) : '' ?></td>
                    <td><?= $this->Number->format($historique->quiz_id) ?></td>
                    <td><?= h($historique->date_acces) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $historique->historique_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $historique->historique_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $historique->historique_id], ['confirm' => __('Are you sure you want to delete # {0}?', $historique->historique_id)]) ?>
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
