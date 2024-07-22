<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bloc $bloc
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Bloc'), ['action' => 'edit', $bloc->bloc_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Bloc'), ['action' => 'delete', $bloc->bloc_id], ['confirm' => __('Are you sure you want to delete # {0}?', $bloc->bloc_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Blocs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Bloc'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="blocs view content">
            <h3><?= h($bloc->type_contenue) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tutoriel') ?></th>
                    <td><?= $bloc->has('tutoriel') ? $this->Html->link($bloc->tutoriel->titre, ['controller' => 'Tutoriels', 'action' => 'view', $bloc->tutoriel->tutoriel_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Type Contenue') ?></th>
                    <td><?= h($bloc->type_contenue) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bloc Id') ?></th>
                    <td><?= $this->Number->format($bloc->bloc_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ordre') ?></th>
                    <td><?= $this->Number->format($bloc->ordre) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Contenue') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($bloc->contenue)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
