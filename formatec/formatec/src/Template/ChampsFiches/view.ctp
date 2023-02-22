<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Champs Fich'), ['action' => 'edit', $champsFich->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Champs Fich'), ['action' => 'delete', $champsFich->id], ['confirm' => __('Are you sure you want to delete # {0}?', $champsFich->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Champs Fiches'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Champs Fich'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fiches'), ['controller' => 'Fiches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fich'), ['controller' => 'Fiches', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Champs'), ['controller' => 'Champs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Champ'), ['controller' => 'Champs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="champsFiches view large-9 medium-8 columns content">
    <h3><?= h($champsFich->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Fich') ?></th>
            <td><?= $champsFich->has('fich') ? $this->Html->link($champsFich->fich->id, ['controller' => 'Fiches', 'action' => 'view', $champsFich->fich->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Champ') ?></th>
            <td><?= $champsFich->has('champ') ? $this->Html->link($champsFich->champ->name, ['controller' => 'Champs', 'action' => 'view', $champsFich->champ->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($champsFich->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tmc') ?></th>
            <td><?= $this->Number->format($champsFich->tmc) ?></td>
        </tr>
        <tr>
            <th><?= __('Mc') ?></th>
            <td><?= $this->Number->format($champsFich->mc) ?></td>
        </tr>
        <tr>
            <th><?= __('Sat') ?></th>
            <td><?= $this->Number->format($champsFich->sat) ?></td>
        </tr>
        <tr>
            <th><?= __('Tsat') ?></th>
            <td><?= $this->Number->format($champsFich->tsat) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($champsFich->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Commentaire') ?></h4>
        <?= $this->Text->autoParagraph(h($champsFich->commentaire)); ?>
    </div>
</div>
