<?php

class AdminController
{
  public function actionIndex()
  {
    if ((isset($_GET['action']))&&($_GET['action']=="delete")) {
      header("Location: index.php");
      $id = $_GET['id'];
      $del = $pdo->deleteUser($id);
      $_SESSION['flash'] = $del;
    }

    User::paginateUsers($pdo, (isset($_GET['list']) && is_numeric($_GET['list']) ? $_GET['list'] : 0), 5);
    
    require_once 'views/user/admin.php';
    return true;
  }
}
?>
