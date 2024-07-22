<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chapitre $chapitre
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $chapitre->chapitre_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $chapitre->chapitre_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Chapitres'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="chapitres form content">
            <?= $this->Form->create($chapitre) ?>
            <fieldset>
                <legend><?= __('Edit Chapitre') ?></legend>
                <?php
                    echo $this->Form->control('categorie_id', ['options' => $categories]);
                    echo $this->Form->control('titre');
                    echo $this->Form->control('description');
                    echo $this->Form->control('ordre');
                    echo $this->Form->control('chapitre_img');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
