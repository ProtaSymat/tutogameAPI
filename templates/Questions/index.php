<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Question> $questions
 */
?>
<div class="questions index content">
    <?= $this->Html->link(__('New Question'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Questions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('question_id') ?></th>
                    <th><?= $this->Paginator->sort('quiz_id') ?></th>
                    <th><?= $this->Paginator->sort('reponse_correcte') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($questions as $question): ?>
                <tr>
                    <td><?= $this->Number->format($question->question_id) ?></td>
                    <td><?= $this->Number->format($question->quiz_id) ?></td>
                    <td><?= h($question->reponse_correcte) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $question->question_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $question->question_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $question->question_id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->question_id)]) ?>
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
