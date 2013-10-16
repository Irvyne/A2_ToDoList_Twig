<?php
/**
 * Created by Thibaud BARDIN (Irvyne)
 * This code is under the MIT License (https://github.com/Irvyne/license/blob/master/MIT.md)
 */

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(array(
    __DIR__.'/templates',
));

$twig = new Twig_Environment($loader, array(
    //'cache' => __DIR__.'/cache',
));