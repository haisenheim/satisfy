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




    <?= $this->Html->css('../tinymce/formula/mathquill.css'); ?>
    <?= $this->Html->css('../tinymce/formula/equation_editor.css'); ?>

    <?= $this->Html->script('jquery-2.1.1.js') ?>
    <?= $this->Html->script('../tinymce/formula/mathquill.min.js'); ?>
    <?= $this->Html->script('../tinymce/formula/equation_editor.js'); ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="equation-editor">

        <?= $this->fetch('content') ?>

</body>
</html>
