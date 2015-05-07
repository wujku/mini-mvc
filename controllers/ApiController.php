<?php

abstract class ApiController {

    protected $response = [];

    public function __construct()
    {

    }

    protected function setResponse(array $response)
    {
        $this->response = $response;
    }

    public function response()
    {
        header("Content-type: application/json");
        echo json_encode($this->response);
    }

}