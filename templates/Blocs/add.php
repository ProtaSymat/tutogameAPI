<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bloc $bloc
 * @var \Cake\Collection\CollectionInterface|string[] $tutoriels
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Blocs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="blocs form content">
            <?= $this->Form->create($bloc) ?>
            <fieldset>
                <legend><?= __('Add Bloc') ?></legend>
                <?php
                    echo $this->Form->control('tutoriel_id', ['options' => $tutoriels]);
                    echo $this->Form->control('type_contenue');
                    echo $this->Form->control('contenue');
                    echo $this->Form->control('ordre');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
