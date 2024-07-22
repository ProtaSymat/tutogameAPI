<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $article->articles_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $article->articles_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Articles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="articles form content">
            <?= $this->Form->create($article) ?>
            <fieldset>
                <legend><?= __('Edit Article') ?></legend>
                <?php
                    echo $this->Form->control('articles_titre');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('articles_img');
                    echo $this->Form->control('articles_content');
                    echo $this->Form->control('articles_excerpt');
                    echo $this->Form->control('articles_created');
                    echo $this->Form->control('articles_modified');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
