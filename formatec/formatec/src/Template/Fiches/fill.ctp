
<div class="row">
    <input type="hidden" value="<?= $token ?>" id="csrf"/>
    <input type="hidden" value="<?= $fich->id ?>" id="fich"/>
    <div >
        <h4 class="page-header">Edition de la fiche</h4>

        <div class="col-lg-8 col-md-8 col-xs-8">
           <?php if($fr): ?> <h6>Intitule de la formation : &nbsp; <?= $fich->session->formation->intitule ?></h6><?php else:  ?><h6>Cours Title : &nbsp; <?= $fich->session->formation->name ?></h6><?php endif ; ?>
            <?php if($fr): ?> <h6>Nom du formateur : &nbsp; <?= $fich->session->formateur->nom." ".$fich->session->formateur->prenom ?>  </h6><?php else: ?><h6>Trainer : &nbsp; <?= $fich->session->formateur->nom." ".$fich->session->formateur->prenom ?></h6><?php endif ; ?>
            <?php if($fr): ?> Societe d'appartenance :<?php else:  ?>Company name :<?php endif; ?><select name="client" id="client">
                    <option value="0"><?php if($fr): ?>Selectionner votre Societe<?php else:  ?>Select Your Company<?php endif; ?></option>
                    <?php foreach($clients as $client):  ?>
                        <option value="<?= $client->id ?>"><?= $client->nom ?></option>
                    <?php endforeach; ?>
                </select>
        </div>
        <div class="col-lg-3 col-md-3 col-xs-3"><h6><?php if($fr): ?>Date de fin de formation: <?php else:  ?>End Date :<?php endif; ?><?= $fich->session->dt_fin->i18nFormat('dd-MM-yyyy') ?></h6></div>
        <div class="col-lg-1 col-md-1 col-xs-1"><form method="post"><input type="hidden" name="_csrfToken" value="<?= $token ?>" id="csrf"/><input type="hidden" name="lang" value="<?= !$fr ?>"/><button type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-flag"></i> &nbsp; <?= $fr?"Eng":"Fr" ?></button></form></div>
    </div>
</div>
<hr/>
        <div class="" style="border: solid 1px gray; border-radius: 2px">

            <table id="tab-fiches" class="table table-bordered table-striped" style="">
                <thead>
                <tr style="min-height: 300px">
                    <th style="border: none"></th>
                    <th  style="background-color: #0097a7; color: #ffffff"><?php if($fr): ?>Tres mecontent<?php else:  ?>Very discontented<?php endif; ?></th>
                    <th  style="background-color: #0097a7; color: #ffffff"><?php if($fr): ?>Mecontent<?php else:  ?>Discontented<?php endif; ?></th>
                    <th  style="background-color: #0097a7; color: #ffffff"><?php if($fr): ?>Satisfait<?php else:  ?>Happy<?php endif; ?></th>
                    <th  style="background-color: #0097a7; color: #ffffff"><?php if($fr): ?>Tres satisfait<?php else:  ?>Very happy<?php endif; ?></th>

                </tr>
                </thead>
                <tbody>
                <?php foreach($categories as $cat): ?>
                 <tr><td style="color: #003399; font-weight: bold; text-transform: capitalize; font-size: 16px"><?php if($fr): ?><?= $cat->nom ?><?php else: ?><?= $cat->name ?><?php endif; ?></td></tr>
                    <?php foreach($cat->champs as $champ): ?>

                            <tr class="do">

                               <?php if($fr): ?> <td><?= $champ->nom ?></td><?php else: ?><td><?= $champ->name ?><?php endif; ?>
                                <td ><input name="<?= $champ->id ?>" type="radio" value="tmc" /></td>
                                <td ><input name="<?= $champ->id ?>" type="radio" value="mc"  /></td>
                                <td ><input name="<?= $champ->id ?>" type="radio" value="sat" /></td>
                                <td ><input name="<?= $champ->id ?>" type="radio" value="tsat" /></td>
                            </tr>


                    <?php endforeach ?>
                <?php endforeach ?>
                </tbody>
            </table>


        </div>
<hr/>
<div class="row" style="margin-top: 10px; margin-bottom: 40px; border: solid #d3d3d3 1px; border-radius: 5px; padding-bottom: 20px; padding-top: 20px">

    <div class="col-lg-offset-1 col-md-offset-1 col-lg-3 col-md-3">
        <form action="<?= $this->Url->build(['controller'=>'Fiches','action'=>'cancel', $fich->id]) ?>" method="get">
            <input type="hidden" value="<?= $fich->id ?>" id="fich"/>

            <button class="btn btn-danger" type="submit"><?php if($fr): ?>Abandonner <?php else: ?>Abort<?php endif; ?>&nbsp; <i class="glyphicon glyphicon-remove-sign"></i></button>

        </form>

    </div>

    <div class="col-lg-offset-5 col-md-offset-5 col-lg-3 col-md-3">
        <button id="save-fiche" class="btn btn-success"><i class="glyphicon glyphicon-floppy-save"></i>&nbsp;<?php if($fr): ?>Valider <?php else: ?>Save<?php endif; ?> </button>
    </div>

   <!-- <div class="col-lg-offset-6 col-md-offset-6 col-lg-2 col-md-2">
        <button class="btn btn-primary">Suivant &nbsp; <i class="glyphicon glyphicon-arrow-right"></i></button>
    </div>-->
</div>

<script>
    var saveUrl = "<?= $this->Url->build(['controller' => 'Fiches', 'action' => 'saveJson']) ?>";
    var redirectUrl = "<?= $this->Url->build(['controller' => 'Front', 'action' => 'index']) ?>";



    $('#save-fiche').click(function(e){
        e.preventDefault();
        var tabf=$('#tab-fiches');
        var trs = tabf.find('.do');
        var client = $('#client').val();
        var fich = $('#fich').val();
        if((trs.length > trs.find('input:checked').length) || (client == 0) ){
            alert('Cette fiche n\'est pas entierement remplie. Veuillez revoir les champs s\'il vous plait !!!')
        }else{

            var data = [];

            var elt = {};

            trs.find('input:checked').each(function(){
                elt = {};
                elt.champ = $(this).prop('name');
                elt.choix = $(this).val();
                //console.log($(this).val()+" "+$(this).prop('name'))
                data.push(elt);


            });

            console.log(data);
            console.log(client);

                $.ajax({
                    url:saveUrl,
                    type:'Post',
                    dataType:'JSON',
                    data:{_csrf:$('#csrf').val(), donnees:data, client:client, fich:fich},
                    beforeSend:function(xhr){
                        xhr.setRequestHeader('X-CSRF-Token',$('#csrf').val())
                    },
                    success: function(data){
                        window.location.replace(redirectUrl);
                    }

                });

        }
    });
</script>