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
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #003a5f;color: #ffffff">
    <div class="container" style="color: #ffffff">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Systeme de gestion des Fiches d'Evaluation</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link(" Se connecter",['controller'=>'Users','action'=>'login'],["class"=>"glyphicon glyphicon-user"]) ?></li>

        </ul>

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




