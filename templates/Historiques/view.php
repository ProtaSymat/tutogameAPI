<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Historique $historique
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Historique'), ['action' => 'edit', $historique->historique_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Historique'), ['action' => 'delete', $historique->historique_id], ['confirm' => __('Are you sure you want to delete # {0}?', $historique->historique_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Historiques'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Historique'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="historiques view content">
            <h3><?= h($historique->historique_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $historique->has('user') ? $this->Html->link($historique->user->username, ['controller' => 'Users', 'action' => 'view', $historique->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Tutoriel') ?></th>
                    <td><?= $historique->has('tutoriel') ? $this->Html->link($historique->tutoriel->titre, ['controller' => 'Tutoriels', 'action' => 'view', $historique->tutoriel->tutoriel_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Historique Id') ?></th>
                    <td><?= $this->Number->format($historique->historique_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quiz Id') ?></th>
                    <td><?= $this->Number->format($historique->quiz_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Acces') ?></th>
                    <td><?= h($historique->date_acces) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
