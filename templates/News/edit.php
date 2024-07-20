<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\News $news
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $news->news_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $news->news_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List News'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="news form content">
            <?= $this->Form->create($news) ?>
            <fieldset>
                <legend><?= __('Edit News') ?></legend>
                <?php
                    echo $this->Form->control('news_titre');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('news_img');
                    echo $this->Form->control('news_content');
                    echo $this->Form->control('news_excerpt');
                    echo $this->Form->control('news_created');
                    echo $this->Form->control('news_modified');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
