<?php

interface ObserverInterface
{
    public function update(string $event, mixed $data):void;
}
