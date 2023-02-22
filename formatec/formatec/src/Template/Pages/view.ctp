

<div class="well" style="margin-top: 40px; padding: 20px">

    <div class="page-header center-block" style="background-color: #003a5f; color: whitesmoke">

        <h3 class="text-primary text-center" style="color: #ffffff"><?= $page->name ?></h3>

    </div>
    <div class="container center-block" style="horiz-align: center; margin-left: 500px">

        <img class="" src="<?=$this->request->webroot.'files/Pages/image1/'.$page->image1 ?>" alt="le promoteur">
        <h5 class="text-capitalize">Promoteur</h5>
        <h6 class="">Domaski Marcel Moutsiessé</h6>
        <h6 class="">Pharmacien, Mathématicien-Chercheur</h6>

    </div>


    <div class="" style=" padding: 120px; padding-top: 30px;">


        <div class="row">

            <?= $page->body; ?>
        </div>
    </div>

</div>
