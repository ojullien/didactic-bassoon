<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DepartmentsControllerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_users_can_access_departments_page(): void
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/departments');
        $response->assertSuccessful();
        $response->assertSee('List of departments');
    }
}
