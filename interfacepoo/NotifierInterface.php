<?php

interface NotifierInterface
{
    public function notify(string $message):void;
}