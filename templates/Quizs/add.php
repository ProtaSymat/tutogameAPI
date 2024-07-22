<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quiz $quiz
 * @var \Cake\Collection\CollectionInterface|string[] $chapitres
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Quizs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="quizs form content">
            <?= $this->Form->create($quiz) ?>
            <fieldset>
                <legend><?= __('Add Quiz') ?></legend>
                <?php
                    echo $this->Form->control('chapitre_id', ['options' => $chapitres]);
                    echo $this->Form->control('titre');
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
