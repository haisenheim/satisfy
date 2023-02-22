<h2 class="page-header">A Vendre</h2>





        <?php foreach($articles as $article): ?>
            <div class="blog-post well">
                <h2 class="blog-post-title"><?= $article->name ?></h2>
                <p class="blog-post-meta"><?= $article->created->i18nFormat('dd-MM-yyyy HH:mm:ss') ?> Par <a href="#">Clement</a></p>
                <p><?= $article->resume ?></p>

                <?= $this->Html->link(__('Lire la suite'), ['action' => 'view', $article->id],['class'=>'btn btn-primary']) ?>

            </div>

        <?php endforeach; ?>










<style>


</style>