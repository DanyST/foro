<?php

namespace Tests\Feature;

use Tests\FeatureTestCase;

class CreatePostsTest extends FeatureTestCase
{
    function test_user_create_post()
    {
        // Having
        $title = 'Esta es una pregunta';
        $content = 'Este es un contenido';

        $user = $this->defaultUser();

        $this->actingAs($user);

        // When
        $this->visit(route('posts.create'))
             ->type($title, 'title')
             ->type($content, 'content')
             ->press('Publicar');

        // Having
       $this->seeInDatabase('posts', [
        'title' => $title,
        'content' => $content,
        'pending' => true,
        'user_id' => $user,
       ]);

       $this->see($title);

    }

    function test_user_trait_create_post_without_authenticate() 
    {
        $this->visit(route('posts.create'))
             ->seePageIs(route('login'));
    }

    function test_user_trait_create_post_empty_attribute()
    {
        // Having
        $content = 'Este es un contenido';

        $this->actingAs($this->defaultUser());

        // When
        $this->visit(route('posts.create'))
             ->type('', 'title')
             ->type('', 'content')
             ->press('Publicar')
             ->seePageIs(route('posts.create'))

       // Then      
             ->seeErrors([
                 'El campo título es obligatorio.',
                 'El campo contenido es obligatorio.'
             ]);
    }
}