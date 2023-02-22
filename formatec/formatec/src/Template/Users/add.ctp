<h3 class="page-header">Nouvel utilisateur</h3>
<div class="">
    <?= $this->Form->create($user) ?>


        <?php
            echo $this->Form->input('username',['class'=>'form-control']);
            echo $this->Form->input('password',['class'=>'form-control']);
            echo $this->Form->input('role_id', ['options' => $roles,'class'=>'form-control']);
        ?>

    <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-floppy-disk"></i>Enregistrer</button> <h1 class="featurette-divider"></h1>
    <?= $this->Form->end() ?>
</div>
