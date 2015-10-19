<?php
return array (
// Пользователь:
  'user/register' => 'user/register', // actionRegister в UserController
  'user/login' => 'user/login', // actionLogin в UserController
  'user/logout' => 'user/logout', // actionLogout в UserController
// Управление пользователями:
  'admin/update/([0-9]+)' => 'admin/update/$1', // actionUpdate в AdminController
  'admin/delete/([0-9]+)' => 'admin/delete/$1', // actionDelete в AdminController
// Админпанель:
  'admin/([0-9]+)' => 'admin/index/$1',
  'admin' => 'admin/index', // actionIndex в AdminController
// Главная страница
  '' => 'site/index', // actionIndex в SiteController
);
?>
