<?php

class SiteController
{
  /**
  * Action для главной страницы
  */
  public function actionIndex()
  {
    require 'views/header.phtml';
    if(isset($_SESSION['login'])){
      //логаут
      if(isset($_GET['page']) && $_GET['page'] == 'logout') {
        unset($_SESSION['login']);
        header('Location: index.php');
        exit;
      }
      require 'views/user/menu.phtml';
      if ($_SESSION['login']['isadmin']) {
        if (isset($_GET['user'])) {
          //страница редактирования пользователя
          require 'views/user/useredit.php';
        } else {
          //если админ, выводим список пользователей
          require 'views/user/admin.php';
        }
      } else {
        //если рядовой пользователь, выводим главную страницу
        require 'views/user/main.php';
      } require 'views/footer.html';
    } else {
      if (isset($_GET['page']) && $_GET['page'] == 'register') {
        //страница регистрации
        require 'views/user/registration.php';
      } else {
        //страница логин/пароль (по дефолту)
        require 'views/user/login.php';
      }
    }

  }
}
?>
