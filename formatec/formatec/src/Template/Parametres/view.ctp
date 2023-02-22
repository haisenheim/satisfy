<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Parametre'), ['action' => 'edit', $parametre->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Parametre'), ['action' => 'delete', $parametre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parametre->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Parametres'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parametre'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="parametres view large-9 medium-8 columns content">
    <h3><?= h($parametre->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nom') ?></th>
            <td><?= h($parametre->nom) ?></td>
        </tr>
        <tr>
            <th><?= __('Telephone') ?></th>
            <td><?= h($parametre->telephone) ?></td>
        </tr>
        <tr>
            <th><?= __('Adresse') ?></th>
            <td><?= h($parametre->adresse) ?></td>
        </tr>
        <tr>
            <th><?= __('Photo') ?></th>
            <td><?= h($parametre->photo) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($parametre->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Logo') ?></th>
            <td><?= h($parametre->logo) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($parametre->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Presentation') ?></h4>
        <?= $this->Text->autoParagraph(h($parametre->presentation)); ?>
    </div>
</div>
