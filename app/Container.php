<?php

namespace App;

class Container {
    protected $bindings = [];
    public function bind($key,$value){
        $this->bindings[$key] = $value;
    }
    public function resolve($key) {
        return call_user_func($this->bindings[$key]);
    }
}
