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
        LR-MSI:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>


    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('bootstrap2.min.css') ?>
    <?= $this->Html->css('navbar-fixed-top.css') ?>
    <?= $this->Html->css('../eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') ?>
    <?= $this->Html->css('sticky-footer-navbar.css') ?>
    <?= $this->Html->script('../tinymce/formula/mathquill.min.js'); ?>

    <?= $this->Html->script('../tinymce/tinymce.min.js'); ?>



    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('moment.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('custom.js') ?>

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
            <a class="navbar-brand" href="#">LR-MSI</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

                <li><?= $this->Html->link(" Accueil",['controller'=>'Front','action'=>'index'],["class"=>"glyphicon glyphicon-home"]) ?></li>

                <li><?= $this->Html->link(' Travaux Inedits',['controller'=>' Publications','action'=>'index'],['class'=>'glyphicon glyphicon-shopping-cart']) ?></li>
                <li><?= $this->Html->link(' Presentation',['controller'=>'Articles','action'=>'View',7],['class'=>'glyphicon glyphicon-info-sign']) ?></li>

                <li><?= $this->Html->link(" Contactez Nous",['controller'=>'Pages','action'=>'contact'],["class"=>"glyphicon glyphicon-pencil"]) ?></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../navbar/"><i class="glyphicon glyphicon-phone"></i>&nbsp;+242065647345</a></li>
                <li><a href="../navbar-static-top/"></a></li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div id="wrapper">
    <?= $this->Flash->render() ?>

    <div class="container clearfix">

        <div class="row" style="padding-top: 10px; background-color: whitesmoke; margin-bottom: 10px; margin-top: 5px">
            <div class="" style='background-image: url("labomsi/img/banniere.png")'>
                <div class="col-lg-2 col-md-2 col-xs-12">
                    <?= $this->Html->image('cake.icon.png') ?>
                </div>
                <div class="col-lg-9 col-md-9 col-xs-12" >
                    <h4>Laboratoire de Recherche en Mathematiques Simples et Intermediares</h4>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-9 col-lg-9 blog-main" id="main">
                <?= $this->fetch('content') ?>
            </div>

            <div class="col-xs-12 col-md-3 col-lg-3 blog-sidebar" id="right-side">
                <div class="sidebar-module sidebar-module-inset">

                    <?= $this->cell('Presentation', [$this->fetch('title')])->render(); ?>
                    
                </div>
                <div class="sidebar-module">
                    <h4>Archives</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">March 2014</a></li>
                        <li><a href="#">February 2014</a></li>
                        <li><a href="#">January 2014</a></li>
                        <li><a href="#">December 2013</a></li>
                        <li><a href="#">November 2013</a></li>
                        <li><a href="#">October 2013</a></li>
                        <li><a href="#">September 2013</a></li>
                        <li><a href="#">August 2013</a></li>
                        <li><a href="#">July 2013</a></li>
                        <li><a href="#">June 2013</a></li>
                        <li><a href="#">May 2013</a></li>
                        <li><a href="#">April 2013</a></li>
                    </ol>
                </div>
                <div class="sidebar-module">
                    <h4>Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </div>

        </div>

    </div>
    <div class="footer" style="">

        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <h4 class="modal-title page-header text-capitalize text-center"><i class="glyphicon glyphicon-book"></i>&nbsp;LR-MSI ?</h4>
                    <div class="panel">

                        <div class="">
                            <ol class="list-group list-unstyled">
                                <li class="list-group-item"><i class="glyphicon glyphicon-pencil"></i>&nbsp;<a href="#">Le Theoreme de Fermat</a></li>
                                <li class="list-group-item"><i class="glyphicon glyphicon-education"></i>&nbsp;<a href="#">Biologie</a></li>
                                <li class="list-group-item"><i class="glyphicon glyphicon-triangle-bottom"></i><a href="#">&nbsp; Trapeze arthmetique</a></li>

                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <h4 class="modal-title page-header text-capitalize text-center"><i class="glyphicon glyphicon-cloud"></i>&nbsp; A Consulter</h4>
                    <div class="panel">

                        <div class="">
                            <ol class="list-group list-unstyled">
                                <li class="list-group-item"><i class="glyphicon glyphicon-heart"></i>&nbsp;<a href="#">Presentation du LR-MSI</a></li>
                                <li class="list-group-item"><i class="glyphicon glyphicon-piggy-bank"></i>&nbsp;<a href="#">Historique</a></li>
                                <li class="list-group-item"><i class="glyphicon glyphicon-globe"></i>&nbsp;<a href="#">La recherche en Combinatoire</a></li>

                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <h4 class="modal-title page-header text-capitalize text-center"><i class="glyphicon-link glyphicon"></i>&nbsp; Divers</h4>
                    <div class="panel">

                        <div class="">
                            <ol class="list-group list-unstyled">
                                <li class="list-group-item"><i class="glyphicon glyphicon-pencil"></i>&nbsp;<a href="#">Formulaire de Contact</a></li>
                                <li class="list-group-item"><i class="glyphicon glyphicon-user"></i>&nbsp;<a href="#">A propos du Fondateur</a></li>
                                <li class="list-group-item"><i class="glyphicon glyphicon-new-window"></i>&nbsp;<a href="#">Annonces diverses</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="featurette-divider"/>
            <div class="row">
                <p class="text-center"><span class="text-info"><a href="" style="font-size: 18px">Laboratoire de Recherche en Mathematiques Simples et Intermediaires</a> </span> <span class="fa-bold"><a
                            href="www.alliages-technologies.com" style="font-size: 12px">Par Alliages Technologies</a></span></p>
                <p class="text-center">Cpyright, Septembre 2017 </p>
            </div>
        </div>

    </div>
</div>

</body>
</html>
