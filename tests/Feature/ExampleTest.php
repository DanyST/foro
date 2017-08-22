<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DataBaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $user = factory(\App\User::class)->create([
            'name' => 'Dhani Herrera',
            'email' => 'dany.herrera.jks@gmail.com',
        ]);
        $response = $this->actingAs($user, 'api')
                    ->get('/api/user')
                    ->assertSee('Dhani Herrera')
                    ->assertSee('dany.herrera.jks@gmail.com');
    }
}
