
<div class="row" style="margin-bottom: 30px; margin-top:1px;">
    <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
        <div style="border: solid blue 1px; border-radius: 5px; padding: 50px; padding-top: 20px; ">

            <h3 class="page-header">Catalogue des formations</h3>

    <table cellpadding="0" cellspacing="0" class="table table-bordered">
        <thead>
            <tr>

                <th>Code la formation</th>
                <th>Intitule en francais</th>
                <th>Intitule en anglais</th>
                <th class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formations as $formation): ?>
            <tr>

                <td><?= h($formation->code) ?></td>
                <td><?= h($formation->intitule) ?></td>
                <td><?= h($formation->name) ?></td>
                <td class="actions">

                    <?= $this->Html->link(__(''), ['action' => 'view', $formation->id],['class'=>"glyphicon glyphicon-eye-open",'title'=>'Afficher']) ?> |
                    <?= $this->Html->link(__(''), ['action' => 'edit', $formation->id],['class'=>"glyphicon glyphicon-pencil",'title'=>'Modifier']) ?>|
                    <?= $this->Form->postLink(__(""), ['action' => 'delete', $formation->id], ['confirm' => __('Voulez-vous vraiment supprimer la Formation # {0}?', $formation->id),'class'=>"glyphicon glyphicon-remove",'title'=>'Supprimer']) ?>
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
