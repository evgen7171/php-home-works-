<div class="container">
    <form action="/engine/login.php?query=autorization"
          method="post"
          class="form-group login">
        <div><?= $message ?></div>
        <input type="text" class="form-control" id="name" name="name" placeholder="Введите имя">
        <input type="email" class="form-control" id="name" name="email" placeholder="Введите эл.почту">
        <input type="password" class="form-control" id="pass" name="pass" placeholder="Введите пароль">
        <input class="btn btn-primary" type="submit" value="Войти">
    </form>
</div>
