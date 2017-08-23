<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $defaultUser;

    public function defaultUser(){
        if ($this->defaultUser){
            return $this->defaultUser;
        }
        return $this->defaultUser = factory(\App\Models\User::class)->create();
    }
}
