<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */


?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
       MTI-SGF:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>



    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('bootstrap2.min.css') ?>
    <?= $this->Html->css('navbar-fixed-top.css') ?>
    <?= $this->Html->css('../eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') ?>
    <?= $this->Html->css('carousel.css') ?>
    <?= $this->Html->css('dashboard-sticky-footer-navbar.css') ?>
    <?= $this->Html->css('front-style.css') ?>

    <?= $this->Html->script('jquery.min.js') ?>

    <?= $this->Html->script('bootstrap.min.js') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #003a5f;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"> Gestion des Formations</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

                <li><?= $this->Html->link(" Accueil",['controller'=>'Front','action'=>'index'],["class"=>"glyphicon glyphicon-home"]) ?></li>
                <li><?= $this->Html->link(' Sessions',['controller'=>'Sessions','action'=>'index'],['class'=>'glyphicon glyphicon-pencil']) ?></li>
                <li><?= $this->Html->link(' Formations',['controller'=>'Formations','action'=>'index'],['class'=>'glyphicon glyphicon-book']) ?></li>
                <li><?= $this->Html->link(' Formateurs',['controller'=>'Formateurs','action'=>'index'],['class'=>'glyphicon glyphicon-user']) ?></li>
                <li><?= $this->Html->link(' Parametres',['controller'=>' Parametres','action'=>'index'],['class'=>'glyphicon glyphicon-cog']) ?></li>



            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../navbar/"><i class="glyphicon glyphicon-user"></i>&nbsp;<span style="font-size: smaller">Connecte en tant que :</span>&nbsp; <span style="color: whitesmoke"><?= $user?$user['username']:'Inconnu' ?></span></a></li>
                <li><a href="../navbar-static-top/"></a></li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
    <?= $this->Flash->render() ?>
    <div class="container" id="front-wrapper" >
        <?= $this->fetch('content') ?>
    </div>
<div class="footer" style=" background-color: #003a5f;">

    <div class="container">

        <div class="row">
            <p class="text-center"><span class="text-info"><a href="" style="font-size: 14px; color: #ffffff">Systeme de gestion des fiches d'evaluations des sessions de formation</a> </span> <span class="fa-bold"><a
                        href="www.mti-congo.com" style="font-size: 12px">&nbsp;&nbsp; par MTI</a></span></p>

        </div>
    </div>

</div>
</body>
</html>




