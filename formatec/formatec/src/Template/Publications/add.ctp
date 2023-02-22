<div class="well">
<h3 class="page-header">Nouvelle publication</h3>

    <form method="post" action="<?= $this->Url->build(['controller'=>'Publications','action'=>'add']) ?>">
        <input name="_csrfToken" type="hidden" value="<?= $token ?>"/>
        <label for="name">Titre:</label>
        <input type="text" name="name" class="form-control"/>
        <hr/>
        <label for="name">Theme:</label>
        <input type="text" name="theme" class="form-control"/>
        <hr/>
        <label for="body">Resume l'article : </label>
        <textarea name="resume" id="corps" cols="30"  rows="10"></textarea>
        <hr/>
        <label for="body">Image de l'article : </label>
        <input type="file" name="image1" class="form-control" id="image1"/>
        <hr/>

        <button class="btn btn-success" type="submit">Soumettre</button>
    </form>


</div>




<script src="<?= $this->request->webroot ?>tinymce/jquery.tinymce.min.js"></script>
<script src="<?= $this->request->webroot ?>tinymce/formula/mathquill.min.js"></script>
<script src="<?= $this->request->webroot ?>tinymce/tinymce.min.js"></script>

<script type="text/javascript">
    tinymce.PluginManager.load('formula', '<?= $this->request->webroot ?>tinymce/plugins/formula/plugin.min.js');

    tinymce.init({
        selector:'textarea',
        images_dataimg_filter: function(img){
            return img.hasAttribute('internal-blob');
        },
        height:300,
        language: 'fr_FR',
        theme:'modern',

        plugins:[
            'formula, advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'help media imagetools autosave bbcode table template textcolor emoticons'
        ],
        toolbar:'formula, bold'


    });

</script>
