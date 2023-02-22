<h2 class="page-header" style="color: #2196f3"><i class="glyphicon glyphicon-pencil"></i>&nbsp; Formulaire de Contact</h2>
<div class="well">
    <?= $this->Form->create(null,['id'=>'form-contact']) ?>

        <?php
            echo $this->Form->input('name',['label'=>'Nom :','class'=>'form-control']);
            echo $this->Form->input('email',['class'=>'form-control','label'=>'Email :','type'=>'email']);
            echo $this->Form->input('telephone',['label'=>'Numero de telephone : ','class'=>'form-control','type'=>'telephone']);
            echo $this->Form->input('objet',['class'=>'form-control','label'=>'Objet :']);
            echo $this->Form->input('message',['type'=>'textarea', 'class'=>'form-control','label'=>'Votre Message']);

        ?>
    <h1></h1>
    <button class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i>Envoyer</button> <h1></h1>
    <?= $this->Form->end() ?>
</div>
<style>
    textarea.form-control{
        border: lightgray 2px solid;
        padding: 5px;
    }

    label{
        margin-top: 20px;
        font-weight: 600;
    }

    #form-contact input{
        border-radius: 5px;
        border: 1px lightcyan solid;
    }
</style>


