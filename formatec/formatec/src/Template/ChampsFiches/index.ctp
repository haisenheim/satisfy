<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Champs Fich'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fiches'), ['controller' => 'Fiches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fich'), ['controller' => 'Fiches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Champs'), ['controller' => 'Champs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Champ'), ['controller' => 'Champs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="champsFiches index large-9 medium-8 columns content">
    <h3><?= __('Champs Fiches') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('fiche_id') ?></th>
                <th><?= $this->Paginator->sort('champ_id') ?></th>
                <th><?= $this->Paginator->sort('tmc') ?></th>
                <th><?= $this->Paginator->sort('mc') ?></th>
                <th><?= $this->Paginator->sort('sat') ?></th>
                <th><?= $this->Paginator->sort('tsat') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($champsFiches as $champsFich): ?>
            <tr>
                <td><?= $this->Number->format($champsFich->id) ?></td>
                <td><?= $champsFich->has('fich') ? $this->Html->link($champsFich->fich->id, ['controller' => 'Fiches', 'action' => 'view', $champsFich->fich->id]) : '' ?></td>
                <td><?= $champsFich->has('champ') ? $this->Html->link($champsFich->champ->name, ['controller' => 'Champs', 'action' => 'view', $champsFich->champ->id]) : '' ?></td>
                <td><?= $this->Number->format($champsFich->tmc) ?></td>
                <td><?= $this->Number->format($champsFich->mc) ?></td>
                <td><?= $this->Number->format($champsFich->sat) ?></td>
                <td><?= $this->Number->format($champsFich->tsat) ?></td>
                <td><?= h($champsFich->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $champsFich->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $champsFich->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $champsFich->id], ['confirm' => __('Are you sure you want to delete # {0}?', $champsFich->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
