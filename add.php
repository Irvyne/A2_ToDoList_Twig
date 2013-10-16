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

if (isset($_POST['submit'])) {
    if (!empty($_POST['name']) && !empty($_POST['content'])) {
        $attributes = array(
            'name' => $_POST['name'],
            'content' => $_POST['content'],
        );
        $todo = new Todo($attributes);
        if ($todoManager->add($todo)) {
            header('Location: index.php');
        } else {
            $error_msg = 'Erreur lors de l\'ajout de la todo';
        }
    } else {
        $error_msg = 'Tous les champs sont obligatoires';
    }
}

isset($error_msg) ?: $error_msg = null;

echo $twig->render('Todo/add.html.twig', array(
    'errorMsg' => $error_msg,
));