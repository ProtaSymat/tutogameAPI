<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reponse $reponse
 * @var string[]|\Cake\Collection\CollectionInterface $questions
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reponse->reponse_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reponse->reponse_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Reponses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reponses form content">
            <?= $this->Form->create($reponse) ?>
            <fieldset>
                <legend><?= __('Edit Reponse') ?></legend>
                <?php
                    echo $this->Form->control('question_id', ['options' => $questions]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('reponse_choisie');
                    echo $this->Form->control('date_reponse', ['empty' => true]);
                    echo $this->Form->control('etat');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
