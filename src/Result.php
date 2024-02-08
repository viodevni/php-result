<?php

namespace Viodev;

class Result
{
    private const SUCCESS = "success";
    private const FAIL = "fail";

    public string $result = self::SUCCESS;
    public ?string $code = null;
    public array $data = [];

    private function __construct(array $args)
    {
        if(count($args) > 2) throw new \Exception('Result class can only be instantiated 2 arguments maximum.');

        foreach($args as $arg){
            if(!is_string($arg) && !is_array($arg)) throw new \Exception('Result arguments can only be of type; string or array.');

            if(is_string($arg)){
                $this->code = $arg;
            } else {
                $this->data = $arg;
            }

        }
    }

    public function __get($name)
    {
        if($name == self::SUCCESS) return $this->result == self::SUCCESS;
        if($name == self::FAIL) return $this->result == self::FAIL;
        return null;
    }

    public static function success(...$args) : Result
    {
        return new static($args);
    }

    public static function fail(...$args) : Result
    {
        $result = new static($args);
        $result->result = self::FAIL;

        return $result;
    }
}