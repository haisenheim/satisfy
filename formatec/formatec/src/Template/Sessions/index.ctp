<div class="row" style="margin-bottom: 30px; margin-top:1px;">
    <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
        <div style="border: solid blue 1px; border-radius: 5px; padding: 50px; padding-top: 20px; ">

            <h3 class="page-header">Historique des sessions</h3>

    <div class="row " style="position: relative; margin-right: 30px">
        <form action="<?= $this->Url->build(['controller'=>'Sessions','action'=>'index']) ?>" method="get" class="form-horizontal pull-right">
            <input type="text" id="debut" class="form-controlx datepicker" placeholder="debut ..." name="debut"/> &nbsp;&nbsp;&nbsp;
            <input type="text" id="fin" class="form-controlx datepicker" placeholder="fin ..." name="fin"/>&nbsp;&nbsp;&nbsp;
            <button class="btn btn-primary" type="submit">Charger</button>
        </form>
    </div>

    <hr/>

    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Code</th>
                <th>debut</th>
                <th>Fin</th>
                <th>Formateur</th>
                <th>Formation</th>
                <th>N. Part.</th>
                <th>Creation</th>
                <th>Par</th>
                <th>Statut</th>
                <th class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sessions as $session): ?>
                <?php if($session->has('clients')): ?>
                    <?php $somme = 0;
                        foreach($session->clients as $client){
                            $somme = $somme + $client->_joinData->nombre;
                        }
                        $session->nb_participants = $somme;
                    ?>
                 <?php endif; ?>
            <tr>

                <td><?= h($session->code) ?></td>
                <td><?= $session->dt_debut?$session->dt_debut->i18nFormat('dd/MM/yy'):'-' ?></td>
                <td><?= $session->dt_fin?$session->dt_fin->i18nFormat('dd/MM/yy'): '-' ?></td>
                <td><?= $session->has('formateur') ? $this->Html->link($session->formateur->nom."  ".$session->formateur->prenom, ['controller' => 'Formateurs', 'action' => 'view', $session->formateur->id]) : '' ?></td>
                <td><?= $session->has('formation') ? $this->Html->link($session->formation->intitule, ['controller' => 'Formations', 'action' => 'view', $session->formation->id]) : '' ?></td>
                <td><?= $this->Number->format($session->nb_participants) ?></td>
                <td><?= $session->created->i18nFormat('dd-MM-yyyy HH:mm') ?></td>
                <td><?= $session->has('user') ? $this->Html->link($session->user->username, ['controller' => 'Users', 'action' => 'view', $session->user->id]) : '' ?></td>
                <td><?= $session->statut?'<span class="btn btn-success"><i class="glyphicon glyphicon-arrow-up"></i></span>':'<span class="btn btn-danger"><i class="glyphicon glyphicon-arrow-up"></i></span>' ?></td>
                <td class="actions">
                   <?= $this->Html->link(__(''), ['action' => 'view', $session->id],['class'=>"glyphicon glyphicon-eye-open",'title'=>'Afficher']) ?> |
                    <?= $this->Html->link(__(''), ['action' => 'edit', $session->id],['class'=>"glyphicon glyphicon-pencil",'title'=>'Modifier']) ?>|
                    <?= $this->Form->postLink(__(""), ['action' => 'delete', $session->id], ['confirm' => __('Voulez-vous vraiment supprimer la Session # {0}?', $session->id),'class'=>"glyphicon glyphicon-remove",'title'=>'Supprimer']) ?>
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


<script src="<?= $this->request->webroot ?>css/bower_components/moment/min/moment.min.js"></script>
<script src="<?= $this->request->webroot ?>css/bower_components/moment/locale/fr.js"></script>
<script src="<?= $this->request->webroot ?>css/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script>
    $('.datepicker').datetimepicker({
        locale: 'fr',
        format:'YYYY-MM-DD'
    });
</script>

<script>
    $('#datepicker1').datetimepicker({
        locale:'fr',
        format:'YYYY-MM-DD'
    });
    $('#datepicker2').datetimepicker(
        {
            locale:'fr',
            format:'YYYY-MM-DD'
        }
    );
</script>