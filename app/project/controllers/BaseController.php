<?php

namespace App\Project\Controllers;

use App\Core\Page;
use App\Project\Utils\CSRFGenerator;

abstract class BaseController
{
    protected $layout = 'main';
    protected $title = 'Головна';

    public function __construct()
    {
        if (!isset($_SESSION['CSRFtoken'])) {
            $token = new CSRFGenerator();
            $_SESSION['CSRFtoken'] = $token->getCSRFtoken();
        }
    }

    protected function render($view, $data = [])
    {
        return new Page($this->layout, $this->title, $view, $data);
    }
}
