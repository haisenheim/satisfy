
<div class="well">

    <form method="post" enctype="multipart/form-data" action="<?= $this->Url->build(['controller'=>'Pages','action'=>'add']) ?>">
    <input name="_csrfToken" type="hidden" value="<?= $token ?>"/>
    <label for="name">Titre de la page:</label>
    <input type="text" name="name" class="form-control"/>
        <hr/>

    <label for="body">Corps de la page : </label>
    <textarea name="body" id="corps" cols="30"  rows="10"></textarea>
        <hr/>
    <input type="file" name="image1" class="form-control" id="image1"/>
        <hr/>

    <button class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i>Enregistrer</button> <h1></h1>
</form>
</div>



<script src="<?= $this->request->webroot ?>tinymce/jquery.tinymce.min.js"></script>
<script src="<?= $this->request->webroot ?>tinymce/formula/mathquill.min.js"></script>
<script src="<?= $this->request->webroot ?>tinymce/tinymce.min.js"></script>

<script type="text/javascript">
    tinymce.PluginManager.load('formula', '<?= $this->request->webroot ?>tinymce/plugins/formula/plugin.min.js');


    tinymce.init({
        selector:'textarea',

        height:300,
        language: 'fr_FR',
        theme:'modern',

        plugins:[
            'formula, advlist autolink lists link image imagetools charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'help media imagetools autosave bbcode table template textcolor emoticons'
        ],
        toolbar:'formula, bold,image, imagetools, hr'


    });

</script>


