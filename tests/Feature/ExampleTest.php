<?php

namespace Tests\Feature;

use Tests\FeatureTestCase;

class ExampleTest extends FeatureTestCase
{
    function test_basic_test()
    {
        $user = factory(\App\User::class)->create([
            'name' => 'Dhani Herrera',
            'email' => 'dany.herrera.jks@gmail.com',
        ]);
        $response = $this->actingAs($user, 'api')
                    ->visit('/api/user')
                    ->see('Dhani Herrera')
                    ->see('dany.herrera.jks@gmail.com');
    }
}
