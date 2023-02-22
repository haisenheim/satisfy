<div class="row" style="margin-bottom: 30px; margin-top:1px;">
    <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
        <div style="border: solid blue 1px; border-radius: 5px; padding: 50px; padding-top: 20px; ">

            <h3 class="page-header">Tableau des indicateurs de performance</h3>

            <div class="row" id="wrap">

                <div class="col-md-2 col-lg-2">
                  <?= $this->Html->link('Repartition des Sessions par client', ['action'=>'getSessionsByClient']) ?>
                </div>
                <div class="col-md-2 col-lg-2">
                    <h6>Second</h6>
                </div>
                <div class="col-md-2 col-lg-2">
                    <h6>Troisieme</h6>
                </div>
                <div class="col-md-2 col-lg-2">
                    <h6>
                        Quatrieme
                    </h6>
                </div>
                <div class="col-md-2 col-lg-2">
                    <h6>Cinquieme</h6>
                </div>
                <div class="col-md-2 col-lg-2">
                    <h6>Sixieme</h6>
                </div>


            </div>




         </div>
    </div>
</div>

<style>
    #wrap .col-md-2.col-lg-2{

        border-radius: 5px;
        min-height: 100px;
        border:1px lightblue dashed;
    }
</style>