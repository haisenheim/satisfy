
<div class="row" style="margin: 50px; margin-top:20px">
    <div class="col-lg-offset-3 col-md-offset-3 col-lg-5 col-md-5">
        <div style="border: solid blue 1px; border-radius: 5px; padding: 50px ">

            <h3 class="page-header">Connexion</h3>

            <form method="get" action="<?= $this->Url->build(['controller'=>'Front','action'=>'index']) ?>">
                <input name="_csrfToken" type="hidden" value="<?= $token ?>"/>
                <label for="code">Saisir le Code de Session:</label>
                <input type="text" name="code" class="form-control"/>
                <hr/>

                <button class="btn btn-primary" type="submit">Charger une fiche d'evaluation &nbsp;<i class="glyphicon glyphicon-arrow-right"></i> </button>
            </form>


        </div>
    </div>

</div>
