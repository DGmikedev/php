<?php

namespace App\Domain\Enums;

enum LineLogEnum: string 
{
    case API    = "API";
    case SERVER = "SERVER";
    case FILE   = "FILE";

    public function getLine(){
        return match($this){
            self::API => "[%s] INFO | method=%s | endpoint=%s | status=%s | response_time=%s | ip=%s | user_id=%s | request_id=%s",
            self::SERVER => "[%s] %s",
            self::FILE => "[%s] action=%s path=%s size=%s user_id=%s status=%s",
        };
    }
}