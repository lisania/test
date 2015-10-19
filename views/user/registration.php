<!-- форма регистрации-->
<form method="post" action="/user/register" class="form-signin" role="form">
  <h2 class="form-signin-heading">Регистрация</h2>
  <div class="form-group">
    <input type="text" class="form-control" name="firstname" placeholder="Имя" required />
    <input type="text" class="form-control" name="lastname" placeholder="Фамилия" required />
    <input type="text" class="form-control" name="birthyear" placeholder="Год рождения" required />
    <input type="email" class="form-control" name="login" placeholder="Email" required />
    <input type="password" class="form-control" name="password" placeholder="Пароль" required />
    <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Зарегистрироваться">
    <p>Уже зарегистрированы? <a href="/user/login">Войти</a></p>
  </div>
</form>
