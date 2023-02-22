


<!--<div class="blog-post">
    <h2 class="blog-post-title"><?/*= h($publication->name) */?></h2>
    <p class="blog-post-meta">Publié le <a href="#"><?/*=  $publication->created->i18nFormat('dd-MM-yyyy') */?></a> par <a href="#"><?/*= $publication->user?$publication->user->username:'Admin' */?></a></p>

    <div class="row">

        <p>
            <?/*= $publication->resume; */?>
        </p>
    </div>

</div><!-- /.blog-post -->-->

<div class="well" style="margin-top: 40px; padding: 20px">

    <div class="page-header center-block" style="background-color: #003a5f; color: whitesmoke">

        <h3 class="text-primary text-center" style="color: #ffffff"><?= $publication->name ?></h3>

    </div>
    <?php if($publication->theme): ?>

        <h3>THEME : <?= $publication->theme ?></h3>

    <?php endif; ?>

    <?php if($publication->image1): ?>

    <div class="container center-block" >


        <img style="width: 95%" class="" src="<?=$this->request->webroot.'files/Publications/image1/'.$publication->image1 ?>">

    </div>
    <?php endif; ?>


    <div class="" style=" padding: 120px; padding-top: 30px;">

        <?php if($publication->resume): ?>
        <div class="row">

            <?= $publication->resume; ?>
        </div>
        <?php endif; ?>
    </div>

</div>