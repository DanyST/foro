<?php

namespace Tests;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FeatureTestCase extends TestCase
{
    use DataBaseTransactions;

    protected function seeErrors(array $errors)
    {
        foreach($errors as $error)
        {
            $this->see($error);
        }
    }
}
