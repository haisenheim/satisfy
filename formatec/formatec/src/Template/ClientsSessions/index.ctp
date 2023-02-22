<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Clients Session'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clientsSessions index large-9 medium-8 columns content">
    <h3><?= __('Clients Sessions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('client_id') ?></th>
                <th><?= $this->Paginator->sort('session_id') ?></th>
                <th><?= $this->Paginator->sort('nombre') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientsSessions as $clientsSession): ?>
            <tr>
                <td><?= $this->Number->format($clientsSession->id) ?></td>
                <td><?= $clientsSession->has('client') ? $this->Html->link($clientsSession->client->id, ['controller' => 'Clients', 'action' => 'view', $clientsSession->client->id]) : '' ?></td>
                <td><?= $clientsSession->has('session') ? $this->Html->link($clientsSession->session->id, ['controller' => 'Sessions', 'action' => 'view', $clientsSession->session->id]) : '' ?></td>
                <td><?= $this->Number->format($clientsSession->nombre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $clientsSession->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clientsSession->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clientsSession->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientsSession->id)]) ?>
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
