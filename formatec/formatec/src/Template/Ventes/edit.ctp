<h1 class="page-header">Modification de l'article</h1>
<div class="well">
    <?= $this->Form->create($article,['type'=>'file']) ?>


    <?php
    echo $this->Form->input('name',['label'=>'Titre :', 'class'=>'form-control']).'<br/>';
    echo $this->Form->input('body', ['label'=>'Corps de l\'article', 'class'=>'form-control']);
    echo $this->Form->input('resume', ['label'=>'Bref Resume :', 'class'=>'form-control']).'<br/>';
    echo $this->Form->input('category_id', ['options' => $categories,'label'=>'Categorie','empty'=>'Selectionner une categorie', 'class'=>'form-control']).'<br/>';;
    echo $this->Form->input('image1', ['label'=>'Premiere photo', 'class'=>'form-control','type'=>'file']).'<br/>';;
    echo $this->Form->input('image2', ['label'=>'Deuxieme photo', 'class'=>'form-control','type'=>'file']).'<br/>';;
    echo $this->Form->input('image3', ['label'=>'Troisieme photo', 'class'=>'form-control','type'=>'file']).'<br/>';;
    echo $this->Form->input('statut', ['label'=>'Actif', 'class'=>'form-control','type'=>'checkbox']).'<br/>';;
    ?>

    <button class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i>Enregistrer</button> <h1></h1>
    <?= $this->Form->end() ?>
</div>
<style>
    textarea.form-control{
        border: lightgray 2px solid;
        padding: 5px;
    }
</style>

