<?php

namespace App\Project\Controllers;

class MainController extends BaseController
{
    public function index()
    {
        return $this->render('index');
    }
}