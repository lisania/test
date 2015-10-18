<?php

class UserController
{
  public function actionRegister()
  {

    if (isset($_POST['submit'])) {
        $firstname = htmlentities($_POST['firstname']);
        $lastname = htmlentities($_POST['lastname']);
        $birthyear = htmlentities($_POST['birthyear']);
        $login = htmlentities($_POST['login']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


        $usr = new User($firstname,$lastname,$birthyear,$login,'0');
        $exec = User::registerUser($usr, $password);
        if ($exec === true) {
            header('Location: index.php');
            $usr->sessify();
            $_SESSION['flash'] = 'Вы зарегистрированы!';
        } else {
            $_SESSION['flash'] = $exec;
        }
    }
    require_once 'views/user/registration.php';
    return true;
  }

  public function actionLogin() {
    if (isset($_POST["enter"])) {

        $user = User::checkLogin($_POST['login']);
        if (isset($user['password']) && password_verify($_POST['password'], $user['password'])) {
            $usr = new User($user['firstname'], $user['lastname'], $user['login'], $user['birthyear'], $user['isadmin'], $user['createat'], $user['updateat']);
            $usr->sessify();

            //+еще поля
        } else {
            $_SESSION['flash'] = 'Неправильный логин или пароль';
        }
    }
    require_once 'views/user/login.php';
    return true;
  }

  public function actionLogout() {
      unset($_SESSION['login']);
      header('Location: /');    
  }
}
?>
