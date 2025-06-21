<?php

namespace App\Filament\Store\Pages;

use Filament\Pages\Page;

class CartDetail extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationLabel = 'Mi Carrito';
    protected static string $view = 'filament.store.pages.cart-detail';

    public function getViewData(): array
    {
        $cartIds = session('cart', []);
        $products = \App\Models\Product::whereIn('id', $cartIds)->get();
        $counts = array_count_values($cartIds);

        $cartProducts = $products->map(function ($product) use ($counts) {
            return [
                'image' => $product->image,
                'name' => $product->name,
                'price' => $product->price,
                'cantidad' => $counts[$product->id] ?? 1,
            ];
        })->toArray();

        return [
            'cartProducts' => $cartProducts,
        ];
    }
}
