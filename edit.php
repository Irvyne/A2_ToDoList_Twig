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

if (empty($_GET['id']))
    header('Location: index.php');

$id = (int) $_GET['id'];
$todo = $todoManager->find($id);

if (isset($_POST['submit'])) {
    if (!empty($_POST['name']) && !empty($_POST['content'])) {
        $todo->setName($_POST['name']);
        $todo->setContent($_POST['content']);
        if ($todoManager->update($todo)) {
            header('Location: index.php');
        } else {
            $error_msg = 'Erreur lors de la mise à jour de la todo !';
        }
    } else {
        $error_msg = 'Tous les champs sont obligatoires';
    }
}

echo $twig->render('Todo/edit.html.twig', array(
    'todo' => $todo,
));