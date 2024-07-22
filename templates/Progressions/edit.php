<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Progression $progression
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $chapitres
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $progression->progression_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $progression->progression_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Progressions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="progressions form content">
            <?= $this->Form->create($progression) ?>
            <fieldset>
                <legend><?= __('Edit Progression') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('chapitre_id', ['options' => $chapitres]);
                    echo $this->Form->control('last_tutoriel_id');
                    echo $this->Form->control('chapitre_termine');
                    echo $this->Form->control('date_derniere_progression');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
