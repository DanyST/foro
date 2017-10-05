<?php

namespace Tests\Feature;

use Tests\FeatureTestCase;

class ShowPostTest extends FeatureTestCase
{
    public function test_a_user_show_posts_details()
    {
        // Having
        $user = $this->defaultUser(['name' => 'Dhani Herrera']);

        $post = factory(\App\Post::class)->make([
            'title' => 'Como instalar React en Laravel',
        ]);

        $user->posts()->save($post);
        
        // When 
        $this->visit(route('posts.show', $post))

        // Then
             ->seeInElement('h1', $post->title)
             ->see($post->content)
             ->see('Dhani Herrera');
    }
}
