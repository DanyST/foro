<?php

namespace Tests;

use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public $baseUrl = 'http://foro.dev';

    protected $defaultUser;

    public function defaultUser(array $attribute){
        if ($this->defaultUser){
            return $this->defaultUser;
        }
        return $this->defaultUser = factory(\App\User::class)->create(isset($attribute) ? $attribute : '');
    }
}
