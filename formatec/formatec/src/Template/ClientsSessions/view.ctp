<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Clients Session'), ['action' => 'edit', $clientsSession->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Clients Session'), ['action' => 'delete', $clientsSession->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientsSession->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clients Sessions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clients Session'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clientsSessions view large-9 medium-8 columns content">
    <h3><?= h($clientsSession->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Client') ?></th>
            <td><?= $clientsSession->has('client') ? $this->Html->link($clientsSession->client->id, ['controller' => 'Clients', 'action' => 'view', $clientsSession->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Session') ?></th>
            <td><?= $clientsSession->has('session') ? $this->Html->link($clientsSession->session->id, ['controller' => 'Sessions', 'action' => 'view', $clientsSession->session->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($clientsSession->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= $this->Number->format($clientsSession->nombre) ?></td>
        </tr>
    </table>
</div>
