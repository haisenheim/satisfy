<h1 class="page-header">Nouvel Article</h1>
<div class="well">


    <form method="post" action="<?= $this->Url->build(['controller'=>'Articles','action'=>'add']) ?>">
        <input name="_csrfToken" type="hidden" value="<?= $token ?>"/>
        <label for="name">Titre:</label>
        <input type="text" name="name" class="form-control"/>
        <label for="body">Corps de l'article : </label>
        <textarea name="body" id="corps" cols="30"  rows="10"></textarea> <h1></h1>
        <label for="statut">Actif ?</label>
        <input type="checkbox" name="statut"/>
        <button class="btn btn-success" type="submit">Soumettre</button>
    </form>


</div>
<script src="<?= $this->request->webroot ?>tinymce/jquery.tinymce.min.js"></script>
<script src="<?= $this->request->webroot ?>tinymce/tinymce.min.js"></script>
<script type="text/javascript">


    tinymce.init({
        selector:'textarea',
        height:300,
        language: 'fr_FR',
        theme:'modern',
        plugins:[
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'help media imagetools autosave bbcode table template textcolor emoticons'
        ]


    });

</script>

<style>
    textarea.form-control{
        border: lightgray 2px solid;
        padding: 5px;
    }
</style>