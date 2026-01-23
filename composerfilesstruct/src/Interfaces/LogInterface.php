<?php

namespace App\Interfaces;

interface LogInterface
{
    public function setDateLongFormat(Date $date):string;
    public function setIdProcess(int $id):string;
    public function settextInfo(string $text):string;
}