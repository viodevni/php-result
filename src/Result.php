<?php

namespace Viodev;

#[\AllowDynamicProperties]
class Result
{
    private const SUCCESS = "success";
    private const FAIL = "fail";

    public string $result;
    public array $data = [];

    private function __construct(array $args)
    {
        if(count($args) > 2) throw new \Exception('Result exception: class can only be instantiated with a maximum of 2 arguments.');

        if(count($args) == 1){
            if(!is_string($args[0]) && !is_array($args[0])) throw new \Exception("Result exception: class arguments can only be of type 'string' or 'array'.");

            if(is_string($args[0])){
                $this->code = $args[0];
            } else {
                $this->data = $args[0];
            }
        }

        if(count($args) == 2){
            if(!is_string($args[0])) throw new \Exception("Result exception: 1st argument can only be type 'string' when 2 arguments are present.");

            if(!is_array($args[1])) throw new \Exception("Result exception: 2nd argument can only be type 'array' when 2 arguments are present.");

            $this->code = $args[0];
            $this->data = $args[1];
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
        $result = new static($args);
        $result->result = self::SUCCESS;

        return $result;
    }

    public static function fail(...$args) : Result
    {
        $result = new static($args);
        $result->result = self::FAIL;

        return $result;
    }
}