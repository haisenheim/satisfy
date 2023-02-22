<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Champ'), ['action' => 'edit', $champ->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Champ'), ['action' => 'delete', $champ->id], ['confirm' => __('Are you sure you want to delete # {0}?', $champ->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Champs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Champ'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fiches'), ['controller' => 'Fiches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fich'), ['controller' => 'Fiches', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="champs view large-9 medium-8 columns content">
    <h3><?= h($champ->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nom') ?></th>
            <td><?= h($champ->nom) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($champ->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Category') ?></th>
            <td><?= $champ->has('category') ? $this->Html->link($champ->category->name, ['controller' => 'Categories', 'action' => 'view', $champ->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($champ->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Sequence') ?></th>
            <td><?= $this->Number->format($champ->sequence) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Fiches') ?></h4>
        <?php if (!empty($champ->fiches)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Session Id') ?></th>
                <th><?= __('Client Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($champ->fiches as $fiches): ?>
            <tr>
                <td><?= h($fiches->id) ?></td>
                <td><?= h($fiches->code) ?></td>
                <td><?= h($fiches->session_id) ?></td>
                <td><?= h($fiches->client_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fiches', 'action' => 'view', $fiches->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fiches', 'action' => 'edit', $fiches->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fiches', 'action' => 'delete', $fiches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fiches->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
