<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostsTests extends DuskTestCase
{
    public function testUserCreatePost()
    {
        // Having
        $title = 'Esta es una pregunta';
        $content = 'Este es un contenido';
        $user = $this->defaultUser();

        $this->browse(function ($browser) use ($user, $title, $content) {
            $browser->loginAs($user)
        // When
                    ->visit(route('posts.create'))
                    ->type('title', $title)
                    ->type('content', $content)
                    ->press('Publicar')
                    ->assertSee($title);  
        });

        // Then
        $this->assertDatabaseHas('posts', [
            'title' => $title,
            'content' => $content,
            'pending' => true,
        ]);
    }

}
