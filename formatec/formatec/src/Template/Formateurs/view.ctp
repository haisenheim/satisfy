<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formateur'), ['action' => 'edit', $formateur->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formateur'), ['action' => 'delete', $formateur->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formateur->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formateurs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formateur'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formateurs view large-9 medium-8 columns content">
    <h3><?= h($formateur->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($formateur->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Nom') ?></th>
            <td><?= h($formateur->nom) ?></td>
        </tr>
        <tr>
            <th><?= __('Prenom') ?></th>
            <td><?= h($formateur->prenom) ?></td>
        </tr>
        <tr>
            <th><?= __('Telephone') ?></th>
            <td><?= h($formateur->telephone) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($formateur->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Adresse') ?></th>
            <td><?= h($formateur->adresse) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($formateur->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sessions') ?></h4>
        <?php if (!empty($formateur->sessions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Dt Debut') ?></th>
                <th><?= __('Dt Fin') ?></th>
                <th><?= __('Formateur Id') ?></th>
                <th><?= __('Formation Id') ?></th>
                <th><?= __('Nb Participants') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Statut') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($formateur->sessions as $sessions): ?>
            <tr>
                <td><?= h($sessions->id) ?></td>
                <td><?= h($sessions->code) ?></td>
                <td><?= h($sessions->dt_debut) ?></td>
                <td><?= h($sessions->dt_fin) ?></td>
                <td><?= h($sessions->formateur_id) ?></td>
                <td><?= h($sessions->formation_id) ?></td>
                <td><?= h($sessions->nb_participants) ?></td>
                <td><?= h($sessions->created) ?></td>
                <td><?= h($sessions->user_id) ?></td>
                <td><?= h($sessions->statut) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sessions', 'action' => 'view', $sessions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sessions', 'action' => 'edit', $sessions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sessions', 'action' => 'delete', $sessions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sessions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
