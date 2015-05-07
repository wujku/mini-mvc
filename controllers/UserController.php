<?php

class UserController extends Controller {

    public function index()
    {
        $users = UserModel::instance()->getUsers();

        $this->view->set([
            'users' => $users
        ]);

        $this->view->setTemplate('content', 'users/index');
    }

    public function login($username = null)
    {
        $this->view->set([
            'username' => $username
        ]);

        $this->view->setTemplate('content', 'users/login');
    }

    public function register()
    {
		$this->view->setTemplate('content', 'users/register');
    }

    public function check()
    {
        var_dump($_POST); exit();
    }

    public function store()
    {
        var_dump($_POST); exit();
    }
}