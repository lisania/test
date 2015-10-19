<?php

class AdminController
{
  public function actionIndex($list = 1)
  {
    if (empty($list)){
      $list["0"] = 1;
    }
    require_once 'views/user/admin.php';
    User::paginateUsers(is_numeric($list["0"]) ? $list["0"] : 1, 6);
    return true;
  }

  public function actionUpdate($id)
  {
    if (is_numeric($id["0"])) {
      if (isset($_POST['edit_user'])) {
        header("Location: ");
        $_SESSION['flash'] = User::updateUser($id["0"], $_POST['firstname'], $_POST['lastname']);
      }
      User::renderUser($id["0"]);
    }
    return true;
  }

  public function actionDelete($id)
  {
    if (is_numeric($id["0"])) {
      header("Location: /");
      $del = User::deleteUser($id["0"]);
      $_SESSION['flash'] = $del;
    }
    return true;
  }
}
?>
