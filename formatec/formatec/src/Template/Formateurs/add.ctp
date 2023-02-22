

<div class="well">
    <h3 class="page-header">Nouveau formateur</h3>

    <form method="post" action="<?= $this->Url->build(['controller'=>'Formateurs','action'=>'add']) ?>">
        <input name="_csrfToken" type="hidden" value="<?= $token ?>"/>
        <label for="name">Code:</label>
        <input type="text" name="code" class="form-control"/>
        <hr/>
        <label for="nom">Nom:</label>
        <input type="text" name="nom" class="form-control"/>
        <hr/>
        <label for="prenom">Prenom:</label>
        <input type="text" name="prenom" class="form-control"/>
        <hr/>
        <label for="telephone">Telephone:</label>
        <input type="text" name="telephone" class="form-control"/>
        <hr/>
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control"/>
        <hr/>
        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" class="form-control"/>
        <hr/>

        <button class="btn btn-success" type="submit">Soumettre</button>
    </form>


</div>