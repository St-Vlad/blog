<?php if($errors): ?>
    <ul>
        <?php foreach ($errors as $error):?>
        <li><?= $error?></li>
        <?php endforeach;?>
    </ul>
<?php endif;?>

<form action="/registration" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Ім'я користувача</label>
        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введіть ім'я">
        <small id="emailHelp" class="form-text text-muted">Це ім'я буде відображатися на ваших статтях</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Eлектронна пошта</label>
        <input type="text" name="email" class="form-control" placeholder="Електронна пошта">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Пароль</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Повторіть пароль</label>
        <input type="password" name="repeat-password" class="form-control" id="exampleInputPassword1" placeholder="Повторіть пароль">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Зареєструватися"/>
</form>
<div style="margin-top: 5%">
    <span>Вже є аккаунт? <a href="/login">Увійти</a></span>
</div>