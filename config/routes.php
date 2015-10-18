<?php
return array (
// Пользователь:
  'user/register' => 'user/register',
  'user/login' => 'user/login',
  'user/logout' => 'user/logout',
  'main' => 'main/index',
// Админпанель:
  'admin' => 'admin/index', // actionIndex в AdminController
// Управление пользователями:
  'admin/update/([0-9]+)' => 'admin/update/$1',
  'admin/delete/([0-9]+)' => 'admin/delete/$1',
// Главная страница
  'index.php' => 'site/index', // actionIndex в SiteController
  '' => 'site/index', // actionIndex в SiteController
);
?>
