
<div class="row" style="margin: 50px; margin-top:20px">
    <div class="col-lg-5 col-md-5">
        <div style="border: solid blue 1px; border-radius: 5px; padding: 50px ">
            <div class="" ">
            <h3 class="page-header">Nouveau Client</h3>

            <form method="post" action="<?= $this->Url->build(['controller'=>'Clients','action'=>'add']) ?>">
                <input name="_csrfToken" type="hidden" value="<?= $token ?>"/>
                <label for="code">code:</label>
                <input type="text" name="code" class="form-control"/>
                <hr/>
                <label for="nom">Nom :</label>
                <input type="text" name="nom" class="form-control"/>
                <hr/>
                <label for="name">Telephone :</label>
                <input type="text" name="telephone" class="form-control"/>
                <hr/>
                <label for="email">Adresse Email :</label>
                <input type="email" name="email" class="form-control"/>
                <hr/>
                <label for="adresse">Adresse :</label>
                <input type="text" name="adresse" class="form-control"/>
                <hr/>
                <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-floppy-save"></i>&nbsp;  Enregistrer</button>
            </form>


        </div>
    </div>
