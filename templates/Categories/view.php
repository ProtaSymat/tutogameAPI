<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->categorie_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->categorie_id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->categorie_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categories view content">
            <h3><?= h($category->categorie_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Categorie Name') ?></th>
                    <td><?= h($category->categorie_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Categorie Id') ?></th>
                    <td><?= $this->Number->format($category->categorie_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
