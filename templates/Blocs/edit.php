<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bloc $bloc
 * @var string[]|\Cake\Collection\CollectionInterface $tutoriels
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bloc->bloc_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bloc->bloc_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Blocs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="blocs form content">
            <?= $this->Form->create($bloc) ?>
            <fieldset>
                <legend><?= __('Edit Bloc') ?></legend>
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
