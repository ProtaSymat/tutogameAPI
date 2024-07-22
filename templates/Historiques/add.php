<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Historique $historique
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $tutoriels
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Historiques'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="historiques form content">
            <?= $this->Form->create($historique) ?>
            <fieldset>
                <legend><?= __('Add Historique') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('tutoriel_id', ['options' => $tutoriels]);
                    echo $this->Form->control('quiz_id');
                    echo $this->Form->control('date_acces');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
