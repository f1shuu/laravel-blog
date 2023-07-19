<?php

namespace Tests\Feature;

use Tests\TestCase;

class JsonTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->postJson('/api/posts/create', [
            'user_id' => 11,
            'category_id' => 3,
            'slug' => 'created-test',
            'title' => 'Post created with a test',
            'excerpt' => 'This post was created using a test.',
            'body' => 'This particular post was created by performing a test.'
        ]);

        $response
            ->assertStatus(201)
            ->assertJson(['message' => 'Post created successfully.']);
    }
}
