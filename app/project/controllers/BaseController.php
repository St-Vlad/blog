<?php

namespace App\Project\Controllers;

use App\Core\Page;

abstract class BaseController
{
    protected $layout = 'main';
    protected $title = 'Головна';

    protected function render($view, $data = []){
        return new Page($this->layout, $this->title, $view, $data);
    }
}