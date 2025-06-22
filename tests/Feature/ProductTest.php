<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\User;

class ProductTest extends TestCase
{
    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Buscar un usuario con rol admin que ya exista en la base
        $this->admin = User::where('email', 'admin@example.com')->firstOrFail();
    }

    public function test_admin_can_view_products_page(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/products');

        $response->assertStatus(200);
        $response->assertSee('Productos');
    }

    public function test_admin_can_view_single_product(): void
    {
        $product = Product::first();

        $this->assertNotNull($product, 'Debe haber al menos un producto creado.');

        $response = $this->actingAs($this->admin)->get("/admin/products/{$product->id}/edit");

        $response->assertStatus(200);
        $response->assertSee($product->name);
    }

}
