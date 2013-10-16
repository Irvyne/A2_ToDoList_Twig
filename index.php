<?php
/**
 * Created by Thibaud BARDIN (Irvyne)
 * This code is under the MIT License (https://github.com/Irvyne/license/blob/master/MIT.md)
 */

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/config/config.php';
require __DIR__.'/_twig.php';

$myPDO = new MyPDO($config);
$todoManager = new TodoManager($myPDO->getPDO());
$todoList = $todoManager->findAll();

echo $twig->render('Todo/list.html.twig', array(
    'todoList' => $todoList,
));