<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quiz $quiz
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Quiz'), ['action' => 'edit', $quiz->quiz_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Quiz'), ['action' => 'delete', $quiz->quiz_id], ['confirm' => __('Are you sure you want to delete # {0}?', $quiz->quiz_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Quizs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Quiz'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="quizs view content">
            <h3><?= h($quiz->titre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Chapitre') ?></th>
                    <td><?= $quiz->has('chapitre') ? $this->Html->link($quiz->chapitre->titre, ['controller' => 'Chapitres', 'action' => 'view', $quiz->chapitre->chapitre_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Titre') ?></th>
                    <td><?= h($quiz->titre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($quiz->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quiz Id') ?></th>
                    <td><?= $this->Number->format($quiz->quiz_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
