<?php

function get_url($uri = null) {
    return URL . $uri;
}

function is_current($uri = null) {
    return strpos($_SERVER['REQUEST_URI'], $uri) !== false;
}