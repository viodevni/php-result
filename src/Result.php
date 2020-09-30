<?php

namespace Viodev;

class Result
{
    private const SUCCESS = "success";
    private const FAIL = "fail";

    public $result = self::SUCCESS;
    public $data = array();

    public function __construct(array $args)
    {
        foreach($args as $arg){
            if(is_string($arg)){
                $this->code = $arg;
                continue;
            }
            $this->data = $arg;
        }
    }

    public function __get($name)
    {
        if($name == self::SUCCESS) return $this->result == self::SUCCESS;
        if($name == self::FAIL) return $this->result == self::FAIL;
        return null;
    }

    public static function success(...$args)
    {
        return new static($args);
    }

    public static function fail(...$args)
    {
        $result = new static($args);
        $result->result = self::FAIL;

        return $result;
    }
}