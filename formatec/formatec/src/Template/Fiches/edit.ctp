<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fich->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fich->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fiches'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Champs'), ['controller' => 'Champs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Champ'), ['controller' => 'Champs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fiches form large-9 medium-8 columns content">
    <?= $this->Form->create($fich) ?>
    <fieldset>
        <legend><?= __('Edit Fich') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('session_id', ['options' => $sessions]);
            echo $this->Form->input('client_id', ['options' => $clients]);
            echo $this->Form->input('champs._ids', ['options' => $champs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
