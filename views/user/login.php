<?php require 'views/header.phtml'; ?>

<!-- форма авторизации-->
<form method="post" action="" class="form-signin" role="form">
  <h2 class="form-signin-heading">Авторизация</h2>
  <div class="form-group">
    <input type="text" class="form-control" name="login" placeholder="Email" required/>
    <input type="password" class="form-control" name="password" placeholder="Пароль" required/>
    <input type="submit" class="btn btn-lg btn-primary btn-block" name="enter" value="Войти">
    <p>Не зарегистрированы? <a href="/user/register">Зарегистрироваться</a></p>
  </div>
</form>

<?php require 'views/footer.html'; ?>
