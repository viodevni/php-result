<?php

use \Viodev\Result;

if (!function_exists("success")) {
    /**
     * Represent a success result
     *
     * @param mixed ...$args
     * @return Result
     */
    function success(...$args): Result
    {
        return call_user_func_array([Result::class, 'success'], $args);
    }
}

if (!function_exists("fail")) {
    /**
     * Represent a fail result
     *
     * @param mixed ...$args
     * @return Result
     */
    function fail(...$args): Result
    {
        return call_user_func_array([Result::class, 'fail'], $args);
    }
}