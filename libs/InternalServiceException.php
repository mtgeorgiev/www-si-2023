<?php

class InternalServiceException extends Exception {

    public function __construct(string $message) {
        parent::__construct($message, 500);
    }

}