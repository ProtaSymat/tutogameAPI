<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Bloc> $blocs
 */
?>
<div class="blocs index content">
    <?= $this->Html->link(__('New Bloc'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Blocs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('bloc_id') ?></th>
                    <th><?= $this->Paginator->sort('tutoriel_id') ?></th>
                    <th><?= $this->Paginator->sort('type_contenue') ?></th>
                    <th><?= $this->Paginator->sort('ordre') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($blocs as $bloc): ?>
                <tr>
                    <td><?= $this->Number->format($bloc->bloc_id) ?></td>
                    <td><?= $bloc->has('tutoriel') ? $this->Html->link($bloc->tutoriel->titre, ['controller' => 'Tutoriels', 'action' => 'view', $bloc->tutoriel->tutoriel_id]) : '' ?></td>
                    <td><?= h($bloc->type_contenue) ?></td>
                    <td><?= $this->Number->format($bloc->ordre) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $bloc->bloc_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bloc->bloc_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bloc->bloc_id], ['confirm' => __('Are you sure you want to delete # {0}?', $bloc->bloc_id)]) ?>
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
