<?php

namespace App;

class ExtractionLog
{
    protected $log;

    public function __construct()
    {
        $this->log = [];
    }

    public function getLog()
    {
        return $this->log;
    }

    public function add($message)
    {
        $this->log[] = $message;
    }
}
