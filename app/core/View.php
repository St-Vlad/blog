<?php

namespace App\Core;

class View
{
    public function render(Page $page)
    {
        return $this->renderLayout($page, $this->renderView($page));
    }

    private function renderLayout(Page $page, $content)
    {
        $layoutPath = $_SERVER['DOCUMENT_ROOT'] . "/app/project/layouts/{$page->getLayout()}.php";
        if (file_exists($layoutPath)) {
            ob_start();
            $title = $page->getTitle();
            include $layoutPath;
            return ob_get_clean();
        } else {
            die("Layout file not found");
        }
    }

    private function renderView(Page $page)
    {
        if (($page->getView())){
            $viewPath = $_SERVER['DOCUMENT_ROOT'] . "/app/project/views/{$page->getView()}.php";
            if(file_exists($viewPath)){
                ob_start();
                $data = $page->getData();
                extract($data);
                include $viewPath;
                return ob_get_clean();
            }
            else{
                die("View file not found");
            }
        }
    }
}
