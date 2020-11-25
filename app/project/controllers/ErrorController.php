<?php

namespace App\Project\Controllers;

class ErrorController extends BaseController
{
    public function notFound() {
        $this->title = 'Сторінка не знайдена';

        return $this->render('error');
    }
}
