<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question $question
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Question'), ['action' => 'edit', $question->question_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Question'), ['action' => 'delete', $question->question_id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->question_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Questions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Question'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="questions view content">
            <h3><?= h($question->reponse_correcte) ?></h3>
            <table>
                <tr>
                    <th><?= __('Reponse Correcte') ?></th>
                    <td><?= h($question->reponse_correcte) ?></td>
                </tr>
                <tr>
                    <th><?= __('Question Id') ?></th>
                    <td><?= $this->Number->format($question->question_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quiz Id') ?></th>
                    <td><?= $this->Number->format($question->quiz_id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Libelle') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($question->libelle)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
