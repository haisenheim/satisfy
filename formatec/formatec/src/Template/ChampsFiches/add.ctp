<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Champs Fiches'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fiches'), ['controller' => 'Fiches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fich'), ['controller' => 'Fiches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Champs'), ['controller' => 'Champs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Champ'), ['controller' => 'Champs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="champsFiches form large-9 medium-8 columns content">
    <?= $this->Form->create($champsFich) ?>
    <fieldset>
        <legend><?= __('Add Champs Fich') ?></legend>
        <?php
            echo $this->Form->input('fiche_id', ['options' => $fiches]);
            echo $this->Form->input('champ_id', ['options' => $champs]);
            echo $this->Form->input('tmc');
            echo $this->Form->input('mc');
            echo $this->Form->input('sat');
            echo $this->Form->input('tsat');
            echo $this->Form->input('commentaire');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
