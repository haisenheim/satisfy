<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $formateur->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $formateur->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Formateurs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formateurs form large-9 medium-8 columns content">
    <?= $this->Form->create($formateur) ?>
    <fieldset>
        <legend><?= __('Edit Formateur') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('nom');
            echo $this->Form->input('prenom');
            echo $this->Form->input('telephone');
            echo $this->Form->input('email');
            echo $this->Form->input('adresse');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
