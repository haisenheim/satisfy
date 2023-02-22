
<div class="row">
    <div >
        <h4 class="page-header">Edition de la fiche</h4>

        <div class="col-lg-8 col-md-8 col-xs-8">
            <h6>Intitule de la formation : &nbsp; <?= $fich->session->formation->intitule ?></h6>
            <h6>Nom du formateur : &nbsp; <?= $fich->session->formateur->nom." ".$fich->session->formateur->prenom ?>  </h6>
            Societe d'appartenance :<select name="client" id="">
                    <option value="">Selectionner votre Societe</option>
                    <?php foreach($clients as $client):  ?>
                        <option value="<?= $client->id ?>"><?= $client->nom ?></option>
                    <?php endforeach; ?>
                </select>
        </div>
        <div class="col-lg-3 col-md-3 col-xs-3"><h6>Date de fin de formation: <?= $fich->session->dt_fin->i18nFormat('dd-MM-yyyy') ?></h6></div>
    </div>
</div>
<hr/>
        <div class="" style="border: solid 1px gray; border-radius: 2px">

            <table class="table table-bordered table-striped" style="">
                <thead>
                <tr style="min-height: 300px">
                    <th style="border: none"></th>
                    <th  style="background-color: #0097a7">Tres mecontent</th>
                    <th style="background-color: #0097a7">Mecontent</th>
                    <th style="background-color: #0097a7">Satisfait</th>
                    <th style="background-color: #0097a7">Tres Satisfait</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($categories as $cat): ?>
                 <tr><td style="color: #003399; font-weight: bold; text-transform: capitalize; font-size: 16px"><?= $cat->nom ?></td></tr>
                    <?php foreach($cat->champs as $champ): ?>

                            <tr class="btn-group" data-toggle="buttons">

                                <td><?= $champ->nom ?></td>
                                <td class="btn"><input name="rep" type="radio" value="tmc" />Tres Mecontent</td>
                                <td class="btn"><input name="rep" type="radio" value="mc"  />Mecontent</td>
                                <td class="btn"><input name="rep" type="radio" value="sat" />Satisfait</td>
                                <td class="btn"><input name="rep" type="radio" value="tsat" />Tres Satisfait</td>
                            </tr>


                    <?php endforeach ?>
                <?php endforeach ?>
                </tbody>
            </table>


        </div>

