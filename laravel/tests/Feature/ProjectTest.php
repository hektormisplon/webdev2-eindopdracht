<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function createProjectAsNonVerifiedUser()
    {
        // Given activated user
        $this->actingAs(factory('App\User', 'nonVerified')->create());

        // When passing required data to creation endpoint 
        $attributes = [
            'title' => 'Non verified user project',
            'description' => 'Project created by non verified user.'
        ];

        $this->post(route('projects.store'), $attributes);

        // Then new project in db
        $this->assertDatabaseMissing('projects', $attributes);
    }

    /** @test */
    public function createProjectAsVerifiedUser()
    {
        $this->withoutExceptionHandling();

        // Given activated user
        $this->actingAs(factory('App\User', 'verified')->create());

        // When passing required data to creation endpoint 
        $attributes = [
            'title' => 'Project title',
            'description' => 'Lorem ipsum dolor sit.'
        ];

        $this->post(route('projects.store'), $attributes);

        // Then new project in db
        $this->assertDatabaseHas('projects', $attributes);
    }

    public function createProjectAsAdmin()
    {
        // Given activated user
        $this->actingAs(factory('App\User', 'admin')->create());

        // When passing required data to creation endpoint 
        $attributes = [
            'title' => 'Project title',
            'description' => 'Lorem ipsum dolor sit.'
        ];
        auth()->user()->hasVerifiedEmail()
            ? $this->post(route('projects.store'), $attributes)
            : redirect('/home');

        // Then new project in db
        $this->assertDatabaseHas('projects', $attributes);
    }
}
