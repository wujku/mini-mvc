<?php

class HomeController extends Controller {

    public function index()
    {
        $this->view->setTemplate('content', 'welcome');
    }

    public function howto()
    {
        $this->view->setTemplate('content', 'howto');
    }

    public function demo(
        $first_name = 'Jan', 
        $last_name = 'Kowalski', 
        $description = null
    ) {
        $this->view->setTemplate('content', 'demo');

        $parameters = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'description' => $description
        ];

        $this->view->set($parameters);
    }

}