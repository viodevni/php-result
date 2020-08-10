<?php
/**
 * Procedural style construction of Result instances
 *
 * @author Phillip McKeown
 */

use Viodev\Result;

if (!function_exists("success")) {
    /**
     * Represent a success result
     *
     * @param mixed ...$args
     * @return \Viodev\Result
     */
    function success(...$args): Viodev\Result
    {
        return Result::success($args);
    }
}

if (!function_exists("fail")) {
    /**
     * Represent a fail result
     *
     * @param mixed ...$args
     * @return \Viodev\Result
     */
    function fail(...$args): Viodev\Result
    {
        return Result::fail($args);
    }
}