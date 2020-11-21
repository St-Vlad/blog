<?php
var_dump($errors);
?>
<form action="/registration" method="post" novalidate>
    <ul>
        <li>
            <label for="username">Ім'я користувача:</label>
            <input type="text" id="username" name="username">
        </li>
        <li>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email">
        </li>
        <li>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password">
        </li>
        <li>
            <label for="repeat-password">Повторіть пароль:</label>
            <input type="password" id="repeat-password" name="repeat-password">
        </li>
        <li>
            <input type="submit" id="submit" name="submit" value="зарегатися">
        </li>
    </ul>
</form>