<?php

class SiteController
{
  /**
  * Action для главной страницы
  */
  public function actionIndex()
  {
    if(isset($_SESSION['login'])){
      // если админ, выводим админку со списком пользователей
      if ($_SESSION['login']['isadmin']) {
        header('Location: /admin');
      } else {
        // если рядовой пользователь, выводим главную страницу
        require 'views/main.php';
      }
    } else {
      //страница авторизации (по дефолту)
      header('Location: /user/login');
    }
  }
}
?>
