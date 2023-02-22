<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Parametre'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parametres index large-9 medium-8 columns content">
    <h3><?= __('Parametres') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nom') ?></th>
                <th><?= $this->Paginator->sort('telephone') ?></th>
                <th><?= $this->Paginator->sort('adresse') ?></th>
                <th><?= $this->Paginator->sort('photo') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('logo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parametres as $parametre): ?>
            <tr>
                <td><?= $this->Number->format($parametre->id) ?></td>
                <td><?= h($parametre->nom) ?></td>
                <td><?= h($parametre->telephone) ?></td>
                <td><?= h($parametre->adresse) ?></td>
                <td><?= h($parametre->photo) ?></td>
                <td><?= h($parametre->email) ?></td>
                <td><?= h($parametre->logo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $parametre->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $parametre->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $parametre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parametre->id)]) ?>
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
