<?php

namespace Tests\Feature;

use Tests\FeatureTestCase;

class CreatePostsTest extends FeatureTestCase
{
    function testUserCreatePost()
    {
        // Having
        $title = 'Esta es una pregunta';
        $content = 'Este es un contenido';

        $this->actingAs($this->defaultUser());

        // When
        $this->get(route('posts.create'))
             ->type($title, 'title')
             ->type($content, 'content')
             ->press('Publicar');

        // Having
       $this->seeInDatabase('posts', [
        'title' => $title,
        'content' => $content,
        'pending' => true,
       ]);

       $this->seeInElement('h1', $title);
    }
}