<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reponse $reponse
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Reponse'), ['action' => 'edit', $reponse->reponse_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Reponse'), ['action' => 'delete', $reponse->reponse_id], ['confirm' => __('Are you sure you want to delete # {0}?', $reponse->reponse_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Reponses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Reponse'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reponses view content">
            <h3><?= h($reponse->reponse_choisie) ?></h3>
            <table>
                <tr>
                    <th><?= __('Question') ?></th>
                    <td><?= $reponse->has('question') ? $this->Html->link($reponse->question->reponse_correcte, ['controller' => 'Questions', 'action' => 'view', $reponse->question->question_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $reponse->has('user') ? $this->Html->link($reponse->user->username, ['controller' => 'Users', 'action' => 'view', $reponse->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Reponse Choisie') ?></th>
                    <td><?= h($reponse->reponse_choisie) ?></td>
                </tr>
                <tr>
                    <th><?= __('Etat') ?></th>
                    <td><?= h($reponse->etat) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reponse Id') ?></th>
                    <td><?= $this->Number->format($reponse->reponse_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Reponse') ?></th>
                    <td><?= h($reponse->date_reponse) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
