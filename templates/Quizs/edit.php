<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quiz $quiz
 * @var string[]|\Cake\Collection\CollectionInterface $chapitres
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $quiz->quiz_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $quiz->quiz_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Quizs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="quizs form content">
            <?= $this->Form->create($quiz) ?>
            <fieldset>
                <legend><?= __('Edit Quiz') ?></legend>
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
