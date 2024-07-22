<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Progression> $progressions
 */
?>
<div class="progressions index content">
    <?= $this->Html->link(__('New Progression'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Progressions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('progression_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('chapitre_id') ?></th>
                    <th><?= $this->Paginator->sort('last_tutoriel_id') ?></th>
                    <th><?= $this->Paginator->sort('chapitre_termine') ?></th>
                    <th><?= $this->Paginator->sort('date_derniere_progression') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($progressions as $progression): ?>
                <tr>
                    <td><?= $this->Number->format($progression->progression_id) ?></td>
                    <td><?= $progression->has('user') ? $this->Html->link($progression->user->username, ['controller' => 'Users', 'action' => 'view', $progression->user->user_id]) : '' ?></td>
                    <td><?= $progression->has('chapitre') ? $this->Html->link($progression->chapitre->titre, ['controller' => 'Chapitres', 'action' => 'view', $progression->chapitre->chapitre_id]) : '' ?></td>
                    <td><?= $this->Number->format($progression->last_tutoriel_id) ?></td>
                    <td><?= h($progression->chapitre_termine) ?></td>
                    <td><?= h($progression->date_derniere_progression) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $progression->progression_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $progression->progression_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $progression->progression_id], ['confirm' => __('Are you sure you want to delete # {0}?', $progression->progression_id)]) ?>
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
