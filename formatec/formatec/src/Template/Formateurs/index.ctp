
<div class="row" style="margin-bottom: 30px; margin-top:1px;">
    <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
        <div style="border: solid blue 1px; border-radius: 5px; padding: 50px; padding-top: 20px; ">

            <h3 class="page-header">Catalogue des formateurs</h3>

<table cellpadding="0" cellspacing="0" class="table table-bordered">
        <thead>
            <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Adresse</th>
                <th class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formateurs as $formateur): ?>
            <tr>

                <td><?= h($formateur->code) ?></td>
                <td><?= h($formateur->nom) ?></td>
                <td><?= h($formateur->prenom) ?></td>
                <td><?= h($formateur->telephone) ?></td>
                <td><?= h($formateur->email) ?></td>
                <td><?= h($formateur->adresse) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__(''), ['action' => 'view', $formateur->id],['class'=>"glyphicon glyphicon-eye-open",'title'=>'Afficher']) ?> |
                    <?= $this->Html->link(__(''), ['action' => 'edit', $formateur->id],['class'=>"glyphicon glyphicon-pencil",'title'=>'Modifier']) ?>|
                    <?= $this->Form->postLink(__(""), ['action' => 'delete', $formateur->id], ['confirm' => __('Voulez-vous vraiment supprimer le formateur # {0}?', $formateur->id),'class'=>"glyphicon glyphicon-remove",'title'=>'Supprimer']) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Precedent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Suivant') . ' >') ?>
        </ul>

    </div>
</div>
        </div>
    </div>
