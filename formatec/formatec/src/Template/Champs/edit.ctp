<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $champ->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $champ->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Champs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fiches'), ['controller' => 'Fiches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fich'), ['controller' => 'Fiches', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="champs form large-9 medium-8 columns content">
    <?= $this->Form->create($champ) ?>
    <fieldset>
        <legend><?= __('Edit Champ') ?></legend>
        <?php
            echo $this->Form->input('nom');
            echo $this->Form->input('name');
            echo $this->Form->input('category_id', ['options' => $categories]);
            echo $this->Form->input('sequence');
            echo $this->Form->input('fiches._ids', ['options' => $fiches]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
