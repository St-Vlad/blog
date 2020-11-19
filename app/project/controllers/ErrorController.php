<?php


namespace App\Project\Controllers;


class ErrorController extends BaseController
{
    public function notFound() {
        $this->title = 'Page not found';

        return $this->render('error/notFound');
    }
}