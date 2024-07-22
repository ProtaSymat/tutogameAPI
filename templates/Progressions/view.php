<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Progression $progression
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Progression'), ['action' => 'edit', $progression->progression_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Progression'), ['action' => 'delete', $progression->progression_id], ['confirm' => __('Are you sure you want to delete # {0}?', $progression->progression_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Progressions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Progression'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="progressions view content">
            <h3><?= h($progression->progression_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $progression->has('user') ? $this->Html->link($progression->user->username, ['controller' => 'Users', 'action' => 'view', $progression->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Chapitre') ?></th>
                    <td><?= $progression->has('chapitre') ? $this->Html->link($progression->chapitre->titre, ['controller' => 'Chapitres', 'action' => 'view', $progression->chapitre->chapitre_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Progression Id') ?></th>
                    <td><?= $this->Number->format($progression->progression_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Tutoriel Id') ?></th>
                    <td><?= $this->Number->format($progression->last_tutoriel_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Derniere Progression') ?></th>
                    <td><?= h($progression->date_derniere_progression) ?></td>
                </tr>
                <tr>
                    <th><?= __('Chapitre Termine') ?></th>
                    <td><?= $progression->chapitre_termine ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
