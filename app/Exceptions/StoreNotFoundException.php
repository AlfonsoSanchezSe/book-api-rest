<?php

namespace App\Exceptions;

use Exception;

class StoreNotFoundException extends Exception
{
    protected $code;

    public function __construct($message, $code){

        $this->code = $code;

        parent::__construct($message);

    }

}
