<?php

namespace Tests\Feature;

use Tests\FeatureTestCase;

class ExampleTest extends FeatureTestCase
{
    function testBasicTest()
    {
        $user = factory(\App\Models\User::class)->create([
            'name' => 'Dhani Herrera',
            'email' => 'dany.herrera.jks@gmail.com',
        ]);
        $response = $this->actingAs($user, 'api')
                    ->get('/api/user')
                    ->assertSee('Dhani Herrera')
                    ->assertSee('dany.herrera.jks@gmail.com');
    }
}
