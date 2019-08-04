<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createProjectAsActivatedUser() {

        // Given activated user
        $this->actingAs(factory('App\User')->create());

        // When passing required data to projects/create endpoint 
        $attributes = [
            'title' => 'Project title',
            'description' => 'Lorem ipsum dolor sit.'
        ];
        auth()->user()->isVerified() 
            ? $this->post(route('projects.store'), $attributes) 
            : redirect('/home');

        // Then new project in db
        $this->assertDatabaseHas('projects', $attributes);
    }
}
