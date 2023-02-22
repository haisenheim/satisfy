<?php
/**
 * @var \App\View\AppView $this
 */
//echo $this->Html->css('lumino/styles.css');
//echo $this->Html->css('Dan.style.css');

?>
<div class="ui inverted  menu">
    <div class="ui container">
        <a href="#" class="header item">
            <?= $this->Html->image('logo.png', ['class' => 'logo']) ?>
           <?= $title; ?>
        </a>
        <a href="#" class="item active">Accueil</a>
        <div class="ui simple dropdown item">
            Locations
            <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" href="<?= $this->Url->build(['controller' => 'Locations', 'action' => 'add']) ?>">Nouvelle Location</a>
                <div class="ui divider"></div>
                <a class="item" href="<?= $this->Url->build(['controller' => 'Front', 'action' => 'index']) ?>">Locations d'aujourd'hui</a>
                <div class="ui divider"></div>
                <a class="item" href="<?= $this->Url->build(['controller' => 'Locations', 'action' => 'index']) ?>">Toutes locations</a>
            </div>
        </div>

        <?php foreach($main as $menu): ?>

        <div class="ui simple dropdown item">
           <?= $menu['menu']->name ?>
            <i class="dropdown icon"></i>
            <div class="menu">
                <?php foreach($menu['liens'] as $lien): ?>
                <div class="ui simple dropdown item">
                         <?= $lien['controller']->menu_name ?>

                        <div class="menu">
                        <?php foreach($lien['actions'] as $action): ?>

                            <?php if(($action->name!='*')&&($action->is_link)): ?>
                                    <?php $cont=$lien['controller']->name; $act=$action->name; ?>
                                     <a class="item" href="<?= $this->Url->build(['controller' => $cont, 'action' => $act]) ?>"><?= $action->menu_name ?></a>

                            <?php endif; ?>

                        <?php endforeach; ?>
                        </div>
                 </div>


                <?php endforeach; ?>
                <div class="ui divider"></div>

            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>

