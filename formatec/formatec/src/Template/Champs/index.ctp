
<div class="champs index large-9 medium-8 columns content well">
    <h3 class="page-header">Catalogues des Champs des Fiches</h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered">
        <thead>
            <tr>
                <th>N</th>
                <th>Nom En Francais</th>
                <th>Nom en Anglais</th>
                <th>Categorie</th>
                <th>Numero de sequence</th>
                <th class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($champs as $champ): ?>
            <tr>
                <td><?= $this->Number->format($champ->id) ?></td>
                <td><?= h($champ->nom) ?></td>
                <td><?= h($champ->name) ?></td>
                <td><?= $champ->has('category') ? $this->Html->link($champ->category->name, ['controller' => 'Categories', 'action' => 'view', $champ->category->id]) : '' ?></td>
                <td><?= $this->Number->format($champ->sequence) ?></td>
                <td class="actions">

                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $champ->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $champ->id], ['confirm' => __('Are you sure you want to delete # {0}?', $champ->id)]) ?>
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
