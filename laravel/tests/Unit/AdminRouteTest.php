<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminRouteTest extends TestCase
{
    /** @test */
    public function home()
    {
        $user = factory('App\User', 'admin')->create();
        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function dashboard()
    {
        $user = factory('App\User', 'admin')->create();
        $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200);
    }

    /** @test */
    public function projects()
    {
        $user = factory('App\User', 'admin')->create();
        $response = $this->actingAs($user)->get('/projects');
        $response->assertStatus(200);
    }

    /** @test */
    public function createProject()
    {
        $user = factory('App\User', 'admin')->create();
        $response = $this->actingAs($user)->get('/projects/create');
        $response->assertStatus(200);
    }
}
