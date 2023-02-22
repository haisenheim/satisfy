
<h3 class="page-header">Gestion des Articles</h3>

<?= $this->Html->link(' Ajouter',['controller'=>'Articles','action'=>'add'],['class'=>'btn btn-primary glyphicon glyphicon-plus']) ?>
<h1></h1>
<div >

    <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('Titre') ?></th>

                <th><?= $this->Paginator->sort('cree le') ?></th>
                <th><?= $this->Paginator->sort('Statut') ?></th>



                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $parcelle): ?>
            <tr>
                <td><?= $this->Number->format($parcelle->id) ?></td>
                <td><?= h($parcelle->name) ?></td>

                <td><?= h($parcelle->created->i18nFormat('dd-MM-yyyy')) ?></td>
                <td><?= h($parcelle->statut?'Actif':'Non Actif') ?></td>


                <td class="actions">
                    <?= $this->Html->link(__(' Voir'), ['action' => 'view', $parcelle->id],['class'=>'glyphicon glyphicon-eye-open btn btn-info']) ?>
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $parcelle->id],['class'=>'glyphicon glyphicon-pencil btn btn-primary']) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $parcelle->id],['class'=>'glyphicon glyphicon-eye-trash btn btn-danger','confirm' => __('Voulez-vous vraiment supprimer la parcelle  # {0}?', $parcelle->id)]) ?>
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
