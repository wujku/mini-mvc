<?php

class Application
{
    private $url_controller = null;

    private $url_action = null;

    private $url_params = [];

    public function __construct()
    {
        $this->splitUrl();

        // Routing debug mode with ?debug
        if (isset($_GET['debug'])) {
            $this->debug();
        }

        if (! $this->url_controller) {
            // default controller
            $controller = new HomeController();
            // default action
            $controller->index();
        } else {
            $this->url_controller = ucfirst($this->url_controller) . 'Controller';

            if (! class_exists($this->url_controller)) {
                throw new Exception('Page not found!');
            }

            $controller = new $this->url_controller();

            if (! method_exists($controller, $this->url_action)) {
                if (! method_exists($controller, 'index')) {
                    throw new Exception('Page not found!');
                }

                // default action
                $controller->index();
            } else {
                call_user_func_array([$controller, $this->url_action], $this->url_params);
            }
        }

        $controller->response();
    }

    private function splitUrl()
    {
        if (isset($_GET['url'])) {
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url_array = explode('/', $url);

            $this->url_controller = isset($url_array[0]) ? $url_array[0] : null;
            $this->url_action = isset($url_array[1]) ? $url_array[1] : null;

            unset($url_array[0], $url_array[1]);

            $this->url_params = array_values($url_array);
        }
    }

    private function debug()
    {
        var_dump([
            'Controller' => $this->url_controller,
            'Action' => $this->url_action,
            'Parameters' => $this->url_params,
            'GET' => $_GET
        ]);
    }
}