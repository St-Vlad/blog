<?php

use App\Core\Route;

return [
    new Route('/', 'main', 'actionIndex'),
    new Route('/page/:page', 'main', 'actionIndex'),

    new Route('/register', 'registration', 'actionRegister'),
    new Route('/login', 'login', 'actionLogin'),
    new Route('/logout', 'login', 'actionLogout'),

    new Route('/cabinet', 'cabinet', 'actionIndex'),
    new Route('/cabinet/page/:page', 'cabinet', 'actionIndex'),
    new Route('/article/:id', 'main', 'actionArticleView'),

    new Route('/cabinet/createArticle', 'cabinet', 'actionCreateArticle'),
    new Route('/cabinet/deleteArticle/:id', 'cabinet', 'actionDeleteArticle'),
    new Route('/cabinet/editArticle/:id', 'cabinet', 'actionEditArticle'),
    new Route('/cabinet/updateArticle', 'cabinet', 'actionUpdateArticle'),
];