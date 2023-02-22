
<div class="row" style="margin-bottom: 30px; margin-top:1px;">
    <div class="col-lg-offset-2 col-lg-8 col-md-8">
        <div style="border: solid blue 1px; border-radius: 5px; padding: 50px; padding-top: 20px; ">

            <h3 class="page-header">Nouvelle Session</h3>


            <form method="post" action="<?= $this->Url->build(['action'=>'add']) ?>">
                <input id="csrf" name="_csrfToken" type="hidden" value="<?= $token ?>"/>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <label for="code">Code:</label>
                        <input type="text" name="code" class="form-control" id="code"/>
                    </div>
                    </div>
                <div class="row">
                    <hr/>
                    <div class="col-lg-6 col-md-6">
                        <label for="formation">Formation:</label>
                        <input type="text" name="vformation_id" class="form-control" id="formation"/>
                        <input type="hidden" name="formation_id" class="form-control" id="hformation"/>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label for="formateur">Formateur:</label>
                        <input type="text" name="vformateur_id" class="form-control" id="formateur"/>
                        <input type="hidden" name="formateur_id" class="form-control" id="hformateur"/>
                    </div>
                    </div>
                <hr/>
                <div class="row">

                    <div class="col-lg-6 col-md-6">
                        <label for="dt_debut">Date de debut:</label>
                        <input type="text" id="debut" class="form-control datepicker" placeholder="date de debut ..." name="dt_debut"/>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label for="dt_fin">Date de fin:</label>
                        <input type="text" id="fin" class="form-control datepicker" placeholder="date de fin ..." name="dt_fin"/>
                    </div>
                </div>
                <hr/>

                <h6>Effectif des participants</h6>
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <input type="text" placeholder="Selectionner une societe" class="form-control" id="client"/>
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <input type="number" placeholder="nombre" class="form-control" id="nb_p"/>
                    </div>
                    <div class="col-lg-1 col-md-1">
                        <button class="btn btn-primary" id="add-client"><i class="glyphicon glyphicon-plus"></i>&nbsp; Ajouter</button>
                    </div>

                </div>
                <hr/>
                
                <table class="table table-bordered table-striped" id="tab_p">
                    <thead>
                    <tr>
                        <th>Client</th>
                        <th>Nb. Participants</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>


                <!--<hr/>
                <label for="code">Nombre de participants:</label>
                <input type="number" name="nb_participants" class="form-control"/>-->
                <hr/>

                <label for="statut">Statut:</label>
                <input type="checkbox" name="statut" class="form-control" id="statut"/>
                <hr/>

                <button class="btn btn-success" type="submit" id="save-session"><i class="glyphicon glyphicon-floppy-save"></i> &nbsp; Enregistrer</button>
            </form>


        </div>
    </div>

</div>




<script src="<?= $this->request->webroot ?>css/bower_components/moment/min/moment.min.js"></script>
<script src="<?= $this->request->webroot ?>css/bower_components/moment/locale/fr.js"></script>
<script src="<?= $this->request->webroot ?>css/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<script src="<?= $this->request->webroot ?>js/autocomplete/base.js"></script>

