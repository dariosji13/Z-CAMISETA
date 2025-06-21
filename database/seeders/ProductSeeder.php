<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $sizes = ['S', 'M', 'L', 'XL'];
        $colors = ['Rojo', 'Azul', 'Negro', 'Blanco', 'Amarillo'];
        $styles = ['Clásica', 'Deportiva', 'Premium', 'Casual'];

        for ($i = 1; $i <= 20; $i++) {
            Product::create([
                'name' => "Camiseta Modelo $i",
                'description' => "Descripción de la camiseta modelo $i.",
                'price' => rand(50, 120),
                'stock' => rand(5, 50),
                'size' => $sizes[array_rand($sizes)],
                'color' => $colors[array_rand($colors)],
                'style' => $styles[array_rand($styles)],
                'image' => 'https://via.placeholder.com/300x300.png?text=Camiseta+' . $i,
                'active' => true,
            ]);
        }
    }
}
