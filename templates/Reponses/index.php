<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Reponse> $reponses
 */
?>
<div class="reponses index content">
    <?= $this->Html->link(__('New Reponse'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Reponses') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('reponse_id') ?></th>
                    <th><?= $this->Paginator->sort('question_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('reponse_choisie') ?></th>
                    <th><?= $this->Paginator->sort('date_reponse') ?></th>
                    <th><?= $this->Paginator->sort('etat') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reponses as $reponse): ?>
                <tr>
                    <td><?= $this->Number->format($reponse->reponse_id) ?></td>
                    <td><?= $reponse->has('question') ? $this->Html->link($reponse->question->reponse_correcte, ['controller' => 'Questions', 'action' => 'view', $reponse->question->question_id]) : '' ?></td>
                    <td><?= $reponse->has('user') ? $this->Html->link($reponse->user->username, ['controller' => 'Users', 'action' => 'view', $reponse->user->user_id]) : '' ?></td>
                    <td><?= h($reponse->reponse_choisie) ?></td>
                    <td><?= h($reponse->date_reponse) ?></td>
                    <td><?= h($reponse->etat) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $reponse->reponse_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reponse->reponse_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reponse->reponse_id], ['confirm' => __('Are you sure you want to delete # {0}?', $reponse->reponse_id)]) ?>
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
