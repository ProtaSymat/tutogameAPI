<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question $question
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Questions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="questions form content">
            <?= $this->Form->create($question) ?>
            <fieldset>
                <legend><?= __('Add Question') ?></legend>
                <?php
                    echo $this->Form->control('quiz_id');
                    echo $this->Form->control('libelle');
                    echo $this->Form->control('reponse_correcte');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
