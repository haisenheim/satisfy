<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fich'), ['action' => 'edit', $fich->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fich'), ['action' => 'delete', $fich->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fich->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fiches'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fich'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Champs'), ['controller' => 'Champs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Champ'), ['controller' => 'Champs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fiches view large-9 medium-8 columns content">
    <h3><?= h($fich->code) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($fich->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Session') ?></th>
            <td><?= $fich->has('session') ? $this->Html->link($fich->session->id, ['controller' => 'Sessions', 'action' => 'view', $fich->session->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Client') ?></th>
            <td><?= $fich->has('client') ? $this->Html->link($fich->client->id, ['controller' => 'Clients', 'action' => 'view', $fich->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($fich->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Champs') ?></h4>
        <?php if (!empty($fich->champs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nom') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Sequence') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fich->champs as $champs): ?>
            <tr>
                <td><?= h($champs->id) ?></td>
                <td><?= h($champs->nom) ?></td>
                <td><?= h($champs->name) ?></td>
                <td><?= h($champs->category_id) ?></td>
                <td><?= h($champs->sequence) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Champs', 'action' => 'view', $champs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Champs', 'action' => 'edit', $champs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Champs', 'action' => 'delete', $champs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $champs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
