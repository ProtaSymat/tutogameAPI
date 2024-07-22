<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tutoriel $tutoriel
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tutoriel'), ['action' => 'edit', $tutoriel->tutoriel_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tutoriel'), ['action' => 'delete', $tutoriel->tutoriel_id], ['confirm' => __('Are you sure you want to delete # {0}?', $tutoriel->tutoriel_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tutoriels'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tutoriel'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tutoriels view content">
            <h3><?= h($tutoriel->titre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Chapitre') ?></th>
                    <td><?= $tutoriel->has('chapitre') ? $this->Html->link($tutoriel->chapitre->titre, ['controller' => 'Chapitres', 'action' => 'view', $tutoriel->chapitre->chapitre_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Titre') ?></th>
                    <td><?= h($tutoriel->titre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tutoriel Id') ?></th>
                    <td><?= $this->Number->format($tutoriel->tutoriel_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ordre') ?></th>
                    <td><?= $this->Number->format($tutoriel->ordre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Publication') ?></th>
                    <td><?= h($tutoriel->date_publication) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($tutoriel->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
