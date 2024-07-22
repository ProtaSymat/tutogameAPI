<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Chapitre> $chapitres
 */
?>
<div class="chapitres index content">
    <?= $this->Html->link(__('New Chapitre'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Chapitres') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('chapitre_id') ?></th>
                    <th><?= $this->Paginator->sort('categorie_id') ?></th>
                    <th><?= $this->Paginator->sort('titre') ?></th>
                    <th><?= $this->Paginator->sort('ordre') ?></th>
                    <th><?= $this->Paginator->sort('chapitre_img') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($chapitres as $chapitre): ?>
                <tr>
                    <td><?= $this->Number->format($chapitre->chapitre_id) ?></td>
                    <td><?= $chapitre->has('category') ? $this->Html->link($chapitre->category->categorie_name, ['controller' => 'Categories', 'action' => 'view', $chapitre->category->categorie_id]) : '' ?></td>
                    <td><?= h($chapitre->titre) ?></td>
                    <td><?= $this->Number->format($chapitre->ordre) ?></td>
                    <td><?= h($chapitre->chapitre_img) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $chapitre->chapitre_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $chapitre->chapitre_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $chapitre->chapitre_id], ['confirm' => __('Are you sure you want to delete # {0}?', $chapitre->chapitre_id)]) ?>
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
