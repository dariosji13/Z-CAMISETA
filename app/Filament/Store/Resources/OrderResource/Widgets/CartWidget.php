<?php

namespace App\Filament\Store\Widgets;

use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CartWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $cart = session()->get('cart', []);
        $products = Product::whereIn('id', $cart)->get();

        return [
            Stat::make('Productos en carrito', count($cart)),
            Stat::make('Total acumulado', "$" . number_format($products->sum('price'), 2)),
        ];
    }
}
