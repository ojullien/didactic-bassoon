<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SmokeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_welcome_page()
    {
        $response = $this->get('/');
        $response->assertSuccessful();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_guest_cannot_access_departments_page(): void
    {
        $response = $this->get('/departments');
        $response->assertRedirectContains('login');
    }
}
