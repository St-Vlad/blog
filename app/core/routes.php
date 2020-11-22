<?php

use App\Core\Route;

return [
    new Route('/', 'main', 'index'),
    new Route('/registration', 'registration', 'actionRegister'),
    new Route('/login', 'login', 'actionLogin'),
    new Route('/logout', 'login', 'actionLogout'),
];