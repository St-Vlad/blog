<?php

namespace App\Core;

class Dispatcher
{
    public function getPage(Track $track)
    {
        $className = ucfirst($track->getController()) . 'Controller';
        $fullName = "App\\Project\\Controllers\\$className";

        try {
            $controller = new $fullName;

            if (method_exists($controller, $track->getAction())) {
                $result = $controller->{$track->getAction()}($track->getParams());

                if ($result) {
                    return $result;
                } else {
                    return new Page('main');
                }
            } else {
                echo "Method <b>{$track->getAction()}</b> not found $fullName."; die();
            }
        } catch (\Exception $error) {
            echo $error->getMessage(); die();
        }
    }
}