<script>

    var formationsUrl = "<?= $this->Url->build(['controller' => 'Formations', 'action' => 'getAllJson']) ?>";
    var formateursUrl = "<?= $this->Url->build(['controller' => 'Formateurs', 'action' => 'getAllJson']) ?>";
    var clientsUrl = "<?= $this->Url->build(['controller' => 'Clients', 'action' => 'getAllJson']) ?>";
    var saveUrl = "<?= $this->Url->build(['controller' => 'Sessions', 'action' => 'saveJson']) ?>";
    var redirectUrl = "<?= $this->Url->build(['controller' => 'Sessions', 'action' => 'index']) ?>";

    $('.datepicker').datetimepicker({
        locale:'fr',
        format:'YYYY-MM-DD'
    });


    $('#save-session').click(function(e){
        e.preventDefault();
        var donnees = [];
        if(($('#tab_p').find('tbody').find('tr')<1) || ($('#code').val().length<1)){
            alert('Donnees de session invalides !!!');
        }else{
            $('#tab_p').find('tbody').find('tr').each(function(){
                var elt = {};
                elt.client = $(this).find('td').eq(0).text();
                elt.qt= $(this).find('td').eq(2).text();
                donnees.push(elt);
            });
            //console.log(donnees);
            var deb = $('#debut').val();
            var fn = $('#fin').val();
            var trainer = $('#hformateur').prop('value');
            var training = $('#hformation').prop('value');
            var cod = $('#code').val();
            var stat = $('#statut').is(':checked')?1:0;
            $.ajax({
                url:saveUrl,
                type:"POST",
                dataType:"JSON",
                data:{_csrf:$('#csrf').val(),donnees:donnees, code: cod, statut:stat, formation: training, formateur:trainer, debut:deb, fin:fn},
                beforeSend:function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token',$('#csrf').val())
                },
                success:function(data){
                    if(data){
                        window.location.replace(redirectUrl);
                    }
                }
            });

        }
    });


    $('#add-client').click(function(e){
        e.preventDefault();
        if($('#client').val().length < 1 || $('#nb_p').val().length<1 ){
        alert('Les donnees sont incorrectes !!!');
    }else{
            var id = $('#client').prop('name');
            var nom = $('#client').val();
            var tr;
            var tb = $("#tab_p").find('tbody');
            tr = '<tr><td style="display: none">'+ id +'</td><td>'+ nom +'</td><td>'+ $("#nb_p").val() +'</td><td class="remove btn btn-danger"><i class="glyphicon glyphicon-remove"></i></td></tr>';
            tb.append(tr);
            $('#client').val('');
            $('#nb_p').val('');

            $('.remove').click(function(e){
                e.preventDefault();

                $(this).parent('tr').remove();
            });

        }
    });


    $('#formation').autocomplete({
        url: formationsUrl,
        display: function(data) {


            var table = $('<table class="table table-hover table-striped table-bordered autocomplete-list"><tbody></tbody></table>');
            $('<thead><tr><th>Nom</th></tr></thead>').prependTo(table);

            $.each(data, function (key, value) {
                var tr  = $('<tr data-index="'+ key +'" class="autocomplte-item">');
                tr.append('<td>'+ value.intitule + '</td>');
                table.append(tr);
            });

            table.appendTo('body');
            table.css({
                top: $('#formation').offset().top + $('#formation').height(),
                left: $('#formation').offset().left,
                background: '#fff',
                position: 'absolute',
                width: $('#formation').width()
            })
        },

        select: function (data) {
            currentSelection = data;
            $('#formation').prop('value',data.id);
            $('#formation').val(data.intitule);
            $('#hformation').prop('value',data.id);






        }
    });


    $('#client').autocomplete({
        url: clientsUrl,
        display: function(data) {


            var table = $('<table class="table table-hover table-striped table-bordered autocomplete-list"><tbody></tbody></table>');
            $('<thead><tr><th>Nom</th></tr></thead>').prependTo(table);

            $.each(data, function (key, value) {
                var tr  = $('<tr data-index="'+ key +'" class="autocomplte-item">');
                tr.append('<td>'+ value.nom + '</td>');
                table.append(tr);
            });

            table.appendTo('body');
            table.css({
                top: $('#client').offset().top + $('#client').height(),
                left: $('#client').offset().left,
                background: '#fff',
                position: 'absolute',
                width: $('#client').width()
            })
        },

        select: function (data) {
            currentSelection = data;
           console.log(data.nom);
            $('#client').val(data.nom);
            $('#client').prop('name',data.id);
        }
    });


    $('#formateur').autocomplete({
        url: formateursUrl,
        display: function(data) {


            var table = $('<table class="table table-hover table-striped table-bordered autocomplete-list"><tbody></tbody></table>');
            $('<thead><tr><th>Nom</th></tr></thead>').prependTo(table);

            $.each(data, function (key, value) {
                var tr  = $('<tr data-index="'+ key +'" class="autocomplte-item">');
                tr.append('<td>'+ value.nom +'  '+ value.prenom + '</td>');
                table.append(tr);
            });

            table.appendTo('body');
            table.css({
                top: $('#formateur').offset().top + $('#formateur').height(),
                left: $('#formateur').offset().left,
                background: '#fff',
                position: 'absolute',
                width: $('#formateur').width()
            })
        },

        select: function (data) {
            currentSelection = data;
            $('#formateur').prop('value',data.id);
            $('#formateur').val(data.nom + '  '+ data.prenom);
            $('#hformateur').prop('value',data.id);

            




        }
    });
</script>

