<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Buscar un usuario con rol admin que ya exista en la base
        $this->admin = User::where('email', 'admin@example.com')->firstOrFail();
    }

    public function test_admin_can_view_users_page(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/users');

        $response->assertStatus(200);
        $response->assertSee('Usuarios');
    }

    public function test_admin_can_view_single_user(): void
    {
        $user = User::where('email', '!=', 'admin@example.com')->first();

        $this->assertNotNull($user, 'Debe haber al menos un usuario adicional al admin en la base de datos.');

        $response = $this->actingAs($this->admin)->get("/admin/users/{$user->id}/edit");

        $response->assertStatus(200);
        $response->assertSee($user->name);
    }
}
