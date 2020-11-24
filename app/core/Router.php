<?php

namespace App\Core;

class Router
{
    public function getTrack($routes, $uri){
        foreach ($routes as $route){
            $pattern = $this->getPattern($route->getPath());
            if (preg_match($pattern, $uri, $params)){
                $params = $this->clearNumParams($params);
                return new Track($route->getController(),
                    $route->getAction(),
                    $params);
            }
        }
        return new Track('error', 'notFound');
    }

    private function getPattern($path){
        return '#^' . preg_replace('#/:([^/]+)#', '/(?<$1>[^/]+)', $path) . '/?$#';
    }

    private function clearNumParams($params){
        $result = [];
        foreach ($params as $key => $value){
            if (!is_int($key)){
                $result[$key] = $value;
            }
        }
        return $result;
    }
}