<?php

class User {
    private $username;
    private $CPF;
    private $pin;

    public function __construct($username, $CPF, $pin)
    {
        $this->username = $username;
        $this->CPF = $CPF;
        $this->pin = $pin;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getCPF()
    {
        return $this->CPF;
    }

    /**
     * @return mixed
     */
    public function getPin()
    {
        return $this->pin;
    }




}