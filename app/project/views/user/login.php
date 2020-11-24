<?php if($errors): ?>
    <ul>
        <?php foreach ($errors as $error):?>
        <li><?= $error?></li>
        <?php endforeach;?>
    </ul>
<?php endif;?>

<form action="/login" method="post">
    <div class="form-group">
        <input type="hidden" name="CSRFtoken" class="form-control" id="secret" value="<?php echo $_SESSION['CSRFtoken'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Eлектронна пошта</label>
        <input type="text" name="email" id="exampleInputEmail1" class="form-control" placeholder="Електронна пошта">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Пароль</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Увійти"/>
</form>
<div style="margin-top: 5%">
    <span>Нема аккаунту? <a href="/register">Зареєструватися</a></span>
</div>