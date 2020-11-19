<?php

namespace App\Core;

class Page
{
    private $layout;
    private $title;
    private $view;
    private $data;

    public function __construct($layout, $title = '', $view = null, $data = [])
    {
        $this->layout = $layout;
        $this->title  = $title;
        $this->view   = $view;
        $this->data   = $data;
    }

    /**
     * @return mixed
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return null
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

}