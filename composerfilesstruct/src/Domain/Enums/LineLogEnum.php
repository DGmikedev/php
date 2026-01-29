<?php

namespace App\Domain\Enums;

enum LineLogEnum: string 
{
    case API          = "API";
    case SER_ERR      = "SER_ERR";
    case SER_LOG      = "SER_LOG";
    case FILE_SUCCESS = "FILE_SUCCESS";
    case FILE_ERROR   = "FILE_ERROR";

    public function getLine(){
        return match($this){
            self::API => "[%s] INFO | method=%s | endpoint=%s | status=%s | response_time=%s | ip=%s | user_id=%s | request_id=%s",
            self::SER_ERR => "[Wed Jan 22 12:35:01 2026] [ PHP Fatal error: Uncaught TypeError: Argument must be string in /var/www/app/UserService.php:52 ]",
            self::SER_LOG => "[22/Jan/2026:12:35:01] [189.203.xxx.xxx] [GET /index.php HTTP/1.1 200 4521]",
            self::FILE_SUCCESS => "[2026-01-22 12:40:22] INFO action=CREATE_FILE path=/storage/reports/report_123.pdf size=1.4MB user_id=45 status=SUCCESS",
            self::FILE_ERROR => "[2026-01-22 12:41:10] ERROR action=WRITE_FILE path=/storage/reports/report_124.pdf error=Permission denied"
        };
    }
}