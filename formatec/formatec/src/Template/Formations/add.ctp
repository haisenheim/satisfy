
<div class="row" style="margin: 50px; margin-top:20px">
    <div class="col-lg-5 col-md-5">
        <div style="border: solid blue 1px; border-radius: 5px; padding: 50px ">
            <div class="" ">
            <h3 class="page-header">Nouvelle formation</h3>

            <form method="post" action="<?= $this->Url->build(['controller'=>'Formations','action'=>'add']) ?>">
                <input name="_csrfToken" type="hidden" value="<?= $token ?>"/>
                <label for="code">code:</label>
                <input type="text" name="code" class="form-control"/>
                <hr/>
                <label for="intitule">Intitule en francais :</label>
                <input type="text" name="intitule" class="form-control"/>
                <hr/>
                <label for="name">Intitule en anglais :</label>
                <input type="text" name="name" class="form-control"/>
                <hr/>
                <button class="btn btn-success" type="submit">Soumettre</button>
            </form>


        </div>
    </div>
