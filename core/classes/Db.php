<?php

class Db extends Singleton {

    protected $db;

    public function __construct()
    {
        $this->db = new PDO(
            'mysql:host='.DATABASE_HOST.';dbname='.DATABASE_NAME.';charset=utf8',
            DATABASE_USER, DATABASE_PASSWORD,
            [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->db, $name], $arguments);
    }

}