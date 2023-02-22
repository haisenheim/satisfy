<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Parametres'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="parametres form large-9 medium-8 columns content">
    <?= $this->Form->create($parametre) ?>
    <fieldset>
        <legend><?= __('Add Parametre') ?></legend>
        <?php
            echo $this->Form->input('nom');
            echo $this->Form->input('telephone');
            echo $this->Form->input('adresse');
            echo $this->Form->input('presentation');
            echo $this->Form->input('photo');
            echo $this->Form->input('email');
            echo $this->Form->input('logo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
