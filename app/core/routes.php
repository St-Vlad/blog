<?php

use App\Core\Route;

return [
    new Route('/', 'main', 'actionIndex'),
    new Route('/page/:page', 'main', 'actionIndex'),

    new Route('/registration', 'registration', 'actionRegister'),
    new Route('/login', 'login', 'actionLogin'),
    new Route('/logout', 'login', 'actionLogout'),

    new Route('/cabinet', 'cabinet', 'actionIndex'),
    new Route('/cabinet/page/:page', 'cabinet', 'actionIndex'),
    new Route('/article/:id', 'main', 'actionArticleView'),

    new Route('/cabinet/deletePost/:id', 'cabinet', 'deletePost'),
    new Route('/cabinet/editPost/:id', 'cabinet', 'editPost'),
    new Route('/cabinet/updatePost', 'cabinet', 'updatePost'),
];