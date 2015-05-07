<?php

abstract class Model extends Singleton {

    protected $db;

    public function __construct()
    {
        $this->db = Db::instance();
    }

}