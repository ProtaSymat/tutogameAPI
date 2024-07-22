<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chapitre $chapitre
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Chapitre'), ['action' => 'edit', $chapitre->chapitre_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Chapitre'), ['action' => 'delete', $chapitre->chapitre_id], ['confirm' => __('Are you sure you want to delete # {0}?', $chapitre->chapitre_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Chapitres'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Chapitre'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="chapitres view content">
            <h3><?= h($chapitre->titre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $chapitre->has('category') ? $this->Html->link($chapitre->category->categorie_name, ['controller' => 'Categories', 'action' => 'view', $chapitre->category->categorie_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Titre') ?></th>
                    <td><?= h($chapitre->titre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Chapitre Img') ?></th>
                    <td><?= h($chapitre->chapitre_img) ?></td>
                </tr>
                <tr>
                    <th><?= __('Chapitre Id') ?></th>
                    <td><?= $this->Number->format($chapitre->chapitre_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ordre') ?></th>
                    <td><?= $this->Number->format($chapitre->ordre) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($chapitre->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
