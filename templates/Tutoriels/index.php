<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Tutoriel> $tutoriels
 */
?>
<div class="tutoriels index content">
    <?= $this->Html->link(__('New Tutoriel'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tutoriels') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('tutoriel_id') ?></th>
                    <th><?= $this->Paginator->sort('chapitre_id') ?></th>
                    <th><?= $this->Paginator->sort('titre') ?></th>
                    <th><?= $this->Paginator->sort('date_publication') ?></th>
                    <th><?= $this->Paginator->sort('ordre') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tutoriels as $tutoriel): ?>
                <tr>
                    <td><?= $this->Number->format($tutoriel->tutoriel_id) ?></td>
                    <td><?= $tutoriel->has('chapitre') ? $this->Html->link($tutoriel->chapitre->titre, ['controller' => 'Chapitres', 'action' => 'view', $tutoriel->chapitre->chapitre_id]) : '' ?></td>
                    <td><?= h($tutoriel->titre) ?></td>
                    <td><?= h($tutoriel->date_publication) ?></td>
                    <td><?= $this->Number->format($tutoriel->ordre) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tutoriel->tutoriel_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tutoriel->tutoriel_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tutoriel->tutoriel_id], ['confirm' => __('Are you sure you want to delete # {0}?', $tutoriel->tutoriel_id)]) ?>
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
