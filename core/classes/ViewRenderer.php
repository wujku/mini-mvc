<?php

class ViewRenderer {

    protected $data = [];
    protected $views = [];
    protected $viewPath; 
    protected $layout;

    public function __construct()
    {
        $this->viewPath = ROOT . 'views/';
        $this->layout = 'layouts/master';
    }

    public function setLayout($name)
    {
        $this->layout = $name;

        return $this;
    }

    public function setTemplate($name, $path)
    {
        $path = $this->getViewPath($path);

        $this->views[$name] = $path;
    
        return $this;
    }

    public function set(array $data)
    {
        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
        }
    }

    public function render()
    {
        foreach (array_keys($this->views) as $name) {
            $this->data[$name] = $this->renderView($name);
        }

        ob_start();
        extract($this->data);
        include($this->getViewPath($this->layout));
        return ob_get_clean();
    }

    protected function getViewPath($name)
    {
        $path = $this->viewPath . $name . '.php';

        if (! file_exists($path)) {
            throw new Exception('File no exist.');
        }

        return $path;
    }

    protected function renderView($_name)
    {
        $_path = $this->views[$_name];
        extract($this->data);

        ob_start();
        include($_path);
        return ob_get_clean();
    }

}
