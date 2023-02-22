<div class="row" style="margin: 50px; margin-top:20px">
    <div class="col-lg-offset-3 col-md-offset-3 col-lg-5 col-md-5">
        <div style="border: solid blue 1px; border-radius: 5px; padding: 50px ">

            <h3 class="page-header">Authentification</h3>

            <form name="login" role="form" class="form-horizontal" method="post" accept-charset="utf-8" >
                <input name="_csrfToken" type="hidden" value="<?= $token ?>"/>
                <label for="username">Identifiant :</label>
                <input style="border: 1px solid #ccc; border-radius: 4px;" name="username"  id="username" class="form-control" placeholder="Utilisateur"/>
                <hr/>
                <label for="password">Mot de passe :</label>
                <input style="border: 1px solid #ccc; border-radius: 4px;" name="password"  id="password" type="password"  class="form-control" placeholder="Mot de passe"/>
                <hr/>
                <button class="btn btn-primary" type="submit">Se Connecter &nbsp;<i class="glyphicon glyphicon-arrow-right"></i> </button>
            </form>


        </div>
    </div>

</div>


