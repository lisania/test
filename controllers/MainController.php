<?php

class MainController
{
  public function actionIndex()
  {
    require_once 'views/user/main.php';
    return true;
  }
}
?>
