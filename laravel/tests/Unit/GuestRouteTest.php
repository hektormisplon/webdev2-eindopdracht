<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GuestRouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function home()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function dashboard()
    {
        $response = $this->get('/home');
        $response->assertStatus(302);
    }

    /** @test */
    public function projects()
    {
        $response = $this->get('/projects');
        $response->assertStatus(200);
    }

    /** @test */
    public function createProject()
    {
        $response = $this->get('/projects/create');
        $response->assertStatus(302);
    }
}
