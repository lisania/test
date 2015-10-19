<?php

class User
{
  public $firstname;
  public $lastname;
  public $birthyear;
  public $login;
  public $isadmin;
  public $createat;
  public $updateat;

  public function __construct($firstname,$lastname,$birthyear,$login,$isadmin,$createat = '',$updateat = '')
  {
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->birthyear = $birthyear;
    $this->login = $login;
    $this->isadmin = $isadmin;
    $this->createat = $createat;
    $this->updateat = $updateat;
  }

  public function sessify()
  {
    // вывод нужных полей в сессию
    $_SESSION['login']['firstname'] = $this->firstname;
    $_SESSION['login']['lastname'] = $this->lastname;
    $_SESSION['login']['isadmin'] = $this->isadmin;
  }

  public static function checkLogin($login)
  {
    $pdo = Db::getConnection();
    $select = "SELECT * FROM users WHERE login = ?";
    $sttm = $pdo->prepare($select);
    $sttm->execute(array($login));
    return $sttm->fetch(PDO::FETCH_ASSOC);
  }

  public static function registerUser($user, $password)
  {
    $pdo = Db::getConnection();
    try {
      $insert ="INSERT INTO users (firstname, lastname, birthyear, login, password) VALUES (?, ?, ?, ?, ?)";
      $stmt = $pdo->prepare($insert);
      $stmt->execute(array($user->firstname, $user->lastname, $user->birthyear, $user->login, $password));
      return true;
    } catch (PDOException $e) {
      if ($e->getCode() == 23000) {
        return $user->login.' уже зарегестрирован';
      }
      return 'Ошибка';
    }
  }

  //подсчет количества юзеров в бд. для пагинатора
  public static function getUsersCount()
  {
    $pdo = Db::getConnection();
    $sttm = $pdo->prepare("SELECT COUNT(*) FROM users");
    $sttm->execute();
    return $sttm->fetchColumn();
  }

  //получение юзеров для нужной страницы для пагинатора
  public static function getUsers($offset, $limit)
  {
    $offset = ($offset - 1) * $limit;
    $pdo = Db::getConnection();
    $sttm = $pdo->prepare("SELECT * FROM users ORDER BY createat DESC LIMIT ".$limit." OFFSET ".$offset);
    $sttm->execute();
    return $sttm->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getUserById($id)
  {
    $pdo = Db::getConnection();
    $sttm = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $sttm->execute(array($id));
    return $sttm->fetch();
  }

  public static function updateUser($id, $firstname, $lastname)
  {
    $pdo = Db::getConnection();
    try {
      $update ="UPDATE users SET firstname=?, lastname=? WHERE id = ?";
      $stmt = $pdo->prepare($update);
      $stmt->execute(array($firstname, $lastname, $id));
      return 'Сохранено';
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function deleteUser($id)
  {
    $pdo = Db::getConnection();
    try {
      $delete ="DELETE FROM users WHERE id = ?";
      $stmt = $pdo->prepare($delete);
      $stmt->execute(array($id));
      return 'Пользователь удалён';
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  // вывод списка пользователей и пагинатора
  public static function paginateUsers($offset, $limit)
  {
    $pdo = Db::getConnection();
    $cnt = User::getUsersCount();
    $userlist = User::getUsers($offset, $limit);
    foreach ($userlist as $key => $value)
    {
      echo "<div class='col-xs-6'>".$value['firstname']." ".$value['lastname']."</div>
      <div class='col-xs-6'><a href='/admin/update/".$value['id']."'>
      <button type='button' class='btn btn-default '>Редактировать</button>
      </a>
      <a href='/admin/delete/".$value['id']."'>
      <button type='submit' name='submit' class='btn btn-default '>Удалить</button>
      </a></div></br>";
    }
    echo "</br>Всего пользователей: ".$cnt."</br>";
    for ($x=1 ; $x<=ceil($cnt/$limit); $x++ ) {
      if ($offset==$x) {
        echo "Страница ".$x." ";
      } else
      echo "<a href='/admin/".$x."'>Страница ".$x."</a> ";
    }
  }

  // правка пользователей
  public static function renderUser($id)
  {
    $pdo = Db::getConnection();
    $usr = User::getUserById($id);
    require 'views/user/useredit.phtml';
    return true;
  }
}
