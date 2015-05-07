<?php

abstract class Controller {

    protected $view;

    public function __construct()
    {
        $this->view = new ViewRenderer();

        $this->view->set([
            'site_title' => 'Mini-MVC'
        ]);

        $this->view->setTemplate('navbar', 'partials/navbar');
    }

    public function response()
    {
        header("Content-type: text/html");
        echo $this->view->render();
    }

}