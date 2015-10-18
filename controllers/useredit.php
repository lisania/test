<?php
if (is_numeric($_GET['user'])) {
    if (isset($_POST['edit_user'])) {
        header("Location: index.php?user=".$_GET['user']);
        $_SESSION['flash'] = $pdo->updateUser($_GET['user'], $_POST['firstname'], $_POST['lastname']);
    }
    echo User::renderUser($pdo, $_GET['user']);
}
