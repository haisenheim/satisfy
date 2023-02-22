
<div class="">
    <h2 class="page-header"><span style="border-bottom: solid 2px #2196f3">Articles inedits &nbsp;  </span><i class="glyphicon glyphicon-pencil"></i></h2>

    <?php foreach($publications as $article): ?>
        <div class="blog-post">
            <div class="row">
                <h3 class=""><?= $article->name ?></h3>
                <hr/>
                <h4>Theme: <?= $article->theme ?></h4>
                <hr/>


                <p><?= $this->Text->truncate($article->resume,600,['ellipsis'=>' ...','exact'=>'false']) ?></p>
                <span class="link"> <?= $this->Html->link(__('Lire la suite...'), ['action' => 'view', $article->id],[]) ?></span>

            </div>

        </div>

    <?php endforeach; ?>
</div>


<style>
    h1,h2,h3,h4,h5{
        color: white;
    }
</style>
