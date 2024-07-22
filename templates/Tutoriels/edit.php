<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tutoriel $tutoriel
 * @var string[]|\Cake\Collection\CollectionInterface $chapitres
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tutoriel->tutoriel_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tutoriel->tutoriel_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Tutoriels'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tutoriels form content">
            <?= $this->Form->create($tutoriel) ?>
            <fieldset>
                <legend><?= __('Edit Tutoriel') ?></legend>
                <?php
                    echo $this->Form->control('chapitre_id', ['options' => $chapitres]);
                    echo $this->Form->control('titre');
                    echo $this->Form->control('description');
                    echo $this->Form->control('date_publication');
                    echo $this->Form->control('ordre');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
