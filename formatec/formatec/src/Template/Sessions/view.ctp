<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Session'), ['action' => 'edit', $session->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Session'), ['action' => 'delete', $session->id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formateurs'), ['controller' => 'Formateurs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formateur'), ['controller' => 'Formateurs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fiches'), ['controller' => 'Fiches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fich'), ['controller' => 'Fiches', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sessions view large-9 medium-8 columns content">
    <h3><?= h($session->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($session->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Formateur') ?></th>
            <td><?= $session->has('formateur') ? $this->Html->link($session->formateur->id, ['controller' => 'Formateurs', 'action' => 'view', $session->formateur->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Formation') ?></th>
            <td><?= $session->has('formation') ? $this->Html->link($session->formation->id, ['controller' => 'Formations', 'action' => 'view', $session->formation->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $session->has('user') ? $this->Html->link($session->user->id, ['controller' => 'Users', 'action' => 'view', $session->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($session->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Nb Participants') ?></th>
            <td><?= $this->Number->format($session->nb_participants) ?></td>
        </tr>
        <tr>
            <th><?= __('Statut') ?></th>
            <td><?= $this->Number->format($session->statut) ?></td>
        </tr>
        <tr>
            <th><?= __('Dt Debut') ?></th>
            <td><?= h($session->dt_debut) ?></td>
        </tr>
        <tr>
            <th><?= __('Dt Fin') ?></th>
            <td><?= h($session->dt_fin) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($session->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Fiches') ?></h4>
        <?php if (!empty($session->fiches)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Session Id') ?></th>
                <th><?= __('Client Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($session->fiches as $fiches): ?>
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
