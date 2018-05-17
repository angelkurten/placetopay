<?php


namespace App\Libraries\Structures;

/*
 * Class for generate authenticate in the WebService
 */
class Authentication
{
    /*
     * @var string
     */
    public $login;

    /*
     * @var string
     */
    public $tranKey;

    /*
     * @var string
     */
    public $seed;

    /**
     * Authentication constructor.
     * @param $login
     * @param $tranKey
     */
    public function __construct($login, $tranKey)
    {
        $this->login = $login;
        $this->tranKey = $this->createHash($tranKey);
    }


    /**
     * @param $key
     * @return string
     */
    public function createHash($key)
    {
        $this->seed = date('c');
        return sha1($this->seed.$key, false);
    }

    /**
     * return array with credentials for auth
     * @return array
     */
    public function credentials()
    {
        return [
            'login' => $this->login,
            'tranKey' => $this->tranKey,
            'seed' => $this->seed,
        ];
    }
}