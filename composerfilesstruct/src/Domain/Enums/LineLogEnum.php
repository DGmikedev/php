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
            self::FILE => "[2026-01-22 12:40:22] INFO action=CREATE_FILE path=/storage/reports/report_123.pdf size=1.4MB user_id=45 status=SUCCESS",
        };
    }
}