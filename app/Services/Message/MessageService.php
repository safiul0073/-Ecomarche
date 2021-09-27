<?php

namespace App\Services\Message;


class MessageService 
{
    protected $msgNumber;
    public function __construct($msgNumber) {
        $this->msgNumber = $msgNumber;
    }

    public function getMsgNumber() {
        return $this->msgNumber;
    }

}