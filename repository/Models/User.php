<?php

/**
 *  Modelo donde se guardan los usuarios en la 
 *  BDt´s: php.Users
 * 
 */


class User 
{
    public int    $id;
    public string $name;
    public string $email;
    
    public function __construct(int $_id,string $_name,string $_email){
        $this->id = $_id;
        $this->name = $_name;
        $this->email = $_email;
    }

}